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
                height:60%;
                width:100%;
                display:flex;
                flex-direction: column;
                font-size:1.2vw;
            }

            .area, .invalid, .signin {
                position:relative;
                width:100%;
                height:100%;
                display:flex;
                flex-direction: row;
                align-items:center;
                justify-content:center;
            }

            .text{
                position:relative;
                height:100%;
                width:45%;
                display:flex;
                flex-direction:row;
                justify-content:center;
                align-items:center;
            }

            .mail-address, .password,.name,.email,.url {
                position:relative;
                height:100%;
                width:55%;
                display:flex;
                align-items:center;
            }

            input {
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

            .signup {
                position:relative;
                height:100%;
                width:100%;
                display:flex;
                justify-content:center;
                align-items:center;
                opacity:1;
            }

            .signup > input {
                position:relative;
                height:100%;
                width:80%;
                border-radius:10px;
                background-color:#00DA9F;
                cursor:hand;
                cursor:pointer;
                opacity:1;
                color:rgba(255,255,255,1);
                font-size:1.2vw;

            }

            .tologin {
                position:relative;
                height:20%;
                width:100%;
                display:flex;
                justify-content:center;
                align-items:center;
                flex-flow:column;
            }

            .tologin-title {
                position:relative;
                display:flex;
                flex-direction:row;
                width:100%;
                align-items:center;
            }

            hr {
                position:relative;
                width:18%;
                background-color:white;
                border:none;
                height:1px;
            }

            p {
                font-size:1vw;
            }

            a {
                font-size:1vw;
                color:white;
                text-decoration:none;
            }

            .invalid {
                color:red;
            }

        </style>
        
    </head>

    <body>

        <img src="{{ asset('images/arael-top-back.png') }}" class="arael-top">

        <div class="opacity-box">
            <div class="box">
                <div class="title">企業アカウント作成</div>

                <form method="post" class="login-form" action="{{ route('company.register') }}" enctype="multipart/form-data">
                @csrf
                    <div class="area">
                        <div class="text"><i class="far fa-user"></i>　企業名　　　　　</div>
                        <div class="name">
                            <input type="text" class="@error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="" required></input>
                        </div>
                    </div>
                    <div class="invalid">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="area">
                        <div class="text"><i class="fas fa-link"></i>　企業用のurl　　　</div>
                        <div class="url">
                            <input type="text" class="@error('url') is-invalid @enderror" name="url" id="url" value="{{ old('url') }}" placeholder="" required></input>
                        </div>
                    </div>
                    <div class="invalid">
                        @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="area">
                        <div class="text"><i class="far fa-envelope"></i>　メールアドレス　</div>
                        <div class="mail-address">
                            <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="example@example.com" required></input>
                        </div>
                    </div>
                    <div class="invalid">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="area">
                        <div class="text"><i class="fas fa-lock"></i>　パスワード　　　</div>
                        <div class="password">
                            <input type="password" class="@error('password') is-invalid @enderror" name="password" id="password" placeholder="8文字以上で入力してください" required></input>
                        </div>
                    </div>
                    <div class="invalid">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="area">
                        <div class="text"><i class="fas fa-redo"></i>　パスワード再入力</div>
                        <div class="password">
                            <input type="password" class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="8文字以上で入力してください" required></input>
                        </div>
                    </div>
                    <div class="invalid">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="signup"><input type="submit" value="アカウントを作成"></input></div>
                </form>

                <div class="tologin">
                    <div class="tologin-title">
                        <hr>
                        <p>すでにアカウントをお持ちですか？</p>
                        <hr>
                    </div>
                    <a href="{{ route('company.login')}}">アカウントをお持ちの方はこちらへ</a>
                    <a href="http://localhost:8000/">トップページへ戻る</a>
                </div>
            </div>
        </div>

        
    </body>
</html>
