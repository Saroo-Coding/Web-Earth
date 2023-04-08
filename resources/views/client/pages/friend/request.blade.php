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
            @if ($req_friend != null)
                <div class="wrappers_friendhome">
                    <div class="name_addfriend">
                        <h3>Yêu cầu kết bạn</h3>
                        {{-- <a href="">
                            <p>Xem tất cả</p>
                        </a> --}}
                    </div>
                    @foreach ($req_friend as $item)
                        <div class="containers_right">
                            <div class="wrappers_right">
                                <div class="wrapper_friends">
                                    <div class="img_friends">
                                        <a href="{{ route('profile', $item['toUser']) }}"><img
                                                src="{{ $item['avatar'] }}"></a>
                                    </div>
                                    <div class="nameh2">
                                        <h4>{{ $item['fullName'] }}</h4>
                                        <p>4 bạn chung</p>
                                    </div>
                                    <div class="btn_add">
                                        <button>Hủy yêu cầu</button>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                </div>
            @else
                <div class="name_addfriend">
                    <h3>Hãy gửi lời mời kết bạn </h3>
                </div>
            @endif
        </div>
    </div>
@endsection
