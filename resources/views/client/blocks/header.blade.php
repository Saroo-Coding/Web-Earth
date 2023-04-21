<nav>
    <div class="nav-left">
            <a href="{{ route('home')}}" style="text-decoration: none">
                <h1 class="logo">Earth</h1>
            </a>
        <ul>
            {{-- ---------------MESSENGER---------------- --}}
            @include('client.pages.header.messenger')
            {{-- ---------------END MESSENGER---------------- --}}

            {{-- ---------------NOTIFICATION-------------- --}}
            @include('client.pages.header.notification')
            {{-- ---------------END NOTIFICATION-------------- --}}
        </ul>
    </div>
    <div class="nav-right">
        <div class="search-box"  onclick="document.getElementById('searchss').style.display='block'">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" id="myInput" placeholder="Tìm kiếm..." onkeyup="myFunction()">
        </div>
        <div class="searchss" id="searchss">
            <ul id="myUL">
                {{--searchs bạn bè --}}
                @foreach ($alluser as $item)
                    <li style="display: none">
                        <a href="{{ route('profile', $item['userId']) }}">
                            <div class="searchs_list">
                                <div class="searchs_img">
                                    <img src="{{$item['avatar']}}" alt="">
                                </div>
                                <div class="searchs_des">
                                    <h5>{{$item['fullName']}}</h5>
                                    <p class="search_friend">Bạn bè</p>
                                </div>
                            </div>
                        </a>
                        <i class="fa-solid fa-xmark"></i>
                    </li>
                @endforeach
                {{-- end searchs bạn bè --}}
                {{-- searchs nhóm --}}
                @foreach ($allgroup as $item)
                    <li style="display: none">
                        <a href="{{ route('Post',$item['groupId']) }}">
                            <div class="searchs_list">
                                <div class="searchs_img">
                                    <img src="{{$item['avatar']}}" alt="">
                                </div>
                                <div class="searchs_des">
                                    <h5>{{$item['nameGroup']}}</h5>
                                </div>
                            </div>
                        </a>
                        <i class="fa-solid fa-xmark"></i>
                    </li>
                @endforeach
                {{-- end searchs nhóm --}}
            </ul>
        </div>
        <div class="nav-user-icon" onclick="settingsMenuToggle()">
            <img src="{{$user['avatar']}}" alt="avatar">
        </div>
    </div>
    <div class="settings-menu">
        <div id="dark-btn" class="dark-btn-on">
            <span></span>
        </div>
        <div class="settings-menu-inner">
            <div class="user-profile">
                    <img src="{{$user['avatar']}}" alt="avatar">
                    <a href="{{ route('profile', $user['userId']) }}" style="text-decoration: none">
                        <p class="name-profile">{{$user['fullName']}}</p>
                    </a>
            </div>
            <hr>
            <div class="user-profile">
                <i class="fa-regular fa-message"></i>
                    <div>
                        <p>Give Feedback</p>
                        <a href="#">Help us to improve the new design</a>
                    </div>
            </div>
            <hr>
            <div class="settings-links">
                <i class="fa-solid setting-icon fa-gear"></i>
                <a href="#">Settings & Privacy <i class="fa-solid fa-chevron-right"></i></a>
            </div>
            <div class="settings-links">
                <i class="fa-solid fa-circle-question"></i>
                <a href="#">Help & Support <i class="fa-solid fa-chevron-right"></i></a>
            </div>
            <div class="settings-links">
                <i class="fa-solid fa-right-from-bracket"></i>
                {{-- <a href="{{ route('login') }}">Logout</a> --}}
                <a style="cursor: pointer" id="logout">Logout</a>
            </div>
        </div>
    </div>
</nav>
