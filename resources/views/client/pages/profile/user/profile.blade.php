@extends('client.layout.indexlayout')
@section('content')
<body>
    {{-- INFOR USER --}}
    @include('client.pages.profile.user.infor')
    {{-- END INFOR USER --}}

    <div class="profile-info">
        <div class="info-col">
            <div class="profile-intro">
                <h3>Life</h3>
                <p class="intro-text">{{$user['otherInfo']}}
                <hr>
            </div>
            <div class="profile-intro">
                <div class="title-box">
                    <h3>Photos</h3>
                    <a href="{{ route('image',$user['userId'])}}">All Photos</a>
                </div>
                <div class="photo-box">
                    @foreach (array_slice($post, 0, 6) as $item)
                        @if ($item['image1'] != "Khong")
                            <div><img src="{{$item['image1']}}"></div>
                        @else
                        @endif
                        @if ($item['image2'] != "Khong")
                            <div><img src="{{$item['image2']}}"></div>
                        @else
                        @endif
                        @if ($item['image3'] != "Khong")
                            <div><img src="{{$item['image3']}}"></div>
                        @else
                        @endif
                    @endforeach
                    
                </div>
            </div>
         
            <div class="profile-intro">
                <div class="title-box">
                    <h3>{{$user['friend']}} Friends</h3>
                    <a href="{{ route('friend',$item['userId'])}}">All Friends</a>
                </div>
                <div class="friends-box">
                        @foreach (array_slice($friend, 0, 9) as $item)
                        <div>
                            <a style="text-decoration: none" href="{{ route('profile',$user['userId'])}}">
                                <img src="{{$item['avatar']}}"> <p>{{$item['fullName']}}</p> 
                            </a>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
        <div class="post-col">
            @include('client.pages.post')
        </div>
    </div>
</body>

@endsection