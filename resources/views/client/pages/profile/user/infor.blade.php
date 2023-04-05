@section('title')
    {{ $user['fullName'] }} | Earth
@endsection
<div class="profile-container">
    <div class="cover-img">
        <img src="{{ $user['anhBia'] }}">
    </div>
    <div class="profile-details">
        <div class="pd-left">
            <div class="pd-row">
                <img class="pd-img" src="{{ $user['avatar'] }}">
                <div>
                    <h3>{{ $user['fullName'] }}</h3>
                    <p>{{ $user['friend'] }} Friends</p>
                    <div class="friends_details">
                        @foreach (array_slice($friend, 0, 4) as $item)
                            <a href="{{ route('profile',$item['userId'])}}"><img src="{{ $item['avatar'] }}"></a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        @if ($user['userId'] == $_COOKIE['user'])
            <div class="pd-right">
                <button type="button" onclick="document.getElementById('EDIT_USER').style.display='block'"> <i
                        class="fa-solid fa-pen"></i> Edit profile</button>
            </div>
            <div id="EDIT_USER" class="modal_user">
                <form class="modal_content animate">
                    <h2>Edit profile</h2>
                    <div class="container_edit">
                        {{-- anh user --}}
                        <div>
                            <div class="img_user">
                                <h3>Avatar </h3>
                                <div class="img_container">
                                    <img src="{{ $user['avatar'] }}" class="avatar">
                                </div>
                            </div>
                            <input type="file" name="file_user" class="file_user" id="file_avatar">
                        </div>
                        {{-- anh bia --}}
                        <div>
                            <div class="img_user">
                                <h3>Cover image </h3>
                                <div class="cover_imgcontainer">
                                    <img src="{{ $user['anhBia'] }}" class="cover_img">
                                </div>
                            </div>
                            <input type="file" name="file_user" class="file_cover" id="file_cover">
                        </div>
                        {{-- tieu su --}}
                        <div>
                            <div class="img_user">
                                <h3>Add Life</h3>
                                <textarea name="life" id="life" class="life" cols="50" rows="3" placeholder="Intro..."> </textarea>
                            </div>
                        </div>

                    </div>
                    <div class="container_edit">
                        <div class="wrapper_btn">
                            <button type="button" onclick="document.getElementById('EDIT_USER').style.display='none'"
                                class="cancel_btn">Cancel</button>
                            <button type="submit" class="btnPost">Post user</button>
                        </div>
                    </div>
                </form>
            </div>
        @else
        <div class="pd-right">
            {{-- if else ban be --}}
            @if ($check_friend != null)
                <button type="button" onclick="unfriend({{$check_friend['reqId']}})"><span><i class="fa-solid fa-times"></i><i class="fa-solid fa-user"></i></span>Hủy lời mời</button>
                <button type="button"> <i class="fa-solid fa-comment-dots"></i>Message</button>
            @else
                <button type="button" onclick="add_friend({{$user['userId']}})"><span><i class="fa-solid fa-plus"></i><i class="fa-solid fa-user"></i></span>Thêm bạn</button>
            @endif
        </div>
        @endif
    </div>
    {{--  --}}
    <div class="profile-details" style="border-bottom-left-radius: 6px;border-bottom-right-radius: 6px;">
        <ul class="pd-bottom">
            <li class="">
                <a href="{{ route('profile',$user['userId'])}}">Posts</a>
            </li>
            <li class="">
                <a href="{{ route('introduce',$user['userId'])}}">Introduce</a>
            </li>
            <li class="">
                <a href="{{ route('friend',$user['userId'])}}">Friends</a>
            </li>
            <li class="">
                <a href="{{ route('image',$user['userId'])}}">Image</a>
            </li>
            <li>
                <a href="#"><i class="fa-solid fa-ellipsis"></i></a>
            </li>
        </ul>
    </div>
</div>
