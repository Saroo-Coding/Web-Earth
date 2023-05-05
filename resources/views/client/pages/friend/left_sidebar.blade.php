<div class="left_sidebar_friendhome">
    <h2 class="name_friendhome">Bạn bè</h2>
    <div class="imp_links_friendhome">

        <a href="{{ route('friend')}}" class=" {{ request()->route()->getName() === 'friend' ? 'active': '' }}">
            <span><i class="fa-solid fa-user-group"></i>Lời mời kết bạn</span>
            <span class="nextfr"><i class="fa-solid nexts fa-chevron-right"></i></span>
        </a>
        <a href="{{ route('requests')}}" class="{{ Request::route()->getName() === 'requests' ? 'active': '' }}">
            <span><i class="fa-solid fa-right-long"></i>Yêu cầu kết bạn</span>
            <span class="nextfr"><i class="fa-solid nexts fa-chevron-right"></i></span>
        </a>
        <a href="{{ route('suggestion')}}" class="{{ Request::route()->getName() === 'suggestion' ? 'active': '' }}">
            <span><i class="fa-solid fa-user-plus"></i> Gợi ý kết bạn</span>
            <span class="nextfr"><i class="fa-solid nexts fa-chevron-right"></i></span>
        </a>
        <a href="{{ route('listfriend')}}" class="{{ Request::route()->getName() === 'listfriend' ? 'active': '' }}">
            <span><i class="fa-solid fa-user-check"></i> Tất cả bạn bè</span>
            <span class="nextfr"><i class="fa-solid nexts fa-chevron-right"></i></span>
        </a>
    </div>
</div>