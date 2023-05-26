@extends('client.layout.indexlayout');
@section('title')
    Đóng góp ý kiến | Earth
@endsection

@section('content')
    <div style="display: block" class="container_contribute" id="container_contribute">
        <form>
            @csrf
            <label for="subject">Viết đóng góp cho chúng tôi</label>
            <label id="name" style="display: none" for="subject">{{$user['fullName']}}</label>
            <label id="email" style="display: none" for="subject">{{$user['email']}}</label>
            <textarea id="subject" class="subject" name="subject" placeholder="Bạn có ý tưởng gì..."
                style="height:200px;font-size: 19px"></textarea>
            <button type="button" onclick="sendContribute()" style="width:100%; font-size:23px">Gửi đóng góp</button>
        </form>
    </div>
    <div id="thongbao" style=" border-radius: 15px; background-color: var(--bg-color); margin: 80px auto; width: 50%; padding: 30px;display: none">
        <img src="{{ asset('img/thankyouwebinar.jpg') }}" alt="img" style="width:100%">
    </div>
    <style>
        .container_contribute h4 {
            color: red;
        }

        .container_contribute form label {
            color: var(--color-color);
            font-weight: 600;
            font-size: 20px;
        }

        .container_contribute {
            border-radius: 5px;
            background-color: var(--bg-color);
            border: 2px solid var(--border-color);
            margin: 80px auto;
            width: 60%;
            padding: 30px;
        }

        textarea.subject {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: var(--color-color);
            box-sizing: border-box;
            margin-top: 15px;
            margin-bottom: 16px;
            resize: none;
            background-color: var(--bg-color);
        }

        input[type=submit].btn-contribute {
            background-color: var(--header-color);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            font-size: 17px;
        }

        input[type=submit].btn-contribute:hover {
            opacity: .7;
        }

        button {
            background-color: #444141;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            border: none;
        }

        button:hover {
            background-image: linear-gradient(90deg, #53cbef 0%, #dcc66c 50%, #ffa3b6 75%, #53cbef 100%);
            animation: slidernbw 5s linear infinite;
            color: #000;
        }

        @keyframes slidernbw {
            to {
                background-position: 20vw;
            }
        }
    </style>
@endsection
