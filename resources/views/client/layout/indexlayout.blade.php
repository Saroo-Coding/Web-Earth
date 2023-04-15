<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/friend.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/image.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/introdu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home_friend.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    {{-- -------------------- HEADER ------------------------ --}}
    @include('client.blocks.header')
    {{-- -------------------- END HEADER ------------------------ --}}

    {{-- --------------------  ------------------------ --}}
    @yield('content')
    {{-- --------------------  ------------------------ --}}

    {{-- -------------------- FOOTER ------------------------ --}}
    {{-- @include('client.blocks.footer'); --}}
    {{-- -------------------- END FOOTER ------------------------ --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/image.js') }}"></script>
    <script src="{{ asset('assets/js/introdu.js') }}"></script>
    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js"
        integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous">
    </script>

    <script>
        let ip = '127.0.0.1';
        let socket_port = '3000';
        const socket = io(ip + ':' + socket_port);//{transports: ['websocket'], upgrade: false} ko dung http polling
        var cookie = document.cookie.split(";").map(cookie => cookie.split("=")).reduce((accumulator, [key, value]) => ({...accumulator,[key.trim()]: decodeURIComponent(value)}), {});

        //user online
        socket.emit('send_online', cookie.user);//gui id len sever
        socket.on('get_online', userId => {//nhan id tu sever
            document.getElementById('onl-' + userId).className += ' online-dot';//document.getElementById('onl-' + user).classList.remove('online-dot');
        });
        
        //nhan cmt tu sever
        socket.on('get_Cmt', (cmt) => {
            let html = `
            <div id="user-cmt" class="user-cmt">
                <img id="img_cmt" src="${cmt.img}">
                <div class="name-user">
                    <div class="user-container">
                        <div class="name-user-cmt">
                            <h4>${cmt.name}</h4>
                            <p class="cmtt">${cmt.content}</p>
                        </div>
                    </div>
                </div>
            </div>`;
            document.getElementById("cmt_" + cmt.postId).value = "";
            document.getElementById("user-cmt_" + cmt.postId).insertAdjacentHTML("afterend", html);
            document.getElementById("count_cmt_" + cmt.postId).innerHTML = parseInt(document.getElementById("count_cmt_" + cmt.postId).innerHTML) + 1;
        });
    </script>
</body>

</html>
