<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('assets/css/Game2048.css')}}">
    <title>2048</title>
</head>
<body>
    <div class="container">
        <div class="heading">
            <h1 class="title">2048</h1>
            <div class="score-container">0</div>
        </div>
        <p class="game-intro">Join the numbers and get to the <strong>2048 tile!</strong></p>

        <div class="game-container">
            <div class="game-message">
                <p></p>
                <div class="lower">
                    <a class="retry-button">Try again</a>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
                <div class="grid-row">
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                    <div class="grid-cell"></div>
                </div>
            </div>
            <div class="tile-container">
            </div>
        </div>
    </div>
    <!-- partial -->
    <script src='//cdnjs.cloudflare.com/ajax/libs/hammer.js/1.0.6/hammer.min.js'></script>
    <script src="{{asset('assets/js/Game2048.js')}}"></script>
</body>

</html>
