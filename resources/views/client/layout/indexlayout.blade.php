
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" 
     crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/header.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/profile.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/friend.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/image.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/introdu.css')}}">
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
    @include('client.blocks.footer');
    {{-- -------------------- END FOOTER ------------------------ --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{asset('assets/js/home.js')}}"></script>
    <script src="{{asset('assets/js/header.js')}}"></script>
    <script src="{{asset('assets/js/image.js')}}"></script>
    <script src="{{asset('assets/js/info.js')}}"></script>
    <script src="{{asset('assets/js/introdu.js')}}"></script>
    
</body>
</html>