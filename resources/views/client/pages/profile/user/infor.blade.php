@section('title')
    {{ $pro_user['fullName'] }} | Earth
@endsection
<div class="profile-container">
    <div class="cover-img">
        <img src="{{ $pro_user['anhBia'] }}" alt="">
    </div>
    <div class="profile-details">
        <div class="pd-left">
            <div class="pd-row">
                <img class="pd-img" src="{{ $pro_user['avatar'] }}" alt="">
                <div>
                    <h3>{{ $pro_user['fullName'] }}</h3>
                    @if ($pro_user['friend'] > 0)
                        <p>{{ $pro_user['friend'] }} Bạn</p>
                    @endif
                    <div class="friends_details">
                        @foreach (array_slice($friend, 0, 4) as $item)
                            <a href="{{ route('profile', $item['userId']) }}"><img src="{{ $item['avatar'] }}" alt=""></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @if ($pro_user['userId'] == $_COOKIE['user'])
            <div class="pd-right">
                <button type="button" onclick="document.getElementById('EDIT_USER').style.display='block'"> <i class="fa-solid fa-pen"></i> Chỉnh sửa</button>
            </div>
            <div id="EDIT_USER" class="modal_user">
                <form class="modal_content animate">
                    <h2>Chỉnh sửa hồ sơ</h2>
                    <div class="container_edit">
                        {{-- anh user --}}
                        <div>
                            <div class="img_user">
                                <h3>Ảnh đại diện </h3>
                                <div class="img_container">
                                    <img id="img_user" src="{{ $pro_user['avatar'] }}" class="avatar" alt="">
                                </div>
                            </div>
                            <input type="file" name="file" class="file_user" id="file_avatar">
                        </div>
                        {{-- anh bia --}}
                        <div>
                            <div class="img_user">
                                <h3>Ảnh bìa</h3>
                                <div class="cover_imgcontainer">
                                    <img id="img_cover" src="{{ $pro_user['anhBia'] }}" class="cover_img" alt="">
                                </div>
                            </div>
                            <input type="file" name="file" class="file_cover" id="file_cover">
                        </div>
                        {{-- tieu su --}}
                        <div>
                            <div class="img_user">
                                <h3>Giới thiệu</h3>
                                <textarea name="life" id="life" class="life" cols="50" rows="3">{{$pro_user['otherInfo']}}</textarea>
                            </div>
                        </div>

                    </div>
                    <div class="container_edit">
                        <div class="wrapper_btn">
                            <button type="button" onclick="document.getElementById('EDIT_USER').style.display='none'"
                                class="cancel_btn">Cancel</button>
                            <button type="button" id="btnPost" class="btnPost">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <div class="pd-right">
                @if($check_friend == null && $me_you == null && $you_me == null){{-- chua ket ban, minh gui loi moi --}}
                    <button type="button" style="background: salmon;" onclick="add_friend_req({{ $pro_user['userId'] }})"><span><i class="fa-solid fa-plus"></i><i class="fa-solid fa-user"></i></span>Thêm bạn</button>
                @endif
                {{-- can chua ket ban chua gui chua dong y --}}
                @if ($check_friend != null){{-- da ket ban --}}
                    <button type="button" style="background: crimson;" onclick="unfriend({{$check_friend[0]['userId']}}, {{$check_friend[0]['addFriend']}})"><span><i class="fa-solid fa-plus"></i><i class="fa-solid fa-user"></i></span>Hủy kết bạn</button>
                    <button type="button"><i class="fa-solid fa-comment-dots"></i>Nhắn tin</button>
                @endif
                
                @if ($me_you != null){{-- Minh gui ket ban no --}}
                    <button type="button" style="background: crimson;" onclick="un_friend_req({{ $me_you['reqId'] }})"><span><i class="fa-solid fa-times"></i><i class="fa-solid fa-user"></i></span>Hủy yêu cầu</button>
                    <button type="button"> <i class="fa-solid fa-comment-dots"></i>Nhắn tin</button>
                @endif
                @if ($you_me != null){{-- No gui ket ban minh --}}
                    <button type="button" style="background: green;" onclick="addfriend({{ $you_me['reqId'] }})"><span><i class="fa-solid fa-check"></i><i class="fa-solid fa-user"></i></span>Đồng ý</button>
                    <button type="button" style="background: crimson;" onclick="un_friend_req({{ $you_me['reqId'] }})"><span><i class="fa-solid fa-times"></i><i class="fa-solid fa-user"></i></span>Từ chối</button>
                    <button type="button"> <i class="fa-solid fa-comment-dots"></i>Nhắn tin</button>
                @endif
            </div>
        @endif
    </div>
    <div class="border_bottom"></div>

    {{--  --}}
    <div class="profile-details" style="border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
        <ul class="pd-bottom">
            <li class="">
                <a href="{{ route('profile', $pro_user['userId']) }}">Bài viết</a>
            </li>
            <li class="">
                <a href="{{ route('introduce', $pro_user['userId']) }}">Giới thiệu</a>
            </li>
            <li class="">
                <a href="{{ route('userfriend', $pro_user['userId']) }}">Bạn bè</a>
            </li>
            <li class="">
                <a href="{{ route('image', $pro_user['userId']) }}">Ảnh</a>
            </li>
        </ul>
    </div>
</div>

<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-app.js";
    import { getStorage,ref as sRef,uploadBytesResumable,getDownloadURL } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-storage.js";
    const firebaseConfig = {
      apiKey: "AIzaSyBs49eMo7jaEsxX9Xp5VZmFvssKOlfxFR0",
      authDomain: "doan-ad756.firebaseapp.com",
      projectId: "doan-ad756",
      storageBucket: "doan-ad756.appspot.com",
      messagingSenderId: "175692384807",
      appId: "1:175692384807:web:cc61a86312c66c7e7edc02",
      measurementId: "G-6CN2EP82SD"
    };
    const app = initializeApp(firebaseConfig);
    var reader = new FileReader();

    document.getElementById("file_avatar").onchange = e =>{
        var file = document.getElementById('file_avatar').files;
        if(file.length > 0){
            reader.onload = function(e){
                document.getElementById('img_user').setAttribute('src',e.target.result)
            };
            reader.readAsDataURL(file[0]);
        }
    };
    document.getElementById("file_cover").onchange = e =>{
        var file = document.getElementById('file_cover').files;
        if(file.length > 0){
            reader.onload = function(e){
                document.getElementById('img_cover').setAttribute('src',e.target.result)
            };
            reader.readAsDataURL(file[0]);
        }
    };

    function update_profile() {
        var avatar,cover,life;
        document.getElementById('life').onchange = e =>{ 
            $.ajax({
                type: "PUT",
                url: url + "Account/EditImage/" + cookie.user,
                contentType: "application/json;charset=utf-8",
                headers: { Authorization: 'Bearer ' + cookie.token },
                data: JSON.stringify({userId:cookie.user, otherInfo:document.getElementById('life').value,}),
                success: function () {location.reload();},
                error: function () { alert("Có gì đó sai sai !!!");}
            });
        };
        ///////////////////set logic cho avatar or cover or life///////////////////////
        if(document.getElementById('file_avatar').files[0] != null){};
        if(document.getElementById('file_cover').files[0] != null){};
        
        // if(document.getElementById('file').files[0] != null){
        //     var imgToUp = document.getElementById('file').files[0];
        //     var imgName = document.getElementById('file').files[0].name;
        //     const metaData = {contentType:imgToUp.type};
        //     const storage = getStorage();
        //     const refStorage = sRef(storage,cookie.user + "/" + imgName);
        //     const UploadTask = uploadBytesResumable(refStorage,imgToUp,metaData);
        //     UploadTask.on('state_changed',function(snapshot){
        //     },function(error){console.error();location.reload();
        //     },function(){
        //         getDownloadURL(UploadTask.snapshot.ref).then((downloadURL)=>{
        //         $.ajax({
        //             type: "POST",
        //             url: url + "Account/EditImage/" + cookie.user,
        //             contentType: "application/json;charset=utf-8",
        //             headers: { Authorization: 'Bearer ' + cookie.token },
        //             data: JSON.stringify({ otherInfo:}),
        //             success: function () {location.reload();},
        //             error: function () { alert("Có gì đó sai sai !!!");location.reload();}
        //         });
        //     })});
        // }
        // else{
        //     $.ajax({
        //         type: "POST",
        //         url: url + "Account/EditImage/" + cookie.user,
        //         contentType: "application/json;charset=utf-8",
        //         headers: { Authorization: 'Bearer ' + cookie.token },
        //         data: JSON.stringify({ content: content, userId: cookie.user, accessModifier: access, image1:'Khong',image2:'Khong',image3:'Khong'}),
        //         success: function () {location.reload();},
        //         error: function () { alert("Có gì đó sai sai !!!");location.reload();}
        //     });
        // }
    }
    document.getElementById('btnPost').onclick = update_profile;
</script>