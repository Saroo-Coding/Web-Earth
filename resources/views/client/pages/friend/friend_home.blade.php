@extends('client.layout.indexlayout')

@section('title')
    Bạn bè | Earth
@endsection

@section('content')
    <div class="container_friendhome">
        <!-- ----------------left_sidebar_friendhome------------ -->
        @include('client.pages.friend.left_sidebar')
        <!-- ----------------end left_sidebar_friendhome------------ -->


        <!-- ----------------right-sidebar------------ -->
        <div class="right_sidebar_friendhome">
            {{-- Lời mời kết bạn --}}
            @if ($friend_req != null)
                <div class="wrappers_friendhome">
                    <div class="name_addfriend">
                        <h3>Lời mời kết bạn</h3>
                    </div>
                    <div class="containers_right">
                        @foreach ($friend_req as $item)
                            <div class="wrappers_right">
                                <div class="wrapper_friends">
                                    <div class="img_friends">
                                        <a href="{{ route('profile', $item['fromUser']) }}"><img src="{{ $item['avatar'] }}"
                                                alt="avatar"></a>
                                    </div>
                                    <div class="nameh2">
                                        <h4>{{ $item['fullName'] }}</h4>
                                        <p>4 bạn chung</p>
                                    </div>
                                    <div class="btn_add">
                                        <button type="button" onclick="addfriend({{ $item['reqId'] }})">Đồng ý</button>
                                        <button type="button" onclick="un_friend_req({{ $item['reqId'] }})">Từ
                                            chối</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @else
                <div class="name_addfriend">
                    <h3>Chưa có lời mời kết bạn nào </h3>
                </div>
            @endif
        </div>
    </div>
@endsection
