@extends('client.layout.indexlayout')
@section('title')
    Group | Earth
@endsection

@section('content')
    <div class="container_groups">
        <!------------------left_sidebar_groups-------------->
        <div class="left_sidebar_groups">
            <div class="wrapper_title_groups">
                <div class="title_img_group">
                    <img src="{{$group['avatar']}}" alt="">
                </div>
                <div class="name_groups">
                    <h3 class="">{{$group['nameGroup']}}</h3>
                    <p>{{count($group['member'])}} Thành viên</p>
                    @if (in_array($user['userId'],array_column($group['member'],'userId')))
                        <div class="dropdown" >
                            <button class="name_groups_btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-people-group"></i> Đã tham gia 
                                <i class="fa-solid fa-caret-left fa-rotate-270"></i> 
                            </button>
                            <ul class="dropdown-menu group_dropdown">
                            <li><a class="dropdown-item" href="#">Bỏ theo dõi nhóm</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa-solid fa-arrow-right-from-bracket"></i> Rời nhóm</a></li>
                            </ul>
                        </div>
                    @else
                        <div class="dropdown" >
                            <button class="name_groups_btn" type="button">
                                <i class="fa-solid fa-people-group"></i> Xin tham gia
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="wrapper_title_groups">
                <div class="info_groups">
                    <div class="profile_title_groups">
                        <h3>Giới thiệu</h3>
                        <p class="text_groups">{{$group['intro']}}</p>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        <!------------------end left_sidebar_groups-------------->
        <div class="containers_group">
            {{-- anh bia --}}
            <div class="containers_group_img">
                <img src="{{$group['coverImage']}}" alt="">
            </div>
            {{-- end anh bia --}}
            <div class="group_profile">
                <div class="pd-left">
                    <div class="group_pd_row">
                        <img class="group_pd_img" src="{{$group['avatar']}}" alt="">
                        <div>
                            <h3>{{$group['nameGroup']}}</h3>
                            <div class="friends_details">
                                {{-- <a href=""><img src="{{asset('img/user1.webp')}}"></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border_bottom"></div>
            @if ($group['statusGroup'] == true)
                {{--  --}}
                <div class="group_profile">
                    <ul class="pd-bottom">
                        <li>
                            <a class=" {{ request()->route()->getName() === 'Post' ? 'active': '' }}" 
                                href="{{ route('Post',$group['groupId']) }}">Bài viết
                            </a>
                        </li>
                        <li >
                            <a class="{{ Request::route()->getName() === 'Member' ? 'active': '' }}" 
                                href="{{ route('Member',$group['groupId'])}}">Thành viên
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::route()->getName() === 'File' ? 'active': '' }}" 
                                href="{{ route('File',$group['groupId'])}}">File phương tiện
                            </a>
                        </li>
                        @if (in_array($user['userId'],array_column($group['member'],'userId')))
                            <li class="btn_group_add">
                                <button onclick="document.getElementById('id01').style.display='block'">Mời<i class="fa-solid fa-plus"></i></button>
                            </li>
                        @endif
                    </ul>
                </div>
                
                {{-- Click mời bạn bè tham gia groups --}}
                <div id="id01" class="modal_groups">
                    <form class="modal_content_groups" action="" method="get">     
                        <h2>Mời bạn bè tham gia nhóm</h2>              
                        <div class="container_addfriend">
                            {{-- hiển thị những ng bạn đã check --}}
                            <div class="addfriend_top">
                                <h5>DANH SÁCH ĐÃ CHỌN</h5>
                                <div class="wrapper_addfriend">
                                    <a href="" class="linkfriend"><span>@</span><h4>Cong Danh</h4></a>

                                </div>
                            </div>
                            {{-- end hiển thị những ng bạn đã check --}}

                            {{-- danh sách để check mời bạn bè --}}
                            <div class="addfriend_bottom">
                                <h5>DANH SÁCH</h5>
                                {{-- search --}}
                                <div class="search_member" >
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    <input type="text" id="input_add_friends" placeholder="Tìm kiếm bạn bè..." onkeyup="inputAddFriends()">
                                </div>
                                {{-- end search --}}

                                {{-- danh sach ban be --}}
                                <div class="searchs_member_group">
                                    <ul id="ul_add_member">
                                        <li>
                                            @foreach ($alluser as $item)
                                                <div class="main_add_member">
                                                    <div class="title_member">
                                                        <a href="{{ route('profile', $item['userId']) }}" title="user">
                                                            <div class="img_member">
                                                                <img src="{{$item['avatar']}}" alt="">
                                                            </div>
                                                        </a>
                                                            <div class="name_member">
                                                                <a href="{{ route('profile', $item['userId']) }}"><h4>{{$item['fullName']}}</h4></a>
                                                            </div>
                                                    </div>
                                                    <div class="btn_member">
                                                        <label class="container_check">Thêm
                                                            <input type="checkbox" checked="checked" class="check_addfriend">
                                                            <span class="checkmark"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                                {{-- end danh sach ban be --}}
                            </div>
                            {{-- end danh sách để check mời bạn bè --}}
                        </div>
                        <div class="container_addfriend_group cancel">
                            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Hủy bỏ</button>
                            <button type="button" class="cancelbtn addbtn">Gửi lời mời</button> 
                        </div>
                    </form>
                </div>
                {{-- end Click mời bạn bè tham gia groups --}}

                {{--  --}}
                <div class="wrappers_groups">
                    
                    <div class="main_sidebar_friendhome">
                        {{-- post --}}
                        @yield('btn_group')
                        {{-- <br>
                        @include('client.pages.group.post-group') --}}
                    </div>
                    <!------------------right_sidebar_groups-------------->
                    <div class="right_sidebar_groups">
                        <div class="info_groups">
                            <div class="profile_title_groups">
                                <div class="title-box">
                                    <h3>Chat nhóm</h3>
                                    <a href="">Xem thêm</a>
                                </div>
                                <div class="container_chat_groups">
                                    <ul class="wrapper_chat_groups">
                                        {{--searchs bạn bè --}}
                                        <li>
                                            <a href="#">
                                                <div class="chat_groups_list">
                                                    <div class="chat_groups_img">
                                                        <img src="{{asset('img/hoa.jpg')}}" alt="">
                                                    </div>
                                                    <div class="chat_groups_h5">
                                                        <h5>java script</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        {{-- end searchs bạn bè --}}

                                        {{-- text searchs--}}
                                        <li>
                                            <a href="#">
                                                <div class="chat_groups_list">
                                                    <div class="chat_groups_img">
                                                        <img src="{{asset('img/WebsiteExperts.png')}}" alt="">
                                                    </div>
                                                    <div class="chat_groups_h5">
                                                        <h5>php laravel</h5>
                                            
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        {{-- end text searchs--}}

                                        {{-- text searchs--}}
                                        <li>
                                            <a href="#">
                                                <div class="chat_groups_list">
                                                    <div class="chat_groups_img">
                                                        <img src="{{asset('img/WebsiteExperts.png')}}" alt="">
                                                    </div>
                                                    <div class="chat_groups_h5">
                                                        <h5>php laravel</h5>
                                            
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="chat_groups_list">
                                                    <div class="chat_groups_img">
                                                        <img src="{{asset('img/WebsiteExperts.png')}}" alt="">
                                                    </div>
                                                    <div class="chat_groups_h5">
                                                        <h5>php laravel</h5>
                                            
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        {{-- end text searchs--}}

                                        {{-- text searchs--}}
                                        <li>
                                            <a href="#">
                                                <div class="chat_groups_list">
                                                    <div class="chat_groups_img">
                                                        <img src="{{asset('img/WebsiteExperts.png')}}" alt="">
                                                    </div>
                                                    <div class="chat_groups_h5">
                                                        <h5>php laravel</h5>
                                            
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        {{-- end text searchs--}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="info_groups">
                            <div class="profile_title_groups">
                                <div class="title-box">
                                    <h3>File phương tiện chia sẻ</h3>
                                    <a href="{{ route('File',$group['groupId'])}}">Xem thêm</a>
                                </div>
                                <div class="photo-box">
                                    @foreach (array_slice($post, 0, 9) as $item)
                                        @if ($item['img1'] != "Khong")
                                            <div><img src="{{$item['img1']}}" alt=""></div>
                                        @else
                                        @endif
                                        @if ($item['img2'] != "Khong")
                                            <div><img src="{{$item['img2']}}" alt=""></div>
                                        @else
                                        @endif
                                        @if ($item['img3'] != "Khong")
                                            <div><img src="{{$item['img3']}}" alt=""></div>
                                        @else
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        {{--  --}}
                    </div> 
                    <!-- ----------------end right_sidebar_groups------------ -->
                </div>
            @else
                <h3 class="groups_kin">Đây là nhóm kín, nhóm riêng tư !!!</h3>
            @endif
        </div>
    </div>
@endsection