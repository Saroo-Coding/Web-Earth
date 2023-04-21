@extends('client.pages.group.group')

@section('btn_group')

<div class="containers_file">
    <div class="wrapper_file">
        <div class="name_file">
            <h4>File phương tiện</h4>
        </div>
        <div class="file_image_container">
            <div class="file_image_wrapper" >
                {{-- ảnh  --}}
                @foreach ($post as $item)
                    @if ($item['img1'] != "Khong")
                        <div class="file_image"><img src="{{$item['img1']}}" alt=""></div>
                    @else
                    @endif
                    @if ($item['img2'] != "Khong")
                        <div class="file_image"><img src="{{$item['img2']}}" alt=""></div>
                    @else
                    @endif
                    @if ($item['img3'] != "Khong")
                        <div class="file_image"><img src="{{$item['img3']}}" alt=""></div>
                    @else
                    @endif
                @endforeach
                {{-- end ảnh  --}}
            </div>
        </div>
    </div>
</div>
@endsection