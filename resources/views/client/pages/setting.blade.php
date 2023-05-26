@extends('client.layout.indexlayout');
@section('title')
    Cài đặt | Earth
@endsection
@section('content')
    <section class="containers_settings">
        <div id="myDiv" class="myDivClass">
            <h2>Cài đặt tài khoản </h2>
            <div class="wrapper_updatenam">
                <div class="updatename">
                    <h4>Tên: <span id="name">{{ $user['fullName'] }}</span></h4>
                    <button id="showFormButton" data-form-id="myForm">Chỉnh sửa</button>
                </div>
                <div class="updatename">
                    <h4>Email: <span>{{ $user['email'] }}</span> </h4>
                </div>
                <div class="updatename">
                    <h4>Số điện thoại: <span id="sdt">{{ $user['phone'] }}</span></h4>
                    <button id="showFormButtonPhone" data-form-id="myFormPhone">Chỉnh sửa</button>
                </div>
                <div class="updatename">
                    <h4>Mật khẩu: <span>********</span></h4>
                    <button id="showFormButtonPass" data-form-id="myFormPass">Chỉnh sửa</button>
                </div>
                {{-- họ tên --}}
                <form id="myForm" class="hidden form" method="POST">
                    @csrf
                    <div>
                        <label for="fname"><b>Tên</b></label>
                        <input type="text" id="Ten" class="fname" placeholder="Tên" name="fname" required>
                        <label for="lname"><b>Họ</b></label>
                        <input type="text" id="Ho" class="lname" placeholder="Họ" name="lname" required>
                        <input type="button" onclick="editName()" class="btnsubmit" value="Lưu thay đổi">
                    </div>
                </form>
                {{-- số điện thoại --}}
                <form id="myFormPhone" class="hidden form" method="POST">
                    @csrf
                    <div>
                        <label for="phone"><b>Số điện thoại</b></label>
                        <input type="number" id="phone" class="phone" placeholder="Nhập số điện thoại mới"
                            name="phone" required pattern="[0-9]{10}">
                        <span class="error" id="errorSdt" style="display: none">Số điện thoại không hợp lệ</span>
                        <input type="button" onclick="editSdt()" class="btnsubmit" value="Lưu thay đổi">
                    </div>
                </form>
                {{-- mật khẩu --}}
                <form id="myFormPass" class="hidden form" method="POST">
                    @csrf
                    <div>
                        <label for="psw"><b>Nhập mật khẩu cũ</b></label>
                        <input type="password" id="old" class="password" placeholder="Nhập mật khẩu cũ" name="psw" required
                            autocomplete="off">
                        <span class="error" id="error" style="display: none">Sai mật khẩu</span>
                        <label for="psw"><b>Nhập mật khẩu mới</b></label>
                        <input type="password" id="new" class="password" placeholder="Nhập mật khẩu mới" name="psw" required
                            autocomplete="off">
                        <label for="psw-repeat"><b>Nhập lại mật khẩu mới</b></label>
                        <span class="error" id="noRepeat" style="display: none">Không trùng khớp</span>
                        <input type="password" id="repeat" class="password" placeholder="Nhập lại mật khẩu mới" name="psw-repeat"
                            required autocomplete="off">
                        <input type="button" onclick="editPass()" class="btnsubmit" value="Lưu thay đổi">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <style>
        .containers_settings {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        span.error {
            margin-top: 3px;
            font-size: 13px;
            color: red;
        }

        #myDiv {
            position: relative;
            padding: 55px;
            margin-top: 100px;
            width: 60%;
            height: auto;
            color: var(--color-color);
            background-color: var(--bg-color);
            border-radius: 15px;
            border: 1px solid var(--border-color);
        }

        #myDiv h2 {
            margin-left: 30px;

        }

        .wrapper_updatenam {}

        #myForm,
        #myFormPhone,
        #myFormPass {
            position: absolute;
            width: 200px;
            height: 150px;
            right: 55px;
            top: 25px;
        }

        #myForm div,
        #myFormPhone div,
        #myFormPass div {
            display: flex;
            flex-direction: column;
        }

        #myForm div label,
        #myFormPhone div label,
        #myFormPass div label {
            margin-top: 15px;
            margin-bottom: 3px;
            font-size: 14px;
        }

        #myForm div input,
        #myFormPhone div input,
        #myFormPass div input {
            height: 35px;
            border-radius: 5px;
            padding: 5px;
            border: 2px solid var(--cmt-color);
        }

        input.btnsubmit:hover {
            opacity: .8;
        }

        #myForm div input.btnsubmit,
        #myFormPhone div input.btnsubmit,
        #myFormPass div input.btnsubmit {
            cursor: pointer;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 700;
            background: var(--body-color);
            border: 1px solid var(--border-color);
            color: var(--color-color);
        }

        .updatename {
            margin-top: 30px;
            margin-left: 30px;
            display: flex;
            font-size: 17px;

        }

        .updatename button#showFormButton,
        button#showFormButtonPhone,
        button#showFormButtonPass {
            margin-left: 20px;
            border: 0;
            cursor: pointer;
            background: unset;
            color: blue;
            font-size: 17px;
        }

        .hidden {
            display: none;
        }
    </style>

    <script>
        function hideOtherForms(formId) {
            const forms = document.getElementsByTagName("form");
            for (let i = 0; i < forms.length; i++) {
                if (forms[i].id !== formId) {
                    forms[i].classList.add("hidden");
                }
            }
        }

        function toggleFormVisibility(button) {
            const formId = button.getAttribute("data-form-id");
            const form = document.getElementById(formId);
            if (form.classList.contains("hidden")) {
                hideOtherForms(formId);
                form.classList.remove("hidden");
            } else {
                form.classList.add("hidden");
            }
        }
        document.getElementById("showFormButton").addEventListener("click", function() {
            toggleFormVisibility(this);
        });
        document.getElementById("showFormButtonPhone").addEventListener("click", function() {
            toggleFormVisibility(this);
        });
        document.getElementById("showFormButtonPass").addEventListener("click", function() {
            toggleFormVisibility(this);
        });
    </script>
@endsection
