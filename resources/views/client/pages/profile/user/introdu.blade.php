@extends('client.layout.indexlayout')
@section('content')
    {{-- INFOR USER --}}
    @include('client.pages.profile.user.infor')
    {{-- END INFOR USER --}}

    <div class="profile-infos">
        <main>
            <div class="container_intro">
                <div class="wrapper_intro">
                    <h3>Introduce</h3>
                    <div class="app_content_intro">
                        @if ($pro_user['userId'] == $_COOKIE['user'])
                            <ul class="tabs_intro">
                                <li data-target="#content_1_intro">
                                    <p>Xem trước</p>
                                </li>
                                <li data-target="#content_2_intro">
                                    <p>Chỉnh sửa</p>
                                </li>
                            </ul>
                        @endif
                        {{-- may choi t ac qua  --}}
                        <div>
                            <div class="tabcontent_intro active_intro" id="content_1_intro">
                                <div class="containers_intro">
                                    <ul>
                                        <li>
                                            <span><i class="fa-solid fa-briefcase"></i>Director at 99media Ltd</span>
                                            <span onclick="confirm('Removed !!')"><i
                                                    class="fa-solid fa-trash-can"></i></span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-building-columns"></i>Studied at Amity
                                                University</span>
                                            <span onclick="confirm('Removed !!')"><i
                                                    class="fa-solid fa-trash-can"></i></span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-graduation-cap"></i>Went to DPS Delhi</span>
                                            <span onclick="confirm('Removed !!')"> <i
                                                    class="fa-solid fa-trash-can"></i></span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-house"></i>Lives in HCM CITY, VIETNAM</span>
                                            <span onclick="confirm('Removed !!')"><i
                                                    class="fa-solid fa-trash-can"></i></span>
                                        </li>
                                        <li>
                                            <span><i class="fa-solid fa-heart"></i>Single</span>
                                            <span onclick="confirm('Removed !!')"><i
                                                    class="fa-solid fa-trash-can"></i></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabcontent_intro" id="content_2_intro">
                                <div class="containers_intro">
                                    <form action="" class="form_intro">
                                        <div class="edit_intro">
                                            <div class="label">
                                                <label for="workplace"><b>Workplace</b></label><br>
                                                <input type="text" class="input_intro" id="workplace" name="workplace"
                                                    value=""><br>
                                            </div>

                                            <div class="label">
                                                <label for="university"><b>University</b></label><br>
                                                <input type="text" class="input_intro" id="university" name="university"
                                                    value=""><br>
                                            </div>

                                            <div class="label">
                                                <label for="graduate"><b>Graduate</b></label><br>
                                                <input type="text" class="input_intro" id="graduate" name="graduate"
                                                    value=""><br>
                                            </div>

                                            <div class="label">
                                                <label for="liveat"><b>Live at</b></label><br>
                                                <input type="text" class="input_intro" id="liveat" name="liveat"
                                                    value=""><br>
                                            </div>

                                            <div class="label">
                                                <label for="status"><b>Status</b></label><br>
                                                <select name="" id="status">
                                                    {{-- doc than --}}
                                                    <option value="single">Single</option>
                                                    {{-- hen ho --}}
                                                    <option value="dating">Dating</option>
                                                    {{-- da ket hon --}}
                                                    <option value="married">Married</option>
                                                    {{-- có một mối quan hệ phức tạp --}}
                                                    <option value="relationship">Have a complicated relationship</option>
                                                </select><br>
                                            </div>
                                            <div class="submit_intro">
                                                <input class="input_intro" type="submit" id="button_intro" value="Save">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
