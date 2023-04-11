@extends('client.layout.indexlayout')

@section('title')
Gợi ý kết bạn | Earth
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
                <h3>Gợi ý kết bạn</h3>
            </div>
            <div class="containers_right">
                @foreach ($new_friend as $item)
                    <div class="wrappers_right">
                        <div class="wrapper_friends">
                            <div class="img_friends">
                                <a href="{{ route('profile', $item['userId']) }}"><img src="{{$item['avatar']}}" alt="avatar"></a>
                            </div>
                            <div class="nameh2">
                                <h4>{{$item['fullName']}}</h4>
                                <p>4 bạn chung</p>
                            </div>
                            <div class="btn_add">
                                <button type="button" onclick="add_friend_req({{ $item['userId'] }})">Thêm bạn</button>                               
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> 
        </div> 
    </div>
</div>
@endsection