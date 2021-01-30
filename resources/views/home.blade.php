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
        *{
            margin: 0px;
            padding: 0px;
        }
        html,body {
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            height: 100vh;
            width: 100vw;
            padding: 0;
            margin: 0 auto;
            font-size: 4vm;
            font-family: 'Noto Sans JP', sans-serif;
            position: fixed;
        }
        ul {
            list-style: none;
            
        }
        li,a {
            position:relative;
            height: 50px;
            width: 100%;
            color: white;
            text-align: center;
            font-size: 95%;
            text-decoration: none;
            display:flex;
            align-items:center;
        }

        #home-li {
            background:#4B8999;
            text-align:center;
        }

        /*サイドメニュー*/
        .side-menu {
            width: 18vw;
            height: 100vh;
            background-color: #62ABB6;
        }
     
        span {
            position:relative;
            text-align:center;
            display:flex;
            width:90%;
            height:100%;
            left:10%;
            align-items:center;
        }

        .logout {
            position:relative;
            text-align:center;
            display:flex;
            width:100%;
            height:100%;
            padding-left:10%;
            align-items:center;
            background-color:#F36B6B;
        }

        #user-profile {
            position:relative;
            display:flex;
            width:100%;
            height:80px;
            flex-direction:row;
            background-color:#00697A;
            
        }

        #user-profile > img {
            position:relative;
            height:60%;
            width:auto;
            margin:10px;
        }
        #user-profile > p {
            position:relative;
            font-size:1.2vw;
        }

        /*main-menu: folder +  main-contents*/
        .main-menu {
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            height: 100vh;
            width: calc(100vw - 18vw);
            
        }
        /*トーク一覧*/
        .folder-menu {
            position:relative;
            width: 24vw;
            height: 100vh;
            background-color: #CCE3E3;
            color: #007a7a;
            border: solid #E0E0E0 1px;
            
        }

        .search-back {
            position:relative;;
            top:0px;
            height:80px;
            width:100%;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .search-text {
            position:relative;
            height: 40%;
            width: 80%;
            border: none;
            border-radius: 4px;
            color: #00697A;
            font-family: "Font Awesome 5 Free", 'Noto Sans JP', 'sans-serif';
            font-weight: 600;
            
        }
        .folder-list {
            position: relative;
            height: calc(100%  - 80px);
            width: 100%;
            overflow-y:scroll;
            -ms-overflow-style: none;    /* IE, Edge 対応 */
            scrollbar-width: none;       /* Firefox 対応 */
            
        }

        .folder-list > li {
            position:relative;
            border: solid 1px white;
            height: 100px;
            width: 24vw;
            display: flex;
            flex-direction: row;
            display:-webkit-box;
  	        display:-ms-flexbox;
            align-items: center;
            -webkit-box-align: center;
	        -ms-flex-align: center;
            background-color: #e9f2f3;
            overflow-x:scroll;
            -ms-overflow-style: none;    /* IE, Edge 対応 */
            scrollbar-width: none;       /* Firefox 対応 */
            color: #00697A;
        }

        .folder-list::-webkit-scrollbar,.folder-list > li::-webkit-scrollbar {  /* Chrome, Safari 対応 */
            display:none;
        }

        .add {
            position:relative;
            width:100%;
            height:100%;
            display:flex;
            justify-content:center;
            text-align:center;
            align-items:center;
            background-color: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            padding: 0;
            appearance: none;
            color: #00697A;
        }

        #modal-add {
            color:blue;
            height:60%;
            width:70%;
            display:flex;
            flex-flow:column;
        }

        #modal-add > h2 {
            position:relative;
            width:100%;
            height:10%;
        }
        #modal-add > #modal-form {
            position:relative;
            width:100%;
            height:80%;
            display:flex;
            flex-flow:column;
            align-items: center;
            justify-content:space-around;
        }

        #modal-add > #modal-form > button {
            position:relative;
            width:100%;
            height:20%;
            cursor:hand;
            cursor:pointer;
        }

        #modal-button-area {
            position:relative;
            height:20%;
            width:100%;
            justify-content:center;
            display:flex;
            flex-flow:column;
        }

        #modal-button-area > button {
            position:relative;
            width:100%;
            height:60%;
            background-color:gray;
            cursor:hand;
            cursor:pointer;
        }

        .user-icon {
            position:relative;
            height: 100%;
            width: 20%;
            text-align: center;
            align-items:center;
            justify-content:center;
            display:flex;
        }

        .user-icon > img {
            position:relative;
            height:auto;
            width:100%;
            object-fit: cover;
        }
        
        .user-text {
            position: relative;
            height: 100%;
            width: 80%;
            display: flex;
            flex-flow: column;
            align-items:middle;
            -ms-flex-pack: distribute;
            left:5%;
        }
        .text-list {
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            position: relative;
            width:100%;
            height:50%;
            /* justify-content: space-around; */
            justify-content: space-between;

            top:10%;
        }
        .date {
            position:relative;
            color: #8aa0a0;
            margin-right:10%;
        }

        .person {
            position:relative;
            margin-right:10%;
        }

        .talk-list {
            width: 100%;
            height:50%;
            position: relative;
        }
        .talk-list>input {
            width:80%;
            text-overflow: ellipsis;
            -webkit-text-overflow: ellipsis; /* Safari */
            -o-text-overflow: ellipsis; /* Opera */
        }
        .talk-circle {
            position:relative;
            width: 20px;
            height: 20px;
            margin-right:10%;
            border-radius: 50%;
            -webkit-border-radius:50%;
            background: #E47E7E;
            text-align: center;
            color: white;
        }
        /*main-contents: header + main-items*/
        .main-contents {
            height: 100vh;
            width: 58vw;
            background-color: gray;
        }
        .my-header {
            width: 40vw;
            height: 80px;
            background-color: #E9F2F3;
            color: #8aa0a0;
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            margin-left: 0;
        }
        .account-settings {
            width: 20vw;
            height: 80px;
            right: 0px;
            border-left: solid #CCE3E3;
            background: #E9F2F3;
            display: flex;
            flex-flow: row;
            justify-content: center;
            top: 0px;
            position: fixed;
            /* width:30%;
            background-color:blue; */
        }
        .account-settings>.my-header-items-section>a {
            color: #8AA0A0;
        }
        .account-settings>.my-header-items-section>p {
            color: #8AA0A0;
            font-size: 12px;
        }
        .my-header-title {
            width: 40%;
            background-color: #e9f2f3;
            margin-top: 20px;
            margin-left: 10px;
            /* width:40%;
            background-color:#e9f2f3; */
        }
        h5{
             color:#62ABB6;
        }
        h6{
            margin-top:10px;
            color:#8AA0A0;
        }
        .my-header-items {
            display:flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            flex-flow:row;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row;
            width:60%;
            /* width:60%;
            background-color:#40px; */
        }
        .my-header-items-section {
            display: flex;
            /* display:-webkit-box;
  	        display:-ms-flexbox; */
            flex-flow: column wrap;
            margin-right:10px;
            align-items: center;
            margin-top: 10px;
        }
        .my-header-items >.my-header-items-section > .circle {
            background-color: #00B7B7;
            color: #fff;
        }
        .my-header-items > .my-header-items-section > p {
            font-size: 12px;
        }
        /* 通常の領域 */
        .main-item {
            background-color: #FFFFFF;
            height: calc(100vh - 80px);
            width: 57.8vw;
            top: 80px;
            position: absolute;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        /* ホーム用領域 */
        .home-main-item {
            background-color: #FFFFFF;
            height:100vh;
            width: 82vw;
            top: 80px;
            position: absolute;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        /* トーク用領域 */
        .talk-main-item {
            background-color: #FFFFFF;
            height: calc(100vh - 180px);
            width: 57.8vw;
            top: 80px;
            position: absolute;
            overflow-y: scroll;
            overflow-x: hidden;
        }

        /* アカウント用領域 */
        
        .account-main-item {
            background-color: #FFFFFF;
            height:100vh;
            width:82vw;
            position: absolute;
            overflow-y: scroll;
            overflow-x: hidden;
            text-align:center;
        }
        .main-item > h2 {
            color:#8AA0A0;
            font-weight: 400;
            text-align: center;
            position: relative;
            top:30px;
            margin-bottom:50px;
        }
        .circle {
            width: 3vw;
            height: 3vw;
            border-radius: 50%;
            background: white;
            text-align: center;
            line-height: 3vw;
            -webkit-border-radius:50%;
            display:block;
        }

        

        /*トーク内容表示*/
        .name{
            position:relative;
            left:30px;
            letter-spacing: 0.3em;
            color:#007A7A;
        }
        
        .messageLine {
            overflow: auto;
            border-right: 1px solid #555;
            border-left: 1px solid #555;
        }

        #messageLine > .opponent {
            position:relative;
            display: flex;
            /* display:-webkit-box;
  	        display:-ms-flexbox; */
            flex-direction: column;
        }

        #my-message-area {
            background-color:#00ff7f;
        }

        .opponent .message_box {
            width:40%;
            font-size: 1.2vw;
            background: #fff;
            border: 3px solid #007A7A;
            border-radius: 10px;
            position:relative;
            padding: 6px 9px;
            display: inline-block;
            color: #555;
        }
        .opponent .message_box .message_text{
            margin: 5px;
            padding: 3px;
        }

        /*相手のメッセージ内容*/
        .faceicon{
            position:relative;
            display: flex;
            flex-direction: row;
            margin-top:5%;
            margin-bottom:20px;
        }

        .faceicon > img {
            margin-left:10px;
            margin-right:10px;
        }

        .faceicon > .flex-col{
            
            width:75%;
            /* width:100%; */
            position:relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .faceicon > .flex-col > .flex-row {
            width:75%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .faceicon > .flex-col > .flex-row > p {
            left:0%;
        }

        .my-faceicon{
            position:relative;
            display: flex;
            flex-direction: row-reverse;
            margin-top:5%;
            margin-bottom:20px;
            float:right;

        }

        .my-faceicon > img{
            width:50px;
            height:50px;
            margin-right:10px;
            margin-left:10px;
            /* position: relative; */
        }

        .my-faceicon > .flex-col {
            position:relative;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            justify-content:space-between;
            width: 100%;
        }
        .my-faceicon > .flex-col > .flex-row {
            width: 75%;
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
            position:relative;
            left: 60%;
        }

        .my-faceicon > .flex-col > .message_box {
            width:40%;
            border: 3px solid #007A7A;
            left:55%;
            position: relative;
            text-align:center;

        }

        
        /*メッセージ入力欄*/
        #send {
            position:fixed;
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            height:100px;
            bottom:0;
            /* background-color:red; */
            width:57.8vw;
        }

        #send-text {
            position:relative;
            width:calc( 57.8vw - 70px );
            height:100%;
            border:2px #E0E0E0 solid;
            background-color:white;
        }

        #send-text > textarea {
            width:100%;
            height:70%;
            border: transparent;
        }

        #send-button {
            position:absolute;
            height:100%;
            width:70px;
            text-align: center;
            background: #6FD8BB;
            border:transparent;
            color:white;
            cursor:hand;
            cursor:pointer;
            right:0px;
        }

        .fa-telegram-plane{
            font-size:35px;
            color:white;
        }
        
        /*メッセージ入力欄内の機能一覧(アイコン)*/
        #message-list {
            
            width: 100%;
            height:30%;
            letter-spacing:10px;
            text-align: right;
        }

        #message-list > button {
            color:#00697A;
            cursor:pointer;
            cursor:hand;
            background-color: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            appearance: none;
            margin-right:2%;
        }

        #btn2 {
            display:none;
        }

        #avatar {  
            color:#00697A;
            cursor:pointer;
            cursor:hand;
        }


        /* ファイル共有画面 */

        table{
            /* margin:auto; */
            border-collapse:collapse;
            position:relative;
            top:50px;
            /* position:absolute; */
            width:90%;
            display:inline-block;
            top:50px;
            left: 30px;
            display:table;
            table-layout:auto;
        }
        th{
            
            border-bottom:solid #8AA0A0;
        }
        table > tr >td{
            height:50px;
            color:#8AA0A0;
        }
        table > tr > th > a{
            text-decoration:none;
            color:#8AA0A0;
            align-items:center;
        }
        table > tr > td > a{
            /* display:inline-block; */
            display:flex;
            align-items:center;
            justify-content:center;
            position:relative;
            width:100%;
            height:100%;
            text-decoration:none;
            color:#8AA0A0;
        }

        a.folder-a , .folder-icon,.fa-ellipsis-h{
            text-decoration: none;
            color: #00697A;
        }
        .folder-icon{
            right: 38vw;
            /* margin-right:20px; */
            margin-right:1vw;
        }
        
        .fa-ellipsis-h{
            /* margin-left: 100px; */
            margin-left: 5vw;
        }

        /* ホーム 画面*/

        .home-my-header {
            width: 64vw;
            height: 80px;
            background-color: #E9F2F3;
            color: #8aa0a0;
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            margin-left: 0;
        }
        .day{
            margin-top:30px;
            border:2.3px solid #8AA0A0;
            border-radius: 5px;
            width: 64vw;
            position: relative;
            left:10vw;
        }
        .updated-report{
            /* border:2.3px solid #8AA0A0;
            border-radius: 5px; */
            /* border-bottom: none; */
            /* width: 64vw; */
            position: relative;
            /* left:10vw; */
            display:flex;
            flex-flow:column;
            color:#8AA0A0;
        }
        .updated-detail > .edited-ago {
            width: 10vw;
            text-align: right;
            /* font-size: 0.8rem; */
        }
        /* .date{
            color:#8AA0A0;
            position: relative;
            top:5px;
            left: 10px;
            font-size:14px;
            width: calc( 64vw - 20px );
            height:25px;
            /* border-bottom: 1px solid #8AA0A0; */
        } */
        
        .updated-detail{
            border-top: 1px solid #8AA0A0;
            position: relative;
            margin-top:15px;
            display: flex;
            flex-flow: row;
            /* width: 12vw; */
        }
        .updated-detail > img {
            margin:10px 15px;
        }
        .updated-content {
            width: 47vw;
            display: flex;
            flex-direction: column;
            /* border-bottom: 1px solid #8AA0A0; */
        }
        .updated-chara{
            margin:5px;
        }
        .updated-feature{
            margin:5px;
            display:flex;
            flex-direction: row;
        }
        .note-name {
            position:relative;
            width:20vw;
        }
        .note{
            display: flex;
            flex-direction: column;
            
        }
        .note-content {
            width: 30vw;
            position:relative;
            text-overflow : ellipsis;
            overflow: hidden;
            white-space: nowrap;
        }
        button{
            background-color: #4B8999;
            border-style:none;
            color:#FFFFFF;
            font-size:14px;
            margin:1px;
            border-radius: 3px;
        }
        .btn-dsn{
            width: 40vw;
            text-align: right;
        }
        .more-read{
            background-color:#E9F2F3;
            color:#4B8999;
            position:relative;
            width: 115px;
            height:30px;
            padding:3px;
            margin:10px;
        }

        /* アカウント画面 */

        .account-my-header {
            /* width: 64vw; */
            width:82vw;
            height: 80px;
            background-color: #E9F2F3;
            color: #8aa0a0;
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            margin-left: 0;
        }
        .account-my-header > button {
            background-color:#00697A;
            width: 70px;
            height: 70px;
            border-radius: 0 5px 5px 0;
            border:none;
            margin-top:10px;
            font-size: 40px;
            font-weight:400;
            color:#FFF;
        }

        .input-edit {
            display: flex;
            flex-direction: row;
        }
        .input-table{
            margin:1vw;
            margin-left:3vw;
            color:#00697A;
        }
        .input-table > tr{
            text-align: left;
            width:35px;
        }
        .input-table > tr > td {
            padding:2vw;
            padding-left:1vw;
            font-size:1.3vw;
        }
        .td-input > input {
            height: 30px;
            width:300px;
            border:2px solid #CCE3E3;
            border-radius:3px;
        }
        .img-edit{
            margin:1vw;
            display: flex;
            flex-direction: column;
        }
        
        .img-show{
            /* width:200px;
            height:200px; */
            margin:1vw;
            width:18vw;
            height: 18vw;
            border:1px solid #CCE3E3;
            /* vertical-align: middle; */
        }
        .img-show > .fa-user{
            font-size: 3vw;
            color:#00697A;
            /* text-align:center;
            justify-content: center; */
            margin-top: 7vw;
        }
        label[for=img-change]{
            padding:10px;
            margin:10px;
            /* margin-right: 3vw; */
            background-color: #00B7B7;
            color:#FFF;
            border-radius: 5px;
            width:100px;
        }
        #img-chage{
            display:none;
            
        }
        .btn-col{
            width:20vw;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .btn-col > button {
            background-color: #E47E7E;
            border:none;
            border-radius: 5px;
            margin:10px;
            /* margin-left:1vw; */
            width:100px;
            height: 47px;
            color:#FFF;
            font-size:16px;
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
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            var firebaseConfig = {
                apiKey: "AIzaSyCov15JIexxNYYD1atR213t_rREKImqCDE",
                authDomain: "chat-1b8c5.firebaseapp.com",
                databaseURL: "https://chat-1b8c5.firebaseio.com",
                projectId: "chat-1b8c5",
                storageBucket: "chat-1b8c5.appspot.com",
                messagingSenderId: "671003935191",
                appId: "1:671003935191:web:1ec022df476d8950c94b92",
                measurementId: "G-46Q0C6NENN"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            firebase.analytics();
        </script>
</head>

<body>
    <div class="side-menu">
        <ul>
            <li id="user-profile">
                <img src="{{ $user->icon }}">
                <p>{{ $user->name }}でログイン中</p>
            </li>
            <li><a href="/home" id="home-li"><span><i class="fas fa-home"></i>　　ホーム</span></a></li>
            @if ($usertool[0]->task == 1)
            <li><a href="/home/task" id="task-li" ><span><i class="fas fa-tasks"></i>　　タスク</span></a></li>
            @endif
            @if ($usertool[0]->talk == 1)
            <li><a href="/home/talk" id="talk-li" onClick="func(this.id);"><span><i class="far fa-comment-alt"></i>　　トーク</span></a></li>
            @endif
            @if ($usertool[0]->note == 1)
            <li><a href="/home/note" id="note-li" onClick="func(this.id);"><span><i class="fas fa-book-open"></i>　　ノート</span></a></li>
            @endif
            @if ($usertool[0]->file == 1)
            <li><a href="/home/file" id="file-li" onClick="func(this.id);"><span><i class="far fa-folder"></i>　　ファイル共有</span></a></li>
            @endif
            @if ($usertool[0]->report == 1)
            <li><a href="/home/report" id="report-li" onClick="func(this.id);"><span><i class="far fa-file-alt"></i>　　レポート</span></a></li>
            @endif
            <form method="post" name="form1" action="{{route('logout')}}">
            @csrf
                <li><a href="javascript:form1.submit()" class="logout"><i class="fas fa-user-circle p-2">　　ログアウト</i></a></li>
            </form>

        </ul>
    </div>
    <div id="app"></div>

   <script>
        
        const userinfo = @json($user);
        const database = firebase.database();
        let storage = firebase.storage();
        let storageRef = firebase.storage().ref();
        const authcompany_id = @json($user->company_id);

        const authuser_id = @json($user->id);
        const authuser_name = @json($user->name);
        const authuser_icon = @json($user->icon);

        function func(current_id){

            let thisid = document.getElementById(current_id);
            thisid.style.backgroundColor = '#4B8999';
        }

        function func2(){
                
            let btn2 = document.getElementById('btn2');
            let send_button = document.getElementById('send-button');
            let tu = document.getElementById('review');
            let sendarea = document.getElementById('sendarea');
            tu.innerHTML = '';
            btn2.value = '';
            if(sendarea.value == ''){
                send_button.disabled = "disabled";
                send_button.style.backgroundColor = "gray";
            }
        }

        function didfunc(){

            let send_button = document.getElementById('send-button');
            

            send_button.disabled = "disabled";
            send_button.style.backgroundColor = "gray";

        }

        function modalfunc(){
            let modal_form_button = document.getElementById("modal-form-button");

            modal_form_button.disabled = "disabled";
            modal_form_button.style.backgroundColor = "gray";
        }
        
   </script>

    <script src="{{asset('/js/app.js')}}"></script>
   
</body>

</html>