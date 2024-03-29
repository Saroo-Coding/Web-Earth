@if ($pro_user['userId'] == $_COOKIE['user'])
    <div class="write-post-container">
        <div class="user-profile">
            <a href="{{ route('profile', $user['userId']) }}"><img id="user_img" src="{{ $user['avatar'] }}"
                    alt=""></a>
            <div>
                <div>
                    <a href="{{ route('profile', $user['userId']) }}">
                        <p id="user_name">{{ $user['fullName'] }}</p>
                    </a>
                </div>
                <div class="custom-select">
                    <div class="select">
                        <select name="format" id="format" title="Chế độ xem">
                            <option value="0">Công khai</option>
                            <option value="1">Bạn bè</option>
                            <option value="2">Chỉ mình tôi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-input-container">
            <textarea name="content" id="content" rows="3" placeholder="Bạn đang nghĩ gì vậy {{ $pro_user['fullName'] }}?"></textarea>

            <img style="" id="preview_1" class="img_post_css" alt="">

            <div class="add-post-links">
                <a href="#"><i class="fa-solid fa-video" style="color: red"></i> Live video </a>
                <div style="margin-top: 3px;margin-right: 30px;" class="image-upload">
                    <label style="font-size: 13px;" for="file"><i class="fa-solid fa-camera"></i>
                        Photo/Video</label>
                </div>
                <input type="file" name="file" id="file" style="display: none">

                <a href="#"><i class="fa-regular fa-face-laugh"></i> Feling/Activity </a>
                <button type="button" id="post_button" class="post-input">Post</button>
            </div>
        </div>
    </div>
@endif

<!-- post-container chính -->
@foreach ($post as $item)
    <div class="post-container" id="post-container_{{ $item['postId'] }}">
        <div class="post-row">
            <div class="user-profile">
                <img src="{{ $item['avatar'] }}" alt="">
                <div>
                    <div>
                        <a href="{{ route('profile', $item['userId']) }}">
                            <p class="name-user">{{ $item['fullName'] }}</p>
                        </a>
                    </div>
                    @if ($item['accessModifier'] == 'Công khai')
                        <span class="time">{{ $item['datepost'] }} ' <i class="fa-solid fa-earth-asia"></i></span>
                    @endif
                    @if ($item['accessModifier'] == 'Bạn bè')
                        <span class="time">{{ $item['datepost'] }} ' <i class="fa fa-users"></i></span>
                    @endif
                </div>
            </div>
            <div class="post-right">
                <i class="fas fa-ellipsis-v" onclick="postrighsMenuToggle({{ $item['postId'] }})"></i>

                <div class="posts" id="post_{{ $item['postId'] }}">
                    <div class="post-fas-container">
                        <div class="post-fas">
                            <ul>
                                <li><i class="fa-solid fa-bookmark"></i>Lưu bài viết</li>
                                <li><i class="fa-regular fa-bell"></i>Bật thông báo</li>
                                @if ($item['userId'] == $pro_user['userId'])
                                    <li onclick="delete_post({{ $item['postId'] }})"><i
                                            class="fa-solid fa-trash-can"></i>Xóa bài viết</li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="post-text">
            <p>{{ $item['content'] }}</p>
        </div>
        @if ($item['image1'] != 'Khong')
            <div class="post-img">
                <img src="{{ $item['image1'] }}" alt="">
            </div>
        @endif
        {{-- @if ($item['image2'] != 'Khong')
            <div class="post-img">
                <img src="{{$item['image2']}}" alt="">
            </div>
        @endif
        @if ($item['image3'] != 'Khong')
            <div class="post-img">
                <img src="{{$item['image3']}}" alt="">
            </div>
        @endif --}}
        <div class="post-row">
            <div class="activity-icons">
                @if ($item['liked'] == true)
                    <div class="like"> <i id="{{ $item['postId'] }}-heart" onclick="heart({{ $item['postId'] }})"
                            class="fa-solid fa-heart fa-beat"></i> <span
                            id="{{ $item['postId'] }}-count-heart">{{ $item['like'] }}</span> </div>
                @else
                    <div class="like"> <i id="{{ $item['postId'] }}-heart" onclick="heart({{ $item['postId'] }})"
                            class="fa-regular fa-heart fa-beat"></i> <span
                            id="{{ $item['postId'] }}-count-heart">{{ $item['like'] }}</span> </div>
                @endif
                <!-- comment -->
                <div class="comments" onclick="document.getElementById('{{ $item['postId'] }}').style.display='block'">
                    <i class="fa-solid fa-message"></i>
                    <span id="count_cmt_{{ $item['postId'] }}">{{ count($item['comment']) }}</span>
                </div>
                <!-- end comment -->
                <div class="shares"><i class="fa-solid fa-share" onclick="share({{ $item['postId'] }})"></i> <span
                        id="count_share_{{ $item['postId'] }}">{{ $item['share'] }}</span></div>
            </div>
        </div>
        <!-- comment -->
        <div id="{{ $item['postId'] }}" class="section-cmt">
            <div class="cmt-btn">
                <div class="container-cmt">
                    <div class="name-cmt">
                        <h4>Bài viết của {{ $item['fullName'] }}</h4>
                    </div>
                    <script>
                        window.addEventListener('mouseup', function(event) {
                            if (event.target == document.getElementById({{ $item['postId'] }})) {
                                document.getElementById({{ $item['postId'] }}).style.display = 'none';
                            }
                        });
                    </script>
                    <div class="wrapper_posts">
                        <div class="imgs">
                            <div class="slideshow-container">
                                <div class="mySlides">
                                    <img onclick="showImg({{ $item['postId'] }})" id="myImg_{{ $item['postId'] }}"
                                        src="{{ $item['image1'] }}" alt="">
                                </div>
                            </div>
                            <div id="myModal_{{ $item['postId'] }}" class="modal modal_post">
                                <span class="close_image" onclick="document.getElementById('myModal_' + {{ $item['postId'] }}).style.display = 'none'">&times;</span>
                                <img class="modal-content new new-2" id="img_{{ $item['postId'] }}" alt="">
                                <div id="caption_{{ $item['postId'] }}"></div>
                            </div>
                        </div>
                        <form>
                            <div class="view-user">
                                <div id="user-cmt_{{ $item['postId'] }}"></div>
                                @foreach ($item['comment'] as $xyz)
                                    <div class="user-cmt">
                                        <img src="{{ $xyz['avatar'] }}" alt="">
                                        <div class="name-user">
                                            <div class="user-container">
                                                <div class="name-user-cmt">
                                                    <h4>{{ $xyz['fullName'] }}</h4>
                                                    <p class="cmtt">{{ $xyz['content'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <script>
                                window.addEventListener('mouseup', function(event) {
                                    if (event.target == document.getElementById({{ $item['postId'] }})) {
                                        document.getElementById({{ $item['postId'] }}).style.display = 'none';
                                    }
                                });
                            </script>
                            <div class="replys-cmt">
                                <div class="icon-cmt">
                                    <i class="fa-regular fa-image"></i>
                                    <i class="fa-regular fa-face-laugh"></i>
                                    <i class="fa-solid fa-camera"></i>
                                </div>
                                <div class="reply-cmt">
                                    <img src="{{ $pro_user['avatar'] }}" alt="">
                                    <textarea id="cmt_{{ $item['postId'] }}" cols="3" rows="1" placeholder="Viết bình luận..."></textarea>
                                    <div onclick="new_cmt({{ $item['postId'] }})" class="post-btn">Post</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end comment -->
    </div>
@endforeach

<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-app.js";
    import { getStorage,ref as sRef,uploadBytesResumable,getDownloadURL } from "https://www.gstatic.com/firebasejs/9.19.1/firebase-storage.js";
    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
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
    var input = document.getElementById("file");

    input.onchange = e =>{
        var file = document.getElementById('file').files;
        if(file.length > 0){
            reader.onload = function(e){
                document.getElementById('preview_1').setAttribute('src',e.target.result)
            };
            reader.readAsDataURL(file[0]);
        }
    };

    function new_post() {
        var content = document.getElementById("content").value;
        var access = document.getElementById("format").options[document.getElementById("format").selectedIndex].text;
        if(document.getElementById('file').files[0] != null){
            var imgToUp = document.getElementById('file').files[0];
            var imgName = document.getElementById('file').files[0].name;
            const metaData = {contentType:imgToUp.type};
            const storage = getStorage();
            const refStorage = sRef(storage,cookie.user + "/" + imgName);
            const UploadTask = uploadBytesResumable(refStorage,imgToUp,metaData);
            UploadTask.on('state_changed',function(snapshot){
            },function(error){console.error();location.reload();
            },function(){
                getDownloadURL(UploadTask.snapshot.ref).then((downloadURL)=>{
                $.ajax({
                    type: "POST",
                    url: url + "Newsfeed/NewPost",
                    contentType: "application/json;charset=utf-8",
                    headers: { Authorization: 'Bearer ' + cookie.token },
                    data: JSON.stringify({ content: content, userId: cookie.user, accessModifier: access, image1:downloadURL,image2:'Khong',image3:'Khong'}),
                    success: function () {location.reload();},
                    error: function () { alert("Có gì đó sai sai !!!");location.reload();}
                });
            })});
        }
        else{
            $.ajax({
                type: "POST",
                url: url + "Newsfeed/NewPost",
                contentType: "application/json;charset=utf-8",
                headers: { Authorization: 'Bearer ' + cookie.token },
                data: JSON.stringify({ content: content, userId: cookie.user, accessModifier: access, image1:'Khong',image2:'Khong',image3:'Khong'}),
                success: function () {location.reload();},
                error: function () { alert("Có gì đó sai sai !!!");location.reload();}
            });
        }
    }
    document.getElementById('post_button').onclick = new_post;
</script>
