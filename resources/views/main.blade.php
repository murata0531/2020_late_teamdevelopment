<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
                height:100vh;
                font-family:'Noto Sans JP',sans-serif;
                overflow-y:hidden;
            }

            .arael-top {
                background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;
                background: #FFFFFF 0% 0% no-repeat padding-box;
                position:absolute;
                height:100vh;
                width:100vw;
                opacity:0.4;
            }
            .opacity-box {
                position:absolute;
                height:100vh;
                width:100vw;
                display:flex;
                flex-flow: column;
            }

            .box1 {
                height:60%;
                width:100%;
                display:flex;
                justify-content:center;
            }

            .box2 {
                height:40%;
                width:100%;
                display:flex;
                /* justify-content:center; */
                align-items:center;
            }

            .title {
                height:100%;
                width:50%;
                display:flex;
                flex-flow:column;
                justify-content:center;
                opacity:1;
            }

            #catch-copy, #tool,#title-text {
                position:relative;
                mix-blend-mode: normal;
                opacity: 1;
                left:20%;
            }

            #catch-copy {
                top:100px;
                font-size:2vw;
                color:#62ABB6;
            }
            #tool {
                top:90px;
                font-size:1.2vw;
                font: normal normal normal;
                letter-spacing: 0px;
                color: #83CECE;
            }
            
            #title-text {
                font-size:5vw;
                font: normal normal normal;
                letter-spacing: 1.5vw;
                color: var(--unnamed-color-ffffff);
                color: white;
                text-shadow: 1px 5px 1vw #3da6a6;
            }
            .logo {
                position:relative;
                width:50%;
                height:100%;
                display:flex;
                align-items:center;

            }

            .logo-area {
                position:relative;
                height:100%;
                width:100%;
            }
            .logo-area > img {
                position:relative;
                top:10vh;
                height:60vh;
                width:auto;
                background: transparent 0% 0% no-repeat padding-box;
                z-index:1;
                opacity:1;
                /* background: transparent url("{{ asset('images/ARAEL.png') }}") 0% 0% no-repeat padding-box; */
            }

            .arael-shadow {
                position:absolute;
                top:21vh;
                left:30vh;
                height:40vh;
                width:40vh;
                transform: rotate(45deg);
                opacity: 0.5;
                background: #00DA9F 0% 0% no-repeat padding-box;
            }

            form {
                display:flex;
                position:relative;
                top:10%;
            }
            .url-field {
                position:relative;
                top:10%;
                left:10%;
                display:flex;
                align-items:center;
                height:10vh;
                width:40vw;
                background: var(--unnamed-color-62abb6) 0% 0% no-repeat padding-box;
                background: #62ABB6 0% 0% no-repeat padding-box;
                border-radius: 10px;
                opacity: 1;
                font-size:1.2vw;
            }

            .url-field > p {
                position:relative;
                left:15%;
                color: var(--unnamed-color-ffffff);
                text-align: center;
                letter-spacing: 4px;
                color: #FFFFFF;
                opacity: 1;
            }
            .url-field > input {
                position:relative;
                left:15%;
                height:40%;
                width:30%;
                text-align:center;
                background: #FFFFFF 0% 0% no-repeat padding-box;
                border-radius: 4px;
                opacity: 1;
            }

            .url-field > select {
                position:relative;
                left:20%;
                height:40%;
                width:20%;
                background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;
                background: #FFFFFF 0% 0% no-repeat padding-box;
                opacity: 1;
                -moz-appearance: none;
                -webkit-appearance: none;
                appearance: none;
            }

            .signin {
                position:relative;
                top:10%;
                height:10vh;
                width:17vw;
                left:13%;
                background: var(--unnamed-color-00da9f) 0% 0% no-repeat padding-box;
                /* background: #00DA9F 0% 0% no-repeat padding-box; */
                background-color:rgba(0, 218, 159, 0.5);
                border-radius: 10px;
                opacity: 1;

                text-align: center;
                letter-spacing: 4.8px;
                color: rgba(255,255,255,1);
                font-size:1.2vw;
                cursor:pointer;
                cursor:hand;
                font-size:1.2vw;
            }

            /* .signin > p {
                color: var(--unnamed-color-ffffff);
                text-align: center;
                letter-spacing: 4.8px;
                color: #FFFFFF;
                font-size:1.2vw;
                opacity: 1;
            } */

            .company {
                position:relative;
                top:10%;
                height:10vh;
                width:20vw;
                left:15%;
                background: var(--unnamed-color-4b8999) 0% 0% no-repeat padding-box;
                background: #4B8999 0% 0% no-repeat padding-box;
                border-radius: 10px;
                opacity: 0.5;
                cursor:pointer;
                cursor:hand;
            }

            /* .company > a > p {
                color: var(--unnamed-color-ffffff);
                text-align: center;
                letter-spacing: 4.8px;
                color: #FFFFFF;
                font-size:1.2vw;
                opacity: 1;
                position:relative;
                width:100%;
                height:100%;
            } */

             a {
                text-decoration:none;
                color:rgba(255,255,255,1);
                position:relative;
                height:100%;
                width:100%;
                text-align:center;
                letter-spacing: 4.8px;
                font-size:1.2vw;
            } 

        </style>
        
    </head>

    <body>

        <img src="{{ asset('images/arael-top-back.png') }}" class="arael-top">
        <div class="opacity-box">
            <div class="box1">
                <div class="title">
                    <p id="catch-copy">就 業 記 録 を 簡 単 に 。</p>
                    <p id="tool">マルチコミュニケーションツール</p>
                    <p id="title-text">ARAEL</p>
                </div>
                <div class="logo">
                    <div class="logo-area">
                        <img src="{{ asset('images/ARAEL.png') }}">
                        <div class="arael-shadow">
                        </div>
                    </div>
                </div>
            </div>
            <div class="box2">
                <form>
                    @csrf

                    <input type="hidden">
                    <div class="url-field">
                        <p>https://</p>
                        <input type="text" id="text" required onchange="change1();">
                        <select name="domain">
                            <option>arael.ne.jp</option>
                        </select>
                    </div>
                    <button type="button" class="signin"><a id="target">サインイン</a></button>
                </form>
                <button class="company"><a>企業管理ページへ</a></button>
                
            </div>
        </div>

        <script>

            const target = document.getElementById("target");

            function change1(){
                const text = document.getElementById('text').value;
                
                target.href = "http://" + text + ".localhost:8000/";
                alert(target.href);
            }
            
        </script>
    </body>
</html>
