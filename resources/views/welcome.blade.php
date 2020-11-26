<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>arael</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.13.0/css/all.css" rel="stylesheet">
    <!-- Styles -->




    <style>
        body {
            display:flex;
            height:100vh;
            width:100vw;
            padding:0;
            margin:0 auto;
        }

        .side-menu {
            width:18vw;
            height:100vh;
            background-color:red;
         
        }

        .main-menu {
            display:flex;
            height:100vh;
            width:calc(100vw - 18vw);
        }

        .folder-menu {
            width:24vw;
            height:100vh;
            background-color:blue;
        
        }
        
        .main-contents {
            height:100vh;
            width:58vw;
            background-color:gray;
        }

        .main-header {
            background-color:green;
            height:100px;
            width:58vw;
            top:0px;
            position:absolute;
        }

        .main-item {
            background-color:yellow;
            height:calc(100vh - 100px);
            width:58vw;
            top:100px;
            position:absolute;
        }
        p {
           text-align:center;
        }
            
    </style>
</head>

<body>
    <div class="side-menu">
        <p>box2</p>
    </div>
    <div id="example"></div>
        <script src="{{asset('/js/app.js')}}"></script>
    <div>
</body>

</html>
