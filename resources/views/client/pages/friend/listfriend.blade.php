@extends('client.layout.indexlayout')

@section('title')
Tất cả bạn bè | Earth
@endsection

@section('content')
<div class="container_friendhome">
    <!-- ----------------left_sidebar_friendhome------------ -->
    @include('client.pages.friend.left_sidebar')
    <!-- ----------------end left_sidebar_friendhome------------ -->

    <!-- ----------------right-sidebar------------ -->
    <div class="right_sidebar_friendhome">
        {{-- gợi ý --}}
        <div class="info-cols">
            <!-- friends -->
            <div class="profile-friends">
                <div class="title-friends">
                    <h3>Bạn bè</h3>
                    <div class="sidebar-search">
                        <div id="search-messenger">
                            <button id="search-btn"><i class="fa-solid fa-magnifying-glass" title="Search"></i></button>
                            <input type="text" name="" id="search-mes" placeholder="Tìm kiếm bạn bè...">             
                        </div>
                    </div>
                </div>
                <div class="friends-friends">
                    @foreach ($friend as $item)
                        <div class="div-friends">
                            <a href="{{ route('profile', $item['userId']) }}"><img src="{{$item['avatar']}}"><p>{{$item['fullName']}}</p></a>
                            <div class="info-friends">
                                <div class="container-info">
                                    <div class="info-top">
                                        <div class="imgfriend">
                                            <a href="{{ route('profile', $item['userId']) }}"><img src="{{$item['avatar']}}"></a>
                                        </div>
                                        <div class="infos">
                                            <h4>{{$item['fullName']}}</h4>
                                        </div>
                                    </div>
                                    <div class="info-bottom">
                                        <button type="button"><i class="fa-solid fa-user-check"></i>Bạn bè</button>
                                        <button type="button"> <i class="fa-solid fa-comment-dots"></i> Nhắn tin</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> 
        
    </div>
</div>
@endsection