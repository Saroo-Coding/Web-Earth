<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo-E.png') }}" type="image/x-icon">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <title>Earth</title>
</head>
<body>
    <div class="container p-5 d-flex justify-content-center ">
        <div class="col-6 mx-5 bg-white border rounded p-4 shadow-sm" style="display: block" id="forget">
                <h2 class="text-center mb-3 text-danger">Quên mật khẩu</h2>
                <h5 class="text-center mb-3">Hãy nhập gmail và số điện thoại</h5>
            <form>
                <div class="mb-3">
                    <label for="email" class="form-label">Gmail</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="phone" required>
                </div>
                <button style="width: 100%; font-size:23px" id="forgetPass" type="button" class="btn my-2 text-white bg-danger">Submit</button>
                <p class="text-center mt-2">Đã có tài khoản?<a href="{{ route('login') }}"> Đăng nhập ngay</a></p>
            </form>
        </div>
        <div class="col-6 mx-5 border rounded p-4 shadow-sm" style="background-color: cornsilk;display: none;" id="success">
            <div class="text-center mb-3 text-danger">
                <p style="font-size: xxx-large;border-radius: 60px;padding: 10px;">✔</p>
            </div>
            <h2 class="text-center mb-3 text-danger">✨ Tìm tài khoản thành công ✨</h2>
            <br>
            <h4 class="text-center mb-3">Hãy truy cập gmail để kiểm tra thông tin tài khoản</h4>
            <br>
            <a href="{{ route('login') }}">
                <button style="width: 100%; font-size:23px" id="forgetPass" type="button" class="btn my-2 text-white bg-danger">Đăng nhập ngay</button>
            </a>
        </div>
    </div>
    <script src="{{asset('assets/js/login.js')}}"></script>
</body>
</html>