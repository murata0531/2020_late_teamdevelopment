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
            margin:0;
            padding:0;
            background-image:url("{{ asset('images/arael-top.png') }}");
            background-size:cover;
            box-sizing: border-box;
            height:100vh;
        }

        .opacity-box {
            background: var(--unnamed-color-ffffff) 0% 0% no-repeat padding-box;
            background: #FFFFFF 0% 0% no-repeat padding-box;
            opacity: 0.5;
            height:100vh;
            width:100vw;
            display:flex;
            justify-content:center;
        }

        .box1 {
            height:100vh;
            width:50vw;
            background-color:red;
        }

        .box2 {
            height:100vh;
            width:50vw;
            background-color:blue;
        }
    </style>
    
</head>

<body>

    <div class="opacity-box">
        <div class="box1">

        </div>
        <div class="box2">
        </div>
    </div>
</body>

</html>
