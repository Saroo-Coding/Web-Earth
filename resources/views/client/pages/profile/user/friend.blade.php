@extends('client.layout.indexlayout')
@section('content')
    {{-- INFOR USER --}}
    @include('client.pages.profile.user.infor')
    {{-- END INFOR USER --}}

    <div class="profile-infos">
        <div class="info-cols">
            <!-- friends -->
            <div class="profile-friends">
                <div class="title-friends">
                    <h3>Friends</h3>
                    <div class="sidebar-search">
                        <div id="search-messenger">
                            <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input type="text" name="" id="search-mes" placeholder="Search friends...">
                        </div>
                    </div>
                </div>
                {{-- bản chính --}}
                <div class="friends-friends">
                    @if (count($friend) > 0)
                        @foreach ($friend as $item)
                            <div class="div-friends">
                                <a href="{{ route('profile', $item['userId']) }}"><img src="{{ $item['avatar'] }}">
                                    <p>{{ $item['fullName'] }}</p>
                                </a>
                                <div class="info-friends">
                                    <div class="container-info">
                                        <div class="info-top">
                                            <div class="imgfriend">
                                                <a href=""><img src="{{ $item['avatar'] }}"></a>
                                            </div>
                                            <div class="infos">
                                                <h2 style="padding-top: 30px;">{{ $item['fullName'] }}</h2>
                                            </div>
                                        </div>
                                        <div class="info-bottom">
                                            <button type="button"><i class="fa-solid fa-user-check"></i>Friend</button>
                                            <button type="button"> <i class="fa-solid fa-comment-dots"></i>Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2>Hãy kết bạn để lan toản niềm vui 😍😍😍 </h2>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
