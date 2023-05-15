<li class="notification">
    <div class="icon-mes" onclick="notificationMenuToggle()">
        <i class="fa-regular fa-bell"></i>
        <span class="qty_tb" id="qty_tb"></span>
    </div>
    <div id="notification-menu" class="notification-menu">
        <div class="container-ms">
            <div class="notification-menu-inner">
                <div class="news">
                    <h2>Thông báo</h2>
                </div>
                <div id="notifications" class="notifications">
                    @foreach ($notify as $item)
                        @if ($item['status'] == 0)
                            <div id="notSeen_{{$item['id']}}" class="online-list notSeen">
                                <div class="online">
                                    <a href="{{ route('profile', $item['fromUser']) }}">
                                        <img src="{{ $item['avatar'] }}" alt="">
                                    </a>
                                </div>
                                <p class="dess">
                                    <span class="name-post">{{ $item['fullName'] }}</span>
                                    <span class="tt">{{ $item['content'] }}</span>
                                </p>
                                <i class="fa-solid fa-xmark" style="background-color: #eee;" onclick="deleteNotify({{$item['id']}})"></i>
                            </div>
                        @else
                            <div id="notSeen_{{$item['id']}}" class="online-list"
                                style="padding:10px;margin-bottom: 10px;border-radius: 10px;">
                                <div class="online">
                                    <img src="{{ $item['avatar'] }}" alt="">
                                </div>
                                <p class="dess">
                                    <span class="name-post">{{ $item['fullName'] }}</span>
                                    <span class="tt">{{ $item['content'] }}</span>
                                </p>
                                <i class="fa-solid fa-xmark" onclick="deleteNotify({{$item['id']}})"></i>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</li>
<script>
    document.getElementById('qty_tb').innerHTML = document.getElementsByClassName("online-list notSeen").length;
</script>
