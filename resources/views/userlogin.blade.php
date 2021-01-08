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
            }

            .box {
                position:relative;
                height:80vh;
                width:60vw;
                display:flex;
                justify-content:center;
                background-color:black;
                opacity:0.5;
                flex-direction: column;
            }

            .title {
                position:relative;
                height:20%;
                width:100%;
                background-color:red;
            }

            .login-form {
                position:relative;
                height:60%;
                width:100%;
                background-color:blue;
            }

            .toregister {
                position:relative;
                height:20%;
                width:100%;
                background-color:green;
            }

        </style>
        
    </head>

    <body>

        <img src="{{ asset('images/arael-top-back.png') }}" class="arael-top">
        <div class="opacity-box">
            <div class="box">
                <div class="title">ユーザサインイン</div>
                <form method="post" class="login-form">
                @csrf
                    <div class="mail">
                        <div class="mail-text"><i class="far fa-envelope"></i>メールアドレス</div>
                        <div class="mail-address"><input type="email" placeholder="example@example.com"></input></div>
                    </div>
                    <div class="invalid-mail"></div>
                    <div class="pass">
                        <div class="pass-text"><i class="fas fa-lock"></i>パスワード</div>
                        <div class="password"><input type="password" placeholder="aaa"></input></div>
                    </div>
                    <div class="invalid-pass"></div>

                    <input type="submit" value="サインイン"></input>
                </form>

                <div class="toregister"></div>
            </div>
        </div>

        
    </body>
</html>
