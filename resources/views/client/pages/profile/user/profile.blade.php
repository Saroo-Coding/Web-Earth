@extends('client.layout.indexlayout')
@section('content')
<body>
    {{-- INFOR USER --}}
    @include('client.pages.profile.user.infor')
    {{-- END INFOR USER --}}

    <div class="profile-info">
        <div class="info-col">
            <div class="profile-intro">
                <h3>Giới thiệu</h3>
                <p class="intro-text">{{$pro_user['otherInfo']}}
                <hr>
            </div>
            <div class="profile-intro">
                <div class="title-box">
                    <h3>Ảnh</h3>
                    <a href="{{ route('image',$pro_user['userId'])}}">Xem ảnh</a>
                </div>
                <div class="photo-box">
                    @foreach (array_slice($post, 0, 6) as $item)
                        @if ($item['image1'] != "Khong")
                            <div><img src="{{$item['image1']}}" alt=""></div>
                        @else
                        @endif
                        @if ($item['image2'] != "Khong")
                            <div><img src="{{$item['image2']}}" alt=""></div>
                        @else
                        @endif
                        @if ($item['image3'] != "Khong")
                            <div><img src="{{$item['image3']}}" alt=""></div>
                        @else
                        @endif
                    @endforeach
                    
                </div>
            </div>
         
            <div class="profile-intro">
                <div class="title-box">
                    <h3>{{$pro_user['friend']}} Bạn bè</h3>
                    <a href="{{ route('userfriend',$pro_user['userId'])}}">Xem thêm</a>
                </div>
                <div class="friends-box">
                        @foreach (array_slice($friend, 0, 9) as $item)
                        <div>
                            <a style="text-decoration: none" href="{{ route('profile',$item['userId'])}}">
                                <img src="{{$item['avatar']}}" alt=""> <p>{{$item['fullName']}}</p> 
                            </a>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="post-col">
            @include('client.pages.profile.user.pro-post')
        </div>
    </div>
</body>

@endsection