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
            height:70%;
            width:100%;
            display:flex;
            justify-content:center;
        }

        .box2 {
            height:30%;
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
            top:50px;
            font-size:2vw;
            color:#62ABB6;
        }
        #tool {
            top:40px;
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
            text-shadow: 0px 0px 7vw #3da6a6;
        }
        .logo {
            width:50%;
            display:flex;
            align-items:center;

        }
        .logo > img {
            position:relative;
            top:20px;
            height:75%;
            width:auto;
            background: transparent 0% 0% no-repeat padding-box;
            opacity:1;
            /* background: transparent url("{{ asset('images/ARAEL.png') }}") 0% 0% no-repeat padding-box; */
        }

        .arael-shadow {
            position:relative;
            left:50%;
            top:20px;
            height:75%;
            transform: matrix(0.71, 0.71, -0.71, 0.71, 0, 0);
            background: var(--unnamed-color-00da9f) 0% 0% no-repeat padding-box;
            background: #00DA9F 0% 0% no-repeat padding-box;
            opacity: 0.5;
        }

        .url-field {
            position:absolute;
            left:10%;
            display:flex;
            justify-content:space-around;
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
            color: var(--unnamed-color-ffffff);
            text-align: center;
            letter-spacing: 4px;
            color: #FFFFFF;
            opacity: 1;
        }
        .url-field > input {
            position:relative;
            height:40%;
            width:40%;
            background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            border-radius: 4px;
            opacity: 1;
        }

        .url-field > select {
            position:relative;
            height:50%;
            width:20%;
            background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            opacity: 1;
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
                <img src="{{ asset('images/ARAEL.png') }}">
                <div class="arael-shadow"></div>
            </div>
        </div>
        <div class="box2">
            <div class="url-field">
                <p>https://</p>
                <input type="text">
                <select>
                    <option>arael.ne.jp</option>
                </select>
            </div>
        </div>
    </div>
</body>

</html>
