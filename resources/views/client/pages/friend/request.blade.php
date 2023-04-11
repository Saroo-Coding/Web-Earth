@extends('client.layout.indexlayout')

@section('title')
    Lời mời kết bạn | Earth
@endsection

@section('content')
    <div class="container_friendhome">
        <!-- ----------------left_sidebar_friendhome------------ -->
        @include('client.pages.friend.left_sidebar')
        <!-- ----------------end left_sidebar_friendhome------------ -->

        <!-- ----------------right-sidebar------------ -->
        <div class="right_sidebar_friendhome">
            <div class="wrappers_friendhome">
                <div class="name_addfriend">
                    <h3>Yêu cầu kết bạn</h3>
                </div>
                <div class="containers_right">
                    @foreach ($req_friend as $item)
                        <div class="wrappers_right">
                            <div class="wrapper_friends">
                                <div class="img_friends">
                                    <a href="{{ route('profile', $item['toUser']) }}"><img src="{{$item['avatar']}}" alt="avatar"></a>
                                </div>
                                <div class="nameh2">
                                    <h4>{{$item['fullName']}}</h4>
                                    <p>4 bạn chung</p>
                                </div>
                                <div class="btn_add">
                                    <button type="button" style="background: crimson;" onclick="un_friend_req({{ $item['reqId'] }})"><i class="fa-solid fa-user"></i></span> Hủy yêu cầu</button>
                                    <button type="button" style="background-color: #1876f2"><i class="fa-solid fa-comment-dots"></i> Nhắn tin</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
            </div> 
        </div>
    </div>
@endsection
