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
            background-color:lime;
         
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
        ul {
            list-style:none;
            padding:0;
            margin:0;
        }
        li a {
            height:50px;
            width : 100%;
            color:white;
            text-align:left;
            font-size:30px;
        }
        a {
            display:block;
            text-decoration:none;
            padding-left:20px;
        }
        li {
            border:solid 1px white;
        }
            
    </style>
</head>

<body>
    <div class="side-menu">
        <ul>
            <li><a href="#"><i class="fas fa-home"></i><span>ホーム</span></a></li>
            <li><a href="#"><i class="fas fa-tasks"></i><span>タスク</span></a></li>
            <li><a href="#"><i class="fas fa-book-open"></i><span>ノート</span></a></li>
            <li><a href="#"><i class="far fa-folder"></i><span>ファイル共有</span></a></li>
            <li><a href="#"><i class="far fa-file-alt"></i><span>レポート</span></a></li>

        </ul>
    </div>
    <div id="example"></div>
        <script src="{{asset('/js/app.js')}}"></script>
    <div>
</body>

</html>
