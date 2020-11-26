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
        *{
            margin: 0px;
            padding: 0px;
        }

        .box1 {
        }
        .box2 {
            width:18vw;
            height:100vh;
            background-color:red;
            position:absolute;
        }

        .box3 {
            width:24vw;
            height:100vh;
            background-color:blue;
            position:absolute;
            left:18vw;
        }
        
        .box4 {
            height:100vh;
        }

        .box5 {
            background-color:green;
            height:190px;
            position:absolute;
        }

        .box6 {
            background-color:yellow;
            height:calc(100vh - 190px);
            position:absolute;
        }
            
    </style>
</head>

<body>

    <div  class="box1">
    <div id="example"></div>
        <script src="{{asset('/js/app.js')}}"></script>
    <div>
    <div>
    
</body>

</html>
