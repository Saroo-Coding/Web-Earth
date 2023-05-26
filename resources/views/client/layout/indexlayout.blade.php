<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('img/logo-E.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/friend.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/image.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/introdu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/group.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home_friend.css') }}">
    <script src="https://smtpjs.com/v3/smtp.js"></script>
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
    @include('client.pages.chat')
    {{-- -------------------- END FOOTER ------------------------ --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>
    <script src="{{ asset('assets/js/header.js') }}"></script>
    <script src="{{ asset('assets/js/image.js') }}"></script>
    <script src="{{ asset('assets/js/introdu.js') }}"></script>
    <script src="{{ asset('assets/js/seach.js') }}"></script>
</body>

</html>
