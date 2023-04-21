@extends('client.pages.group.group')

@section('btn_group')
    <div class="containers_member">
        {{-- Quản trị viên & người kiểm duyệt --}}
        <div class="wrapper_member">
            <div class="names_h4">
                <h4>Quản trị viên & người kiểm duyệt</h4>
            </div>
            @foreach ($group['admin'] as $item)
                <div class="wrappers_main">
                    <div class="main_member">
                        <div class="title_member">
                            <a href="{{ route('profile', $item['userId']) }}">
                                <div class="img_member">
                                    <img src="{{ $item['avatar'] }}" alt="">
                                </div>
                            </a>
                            <div class="name_member">
                                <a href="{{ route('profile', $item['userId']) }}">
                                    <h4>{{ $item['fullName'] }}</h4>
                                </a>
                                <p class="color_qtv">Quản trị viên</p>
                            </div>
                        </div>
                        <div class="btn_member">
                            <button><span><i class="fa-solid fa-plus"></i><i class="fa-solid fa-user"></i></span>Thêm bạn bè</button>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($group['mod'] as $item)
                <div class="wrappers_main">
                    <div class="main_member">
                        <div class="title_member">
                            <a href="{{ route('profile', $item['userId']) }}">
                                <div class="img_member">
                                    <img src="{{ $item['avatar'] }}" alt="">
                                </div>
                            </a>
                            <div class="name_member">
                                <a href="{{ route('profile', $item['userId']) }}">
                                    <h4>{{ $item['fullName'] }}</h4>
                                </a>
                                <p class="color_qtv">Người kiểm duyệt</p>
                            </div>
                        </div>
                        <div class="btn_member">
                            <button><span><i class="fa-solid fa-plus"></i><i class="fa-solid fa-user"></i></span>Thêm bạn bè</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{-- end Quản trị viên & người kiểm duyệt --}}

        <div class="wrapper_member">
            <div class="names_h4">
                <h4>Thành viên</h4>
                <span> · </span>
                <p>{{count($group['member'])}}</p>
            </div>
            {{-- search --}}
            <div class="search_member">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="input_member" placeholder="Tìm kiếm..." onkeyup="inputMember()">
            </div>
            {{-- end search --}}

            <div class="searchs_mb">
                <ul id="ul_member">
                    @foreach ($group['member'] as $item)
                        <li>
                            <div class="main_member">
                                <div class="title_member">
                                    <a href="{{ route('profile', $item['userId']) }}">
                                        <div class="img_member">
                                            <img src="{{$item['avatar']}}" alt="">
                                        </div>
                                    </a>
                                    <div class="name_member">
                                        <a href="{{ route('profile', $item['userId']) }}">
                                            <h4>{{$item['fullName']}}</h4>
                                        </a>
                                        <p>Ban chung chua lam dc</p>
                                    </div>
                                </div>
                                <div class="btn_member">
                                    <button><span><i class="fa-solid fa-plus"></i><i class="fa-solid fa-user"></i></span>Thêm bạn bè</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
