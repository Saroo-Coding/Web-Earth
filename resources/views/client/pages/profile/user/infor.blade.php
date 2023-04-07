@section('title')
    {{ $pro_user['fullName'] }} | Earth
@endsection
<div class="profile-container">
    <div class="cover-img">
        <img src="{{ $pro_user['anhBia'] }}">
    </div>
    <div class="profile-details">
        <div class="pd-left">
            <div class="pd-row">
                <img class="pd-img" src="{{ $pro_user['avatar'] }}">
                <div>
                    <h3>{{ $pro_user['fullName'] }}</h3>
                    @if ($pro_user['friend'] > 0)
                        <p>{{ $pro_user['friend'] }} Bạn</p>
                    @endif
                    <div class="friends_details">
                        @foreach (array_slice($friend, 0, 4) as $item)
                            <a href="{{ route('profile', $item['userId']) }}"><img src="{{ $item['avatar'] }}"></a>
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
                    <h2>Edit profile</h2>
                    <div class="container_edit">
                        {{-- anh user --}}
                        <div>
                            <div class="img_user">
                                <h3>Ảnh đại diện </h3>
                                <div class="img_container">
                                    <img src="{{ $pro_user['avatar'] }}" class="avatar">
                                </div>
                            </div>
                            <input type="file" name="file_user" class="file_user" id="file_avatar">
                        </div>
                        {{-- anh bia --}}
                        <div>
                            <div class="img_user">
                                <h3>Ảnh bìa</h3>
                                <div class="cover_imgcontainer">
                                    <img src="{{ $pro_user['anhBia'] }}" class="cover_img">
                                </div>
                            </div>
                            <input type="file" name="file_user" class="file_cover" id="file_cover">
                        </div>
                        {{-- tieu su --}}
                        <div>
                            <div class="img_user">
                                <h3>Giới thiệu</h3>
                                <textarea name="life" id="life" class="life" cols="50" rows="3" placeholder="Intro..."> </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="container_edit">
                        <div class="wrapper_btn">
                            <button type="button" onclick="document.getElementById('EDIT_USER').style.display='none'"
                                class="cancel_btn">Cancel</button>
                            <button type="submit" class="btnPost">Cập nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            <div class="pd-right">
                @if($check_friend == null && $me_you == null){{-- chua ket ban, minh gui loi moi --}}
                    <button type="button" style="background: salmon;" onclick="add_friend_req({{ $pro_user['userId'] }})"><span><i class="fa-solid fa-plus"></i><i class="fa-solid fa-user"></i></span>Thêm bạn</button>
                @endif
                @if($check_friend == null && $you_me == null){{-- chua ket ban, no gui loi moi --}}
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
                    <button type="button" style="background: crimson;" onclick="un_friend_req({{ $you_me['reqId'] }})"><span><i class="fa-solid fa-times"></i><i class="fa-solid fa-user"></i></span>Hủy lời mời</button>
                    <button type="button"> <i class="fa-solid fa-comment-dots"></i>Nhắn tin</button>
                @endif
            </div>
        @endif
    </div>
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
                <a href="{{ route('friend', $pro_user['userId']) }}">Bạn bè</a>
            </li>
            <li class="">
                <a href="{{ route('image', $pro_user['userId']) }}">Ảnh</a>
            </li>
        </ul>
    </div>
</div>
