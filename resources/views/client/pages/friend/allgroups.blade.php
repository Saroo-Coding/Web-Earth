@extends('client.layout.indexlayout')

@section('title')
Tất cả groups | Earth
@endsection

@section('content')
<div class="container_friendhome">
    <!-- ----------------left_sidebar_friendhome------------ -->
    @include('client.pages.home.friend_home.left_siderbar')
    <!-- ----------------end left_sidebar_friendhome------------ -->


   
    <!-- ----------------right-sidebar------------ -->
    <div class="right_sidebar_friendhome">
        <div class="wrappers_friendhome">
            <div class="info-cols">
                <div class="title-friends">
                    <h3>Tất cả groups đã tham gia</h3>
                    <div class="sidebar-search">
                        <div id="search-messenger">
                            <button id="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                            <input type="text" name="" id="search-mes" placeholder="Tìm kiếm groups...">             
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="info-cols">
            <!-- friends -->
            <div class="profile-allgroups">
                {{-- bản chính --}}
                <div class="allgroups">
                    <div class="div-allgroups">
                        <a href="{{route('groups')}}" class="allgroups_img">
                            <img src="{{asset('img/web-developer.jpg')}}" alt="">
                        </a>
                        <p class="p_group">Full Stack</p>
                    </div>
     
                {{-- end bản chính --}}
    
                    {{-- text xoa cai nay --}}
                    <div class="div-allgroups">
                        <a href="{{route('groups')}}" class="allgroups_img">
                            <img src="{{asset('img/WebsiteExperts.png')}}" alt="">
                        </a>
                        <p class="p_group">Web Developers</p>
                    </div>
                    <div class="div-allgroups">
                        <a href="{{route('groups')}}" class="allgroups_img">
                            <img src="{{asset('img/WebDesign.jpg')}}" alt="">
                        </a>
                        <p class="p_group">Web Design Course </p>
                    </div>
                    <div class="div-allgroups">
                        <a href="{{route('groups')}}" class="allgroups_img">
                            <img src="{{asset('img/WebDesign.jpg')}}" alt="">
                        </a>
                        <p class="p_group">Web Developers</p>
                    </div>
                    {{-- end text xoa cai nay --}}
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection