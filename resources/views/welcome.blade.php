<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel 7
                </div>

                <div class="links">
                    <a  style=" margin:5px;font-size: xx-large; border: 1px solid black" href="{{url('product')}}">Product/media Library</a>
                    <a style="margin:5px; font-size: xx-large; border: 1px solid black" href="{{url('product/aaa')}}">VieW Trashed</a>
                    <hr>
                    <form method="post">
                        <a style="margin:5px; font-size: xx-large; border: 1px solid black" href="#">Social Login</a>
                        @csrf
                        <button style=" float : right; margin-top: 20px" formaction="{{url('/auth/facebook')}}" class="col-xs-3 btn btn-primary">Facebook</button>
                        <button style=" float: left; margin-top: 20px;margin-left: 20px;margin-right: 20px;" formaction="{{url('/auth/google')}}" class="col-xs-3 btn btn-danger"><i class="fa fa-google"></i> Google</button>
                    </form>
                    <hr>

                </div>

            </div>
        </div>
    </body>
</html>
