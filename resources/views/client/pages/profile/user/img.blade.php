@extends('client.layout.indexlayout')
@section('content')
    {{-- INFOR USER --}}
    @include('client.pages.profile.user.infor')
    {{-- END INFOR USER --}}

    <div class="profile-infos">
        <div class="info-cols">
            <!-- image -->
            <div class="profile-image">
                <div class="title-image">
                    <h3>Ảnh</h3>
                </div>
                {{-- <div class="tab_img">
                    <button class="tablinks" data-target="#images">Your picture</button>
                    <button class="tablinks" data-target="#albums">Your Albums</button>
                </div> --}}
                <ul class="tab_img">
                    <li data-target="#content_1">
                        <p>Ảnh của bạn</p>
                    </li>
                    <li data-target="#content_2">
                        <p>Albums của bạn</p>
                    </li>
                </ul>
                {{-- image cua ban --}}
                <div class="tabs active" id="content_1">
                    <div class="tabcontent">
                        @foreach ($post as $item)
                            @if ($item['image1'] != 'Khong')
                                <div class="div-image">
                                    <img src="{{ $item['image1'] }}">
                                    <div class="edit">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                        <div class="edit_img">
                                            <ul class="dropdown-menu">
                                                <li><i class="fa-solid fa-trash-can"></i>Xóa ảnh</li>
                                                <li><i class="fa-solid fa-user"></i>Đặt làm avatar</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @else
                            @endif
                            @if ($item['image2'] != 'Khong')
                                <div class="div-image">
                                    <img src="{{ $item['image2'] }}">
                                    <div class="edit">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                        <div class="edit_img">
                                            <ul class="dropdown-menu">
                                                <li><i class="fa-solid fa-trash-can"></i>Xóa ảnh</li>
                                                <li><i class="fa-solid fa-user"></i>Đặt làm avatar</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @else
                            @endif
                            @if ($item['image3'] != 'Khong')
                                <div class="div-image">
                                    <img src="{{ $item['image3'] }}">
                                    <div class="edit">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                        <div class="edit_img">
                                            <ul class="dropdown-menu">
                                                <li><i class="fa-solid fa-trash-can"></i>Xóa ảnh</li>
                                                <li><i class="fa-solid fa-user"></i>Đặt làm avatar</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @else
                            @endif
                        @endforeach
                        {{-- end ảnh  --}}
                    </div>
                </div>
                {{-- albums cua ban --}}
                <div class="tabs" id="content_2">
                    <div class="tabcontent">

                        {{-- add albums --}}
                        <div class="albums">
                            <div class="add_ablums" onclick="document.getElementById('id01').style.display='block'"> <i
                                    class="fa-solid fa-plus"></i></div>
                            <p class="name">Thêm albums</p>
                            {{-- add --}}
                        </div>
                        <div id="id01" class="modalalbums">
                            <form class="modal-content animate" action="" method="get">
                                <h2>Add albums</h2>
                                <div class="container_albums">
                                    <label for="addalbums"><b>Tên albums</b></label>
                                    <input type="text" name="addalbums" id="addalbums">
                                    <input type="file" name="file" id="file_albums">
                                    <button type="submit" class="post_albums">Đăng</button>
                                </div>
                                <div class="container_albums cancel">
                                    <button type="button" onclick="document.getElementById('id01').style.display='none'"
                                        class="cancelbtn">Cancel</button>
                                </div>
                            </form>
                        </div>
                        {{-- end add albums --}}
                        <div class="albums">
                            <img src="{{ asset('img/WebDesign.jpg') }}">
                            <p class="name">cover image</p>
                        </div>

                        {{-- text xoa cai nay --}}
                        <div class="albums">
                            <img src="{{ asset('img/WebDesign.jpg') }}">
                            <p class="name">avatar</p>
                        </div>

                        <div class="albums">
                            <img src="{{ asset('img/WebDesign.jpg') }}">
                            <p class="name">upload from mobile</p>
                        </div>
                        <div class="albums">
                            <img src="{{ asset('img/hoa.jpg') }}">
                            <p class="name">Notable photo</p>
                        </div>
                        <div class="albums">
                            <img src="{{ asset('img/WebDesign.jpg') }}">
                            <p class="name">upload from mobile</p>
                        </div>
                        <div class="albums">
                            <img src="{{ asset('img/WebDesign.jpg') }}">
                            <p class="name">Notable photo</p>
                        </div>
                        {{-- end text xoa cai nay --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
