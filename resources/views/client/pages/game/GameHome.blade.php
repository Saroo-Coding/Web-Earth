@extends('client.layout.indexlayout')

@section('title')
    Game | Earth
@endsection

@section('content')
    <div style="justify-content: center" class="container_friendhome">
        <div class="right_sidebar_friendhome">
            <div class="wrappers_friendhome">
                <div class="name_addfriend">
                    <h3>Game House</h3>
                </div>
                <div class="containers_right">
                    <div class="wrappers_right">
                        <div class="wrapper_friends">
                            <div class="img_friends">
                                <a href="{{ route('Menja') }}"><img src="{{asset('img/menja.jpg')}}" alt="Menja"></a>
                            </div>
                            <div class="nameh2">
                                <h4>Game Menja</h4>
                            </div>
                            <div class="btn_add">
                                <button type="button">Play Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="wrappers_right">
                        <div class="wrapper_friends">
                            <div class="img_friends">
                                <a href="{{ route('TheCube') }}"><img src="{{asset('img/Cube.jpg')}}" alt="The Cube"></a>
                            </div>
                            <div class="nameh2">
                                <h4>The Cube</h4>
                            </div>
                            <div class="btn_add">
                                <button type="button">Play Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="wrappers_right">
                        <div class="wrapper_friends">
                            <div class="img_friends">
                                <a href="{{ route('Game2048') }}"><img src="{{asset('img/2048.jpg')}}" alt="2048"></a>
                            </div>
                            <div class="nameh2">
                                <h4>Game 2048</h4>
                            </div>
                            <div class="btn_add">
                                <button type="button">Play Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
