<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,minimum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>arael</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
        <!-- Styles -->

        <style>
            html,body {
                margin:0 auto;
                padding:0;
                /* background-image:url("{{ asset('images/arael-top.png') }}"); */
                background-size:cover;
                box-sizing: border-box;
                height:100%;
                width:100%;
                font-family:'Noto Sans JP',sans-serif;
                overflow:hidden;
                color:white;
            }

            .arael-top {
                background-color:white;
                position:absolute;
                height:100%;
                width:100%;
                opacity:0.4;
            }

            .opacity-box {
                position:absolute;
                height:100%;
                width:100%;
                display:flex;
                overflow:hidden;
                justify-content:center;
                align-items:center;
                opacity:0.7;
            }

            .box {
                position:relative;
                height:85vh;
                width:50vw;
                display:flex;
                justify-content:center;
                background-color:#7C7C7C;
                flex-direction: column;
            }

            .title {
                position:relative;
                height:20%;
                width:100%;
                display:flex;
                justify-content:center;
                align-items:center;
                color:rgba(255,255,255,1);
                font-size:2vw;
            }

            .login-form {
                position:relative;
                height:55%;
                width:100%;
                display:flex;
                flex-direction: column;
                font-size:1.2vw;
            }

            .pass, .invalid-pass, .signin, .guide {
                position:relative;
                width:100%;
                height:100%;
                display:flex;
                flex-direction: row;
                align-items:center;
                justify-content:center;
            }

            .pass-text {
                position:relative;
                height:100%;
                width:45%;
                display:flex;
                flex-direction:row;
                justify-content:center;
                align-items:center;
            }

            .password {
                position:relative;
                height:100%;
                width:55%;
                display:flex;
                align-items:center;
            }

            .password > input {
                position:relative;
                height:60%;
                width:80%;
                border-radius:10px;
                text-align:center;
                border:none;
                background-color:rgba(255,255,255,1);
                color:#00697A;
                font-size:1.2vw;

            }

            .signin {
                position:relative;
                height:100%;
                width:100%;
                display:flex;
                justify-content:center;
                align-items:center;
                opacity:1;
            }

            .signin > input {
                position:relative;
                height:100%;
                width:80%;
                border-radius:10px;
                background-color:#00DA9F;
                cursor:hand;
                cursor:pointer;
                opacity:1;
                color:rgba(255,255,255,1);
                font-size:2vw;

            }

            
        </style>
        
    </head>

    <body>

        <img src="{{ asset('images/arael-top-back.png') }}" class="arael-top">

        <div class="opacity-box">
            <div class="box">
                <div class="title">{{ $user }}へようこそ</div>

                <form method="post" class="login-form" action="{{ route('top') }}" enctype="multipart/form-data">
                @csrf

                    <input type="hidden" name="hidden" value="{{ $user }}"></input>
                    <div class="guide">
                        <p>会社のパスワードを入力してください</p>
                    </div>
                    <div class="pass">
                        <div class="pass-text"><i class="fas fa-lock"></i>　パスワード　　</div>
                        <div class="password">
                            <input type="password" class="@error('pass') is-invalid @enderror" name="pass" id="pass" placeholder="8文字以上で入力してください" required></input>
                        </div>
                    </div>
                    <div class="invalid-pass">
                    @error('pass')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="signin"><input type="submit" value="{{ $user }}のページへ入る"></input></div>
                </form>

            </div>
        </div>

        
    </body>
</html>
