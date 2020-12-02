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
            display:flex;
            height:100vh;
            width:100vw;
            padding:0;
            margin:0 auto;
            font-size:4vm;
        }

        .side-menu {
            width:18vw;
            height:100vh;
            background-color:#62ABB6;
        }

        .side-menu > ul > li > a {
            display:flex;
            align-items:center;
            
        }
        .main-menu {
            display:flex;
            height:100vh;
            width:calc(100vw - 18vw);
        }

        .folder-menu {
            width:24vw;
            height:100vh;
            background-color:#CCE3E3;
            color:#007a7a;
            overflow-y:scroll;
            overflow-x:hidden;
            border: solid #E0E0E0 1px;

        
        }
        
        .main-contents {
            height:100vh;
            width:58vw;
            background-color:gray;
        }

        .main-header {
            background-color:green;
            height:80px;
            width:58vw;
            top:0px;
            position:absolute;
            display:flex;
        }

        .my-header {
            width:60%;
            background-color:red;
        }
        .account-settings {
            width:40%;
            background-color:blue;
        }
        .main-item {
            background-color:yellow;
            height:calc(100vh - 80px);
            width:58vw;
            top:80px;
            position:absolute;
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
            font-size:100%;
            display:block;
            text-decoration:none;
            padding-left:20px;
            /* border:solid 1px white; */
        }
      
        .search-text{
            height: 40px;
            width: calc(24vw - 80px);
            margin: 20px 40px;
            border: none;
            border-radius:4px;
            color: #00697A;
            font-family: "Font Awesome 5 Free", 'Noto Sans JP', 'sans-serif';
            font-weight: 600;
        }

        /* .folder-list {
            height:calc(100vh - 40px);
            position:fixed;
            top:80px;
            overflow-x:scroll;
        } */
        .folder-list > li {
            border:solid 1px white;
            height:80px;
            width:100%;
            display:flex;
            align-items:center;
            background-color:#e9f2f3;
        }

        
        .user-icon {
            height:50px;
            width:50px;
            border:solid 1px black;
            position:relative;
            margin:15px;
        }

        .user-text {
            position:relative;
            height:100%;
            display:flex;
            flex-flow:column;
        }
        .inner-circle > input {
            
        }
    
        /* .maru {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            flex-flow: column; 
            vertical-align: top;
            background-color:red;
            position:relative;
            left:10px;
        }
        /* 円の大きさ */
        /* .size_normal{
            width: 20px;
            height: 20px;
        } */
        /* 文字の大きさ */
        /* .letter3 {
            font-size: 15px;
            line-height: 7px;
        } */
        /* 円と文字の色 */
        /* .pink1 {
            color: black;
            border: 2px solid red;
            bakground-color:red;
        } */ 
        .inner-circle {
            display:flex;
            width:100%;
            position:relative;
            height:20px;
            top:30%;
        }
        .circle{
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background: red;
                text-align: center;
                color:white;
            }

        .my-header-title {
            width:40%;
            background-color:#e9f2f3;
        }

        .my-header-items {
            width:60%;
            background-color:#40px;
        }
        .user-message-info {
            display:flex;
            height:10%;
        }

        .messageLine {
                overflow: auto;
                border-right: 1px solid #555;
                border-left: 1px solid #555;
            }
            ..opponent {
                float: left;
                line-height: 1.3em;
            }
            .opponent .message_box {
                max-width: 100%;
                font-size: 17px;
                background: #fff;
                border: 1px solid #999;
                border-radius: 0px 30px 30px 30px;
                margin-left: 50px;
            }
    </style>
    
    <!-- ここにアプリのscriptタグを貼り付けます。 -->

        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
            https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-analytics.js"></script>

        <script src="https://www.gstatic.com/firebasejs/7.9.3/firebase-auth.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.9.3/firebase-database.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.6.1/firebase-storage.js"></script>
        <script>
            // Your web app's Firebase configuration
            var firebaseConfig = {
                
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            firebase.analytics();
        </script>
</head>

<body>
    <div class="side-menu">
        <ul>
            <li><a href="#"><i class="fas fa-home"></i><span>ホーム</span></a></li>
            <li><a href="#"><i class="fas fa-tasks"></i><span>タスク</span></a></li>
            <li><a href="#"><i class="far fa-comment-alt"></i><span>トーク</span></a></li>
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
