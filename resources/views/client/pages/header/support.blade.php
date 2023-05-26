@extends('client.layout.indexlayout');
@section('title')
    Hỗ trợ | Earth
@endsection

@section('content')
    <div class="card_sp">
        <img src="{{ asset('img/support.png') }}" alt="img" style="width:100%">
        <div class="wrapper_sp">
            <h3 class="name_sp">Mật khẩu</h3>
            <p>Nếu biết mật khẩu hiện tại của mình, bạn có thể <a class="mk" href="{{route('setting')}}">đổi mật khẩu</a>. Khi tạo mật khẩu mới, hãy lưu ý:</p>
            <ul>
                <li>Mật khẩu nên dễ nhớ với bạn nhưng khó đoán với người khác.</li>
                <li>Mật khẩu nên khác với mật khẩu mà bạn sử dụng để đăng nhập tài khoản khác, như email hoặc tài khoản ngân hàng.</li>
                <li>Mật khẩu càng dài càng an toàn.</li>
                <li>Không nên sử dụng email, số điện thoại hay sinh nhật của bạn làm mật khẩu.</li>
            </ul>
        </div>
    </div>
    {{--  --}}
    <div class="card_sp">
        <img src="{{ asset('img/support-1.png') }}" alt="img" style="width:100%">
        <div class="wrapper_sp">
            <h3 class="name_sp">Trang chủ của bạn</h3>
            <p>Trang chủ của bạn là những gì bạn nhìn thấy khi đăng nhập. Trang chủ bao gồm Bảng tin, nghĩa là danh sách liên tục được cập nhật gồm các bài viết từ bạn bè, nhóm bạn tham gia</p>
        </div>
    </div>
    {{--  --}}
    <div class="card_sp">
        <img src="{{ asset('img/support-2.jpg') }}" alt="img" style="width:100%">
        <div class="wrapper_sp">
            <h3 class="name_sp">Kết bạn</h3>
            <p>Tính năng kết bạn sẽ kết nối bạn với những người mà bạn quan tâm. Khi bạn thêm một người nào đó làm bạn bè, bạn và họ có thể thấy hoạt động của nhau trong Bài viết và Ảnh.</p>
            <p>Khi bạn muốn thêm bạn bè, hãy lưu ý:</p>
            <ul>
                <li>Bạn nên gửi lời mời kết bạn đến những người mà mình biết và tin cậy. Thêm bạn bè bằng cách tìm kiếm họ hoặc thêm trực tiếp từ Những người bạn có thể biết.</li>
                <li>Nếu bạn không muốn ai đó thấy mình trên Earth, hãy tìm hiểu cách hủy kết bạn hoặc chặn họ.</li>
                <li>Bạn có thể có tối đa 100 bạn bè cùng một lúc.</li>
            </ul>
        </div>
    </div>
    {{--  --}}
    <div class="card_sp">
        <div class="wrapper_sp">
            <h3 class="name_sp">Cách tạo tài khoản</h3>
            <p>Lưu ý: Bạn phải từ 13 tuổi trở lên thì mới tạo được tài khoản.</p>
            <p>Tạo tài khoản Earth</p>
            <ol type="1">
                <li>Truy cập Earth và nhấp vào Tạo tài khoản mới.</li>
                <li>Nhập tên, email hoặc số điện thoại di động, mật khẩu, ngày sinh và giới tính của bạn.</li>
                <li>Nhấp vào Đăng ký.</li>
                <li>Để hoàn tất quá trình tạo tài khoản, bạn cần xác nhận email hoặc số điện thoại di động của mình.</li>
            </ol>
            <p>Mọi chi tiết xin liên hệ hotline: <a href="#">094 2809417</a>.</p>
        </div>
    </div>
    <style>
        .wrapper_sp p{
            margin-top: 15px;
            color: var(--color-color);
            font-size: 17px;
            margin-bottom: 5px;
        }
        .wrapper_sp p a.mk{
            text-decoration:underline ;
            color: blue;
            font-size: 17px;
        }
        .wrapper_sp ul, ol {
            margin-left: 25px;
            color: var(--color-color);
            font-size: 17px;
        }
        .wrapper_sp ul li , ol li{
            margin: 15px;
        }
        .card_sp {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 800px;
            height: auto;
            margin: 100px auto;
            font-family: arial;
            border: 2px solid var(--border-color);
            background: var(--bg-color);
            border-radius: 5px;
        }
        .card_sp .wrapper_sp{
            padding: 20px;
        }
        .card_sp img {
            height: 250px;
            object-fit: contain;
            background: white;

        }

        .card_sp h3.name_sp {
            color: var(--color-color);
            font-size: 25px;

        }

        .title_sp {
            color: grey;
            font-size: 18px;
        }
    </style>
@endsection