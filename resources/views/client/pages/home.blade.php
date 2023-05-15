@extends('client.layout.indexlayout')
@section('title')
    Earth
@endsection
@section('content')
    <div class="container">
        <!-- ----------------left-sidebar------------ -->
        <div class="left-sidebar">
            <div class="imp-links">
                <a href="{{ route('profile', $user['userId']) }}" class="img-userss">
                    <img src="{{ $user['avatar'] }}" alt="">{{ $user['fullName'] }}
                </a>
                <a href="{{ route('friend') }}">
                    <i class="fa-solid fa-user-group "></i> Bạn bè
                </a>
                {{-- <a href="{{ route('Menja') }}"> --}}
                {{-- <a href="{{ route('TheCube') }}"> --}}
                <a href="{{ route('gamehouse') }}">
                    <i class="fa-solid fa-gamepad"></i> Trò chơi
                </a>
                <a href="#">
                    <i class="fa-solid fa-shop"></i> Cửa hàng
                </a>
            </div>
            <!-- shortcut -->
            <div class="shortcut-links">
                <p>Nhóm của bạn</p>
                @foreach ( array_slice($user['groups'], 0, 3) as $item)
                    <a href="{{ route('Post',$item['groupId']) }}">
                        <img src="{{$item['avatar']}}" alt=""> {{$item['nameGroup']}}
                    </a>
                @endforeach

                <p>Nhóm đề xuất</p>
                @foreach ( array_slice($user['notInGroups'], 0, 3) as $item)
                    <a href="{{ route('Post',$item['groupId']) }}">
                        <img src="{{$item['avatar']}}" alt=""> {{$item['nameGroup']}}
                    </a>
                @endforeach
                
                <a href="" class="all-groups">
                    Xem thêm nhóm
                </a>
            </div>
        </div>
        <!-- ----------------main-content------------ -->
        <div class="main-content">
            {{-- post --}}
            @include('client.pages.post')
        </div>
        <!--  load view se de o day -->
        <!-- ----------------right-sidebar------------ -->
        <div class="right-sidebar">
            @if ($friend_req != null)
                <div class="sidebar-title">
                    <h4>Lời mời kết bạn</h4>
                    <a href="{{ route('friend')}}">Xem</a>
                </div>
                @foreach ($friend_req as $item)
                    <div class="add-sidebar-title">
                        <div class="online-list">
                            <div class="online">
                                <a href="{{ route('profile', $item['fromUser']) }}"><img src="{{$item['avatar']}}" alt="Avatar"></a>
                            </div>
                            <div class="add">
                                <p>{{$item['fullName']}}</p>
                                <button type="button" onclick="feedback_friend({{$item['reqId']}},1)" class="confim">Đồng ý</button>
                                <button type="button" onclick="feedback_friend({{$item['reqId']}},0)" class="removed">Cancel</button>
                            </div>
                        </div>
                        <!-- end text -->
                    </div>
                @endforeach
                <div class="hr"></div>
            @endif
            <!-- ---- -->
            <div class="sidebar-title">
                <h4>Bạn bè</h4>
                <div class="sidebar-search">
                    <div id="search-messenger">
                        <button type="button" title="seach" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        <input type="text" name="" id="search-friends-home" placeholder="Tìm kiếm bạn bè...">             
                    </div>
                </div>
            </div>
            <div class="sidebar-title-chat">
                @foreach ($friend as $item)
                    <div class="online-list">
                        @if ($item['status'] == true)
                            <div id="onl-{{$item['userId']}}" class="online online-dot">
                                <a href="{{ route('profile', $item['userId']) }}">
                                    <img id="avaName_{{$item['userId']}}" src="{{$item['avatar']}}" alt="">
                                </a>
                            </div>
                        @else
                            <div id="onl-{{$item['userId']}}" class="online">
                                <a href="{{ route('profile', $item['userId']) }}">
                                    <img id="avaName_{{$item['userId']}}" src="{{$item['avatar']}}" alt="">
                                </a>
                            </div>
                        @endif
                        <p id="chatName_{{$item['userId']}}" onclick="onclickShowChat({{ $item['userId'] }})">{{$item['fullName']}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
