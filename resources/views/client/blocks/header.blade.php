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
        <div class="search-box">
            <i class="fa-solid fa-magnifying-glass"></i>
            <input type="text" placeholder="Search...">
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
                <a href="{{ route('login') }}">Logout</a>
            </div>
        </div>
    </div>
</nav>
