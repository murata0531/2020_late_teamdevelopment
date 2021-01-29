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
            /* font-size: 4vm; */
            font-size:1.3vw;
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

        /*サイドメニュー*/
        .side-menu {
            width: 18vw;
            height: 100vh;
            background-color: #62ABB6;
        }
        .side-menu>ul>li>a {
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            align-items: center;
        }
        /*main-menu: folder +  main-contents*/
        .main-menu {
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            height: 100vh;
            width: calc(100vw - 18vw);
        }
        
        /*main-contents: header + main-items*/
        .main-contents {
            height: 100vh;
            /* width: 58vw; */
            width: calc(100vw - 18vw);
            background-color: gray;
        }
        .my-header {
            width: 64vw;
            height: 80px;
            background-color: #E9F2F3;
            color: #8aa0a0;
            display: flex;
            display:-webkit-box;
  	        display:-ms-flexbox;
            margin-left: 0;
        }

        .my-header > h2 {
            color:#62ABB6;
            font-weight: 500;
            position:relative;
            top:20px;
            left:15px;
        }

        .account-settings {
            width: 20vw;
            height: 80px;
            right: 0px;
            /* border-left: solid #CCE3E3; */
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
        /*main-item*/
        .main-item {
            background-color: #FFFFFF;
            height:100vh;
            width: 82vw;
            top: 80px;
            position: absolute;
            overflow-y: scroll;
            overflow-x: hidden;
            /* text-align: center; */
        }

        .circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            text-align: center;
            line-height: 36px;
            -webkit-border-radius:50%;
            display:block;
        }

        .function-management{
            width: 80vw;
            margin-top:50px;
            /* text-align: center;
            position: relative; */
        }

        table{
            color:#007A7A;
            margin:auto;
            margin-right:30px;
            width:59vw;
            /* border:2px solid #E0E0E0;
            border-radius: 5px; */
        }

        .management{
            width: 80vw;
            text-align: center;
            position: relative;
        }
        button{
            background-color: #4B8999;
            border-style:none;
            color:#FFFFFF;
            
            padding:10px;
            margin:30px;
            /* margin-left:60px; */
            border-radius: 5px;
            letter-spacing: 5px;
        }
        .search{
            width: 80vw;
            text-align: center;
        }
        #sear_box {
            width:45vw;
            border-radius: 5px;
            border:2px solid #E0E0E0;
            padding:12px;
        }
        table{
            color:#007A7A;
            text-align: center;
            margin:auto;
            width:59vw;
            border:2px solid #E0E0E0;
            border-radius: 5px;
        }
        th{
            font-weight:400;
            color:#7B7B7B;
        }
        td > a{
            position: relative;
            color:#FFFFFF;
            letter-spacing: 5px;
            text-decoration: none;
        }
        tr > td{
            height:60px;
        }
        .pass-re{
            background-color: #E47E7E;
            margin:10px;
        }
        .lock{
            background-color: #4B8999;
        }

        button {
            cursor:hand;
            cursor:pointer;
        }
    </style>

</head>

<body>
    <div class="side-menu">
        <ul>
            <li id="user-profile">
                <img src="{{ $user->icon }}">
                <p>{{ $user->name }}でログイン中</p>
            </li>
            <li><a href="/company/home"><span>基本管理</span></a></li>
            <li><a href="/company/home/usermanagement"><span>ユーザ管理</span></a></li>
            <li><a href="/company/home/functionmanagement"><span>機能管理</span></a></li>
            <form method="post" name="form1" action="{{route('company.logout')}}">
            @csrf
                <li><a href="javascript:form1.submit()" class="logout"><i class="fas fa-user-circle p-2">　　ログアウト</i></a></li>
            </form>

        </ul>
    </div>
    <div id="companyapp"></div>

    <script>
    
        const auth_user = @json($user);
        const usertool = @json($usertool);


    </script>
    <script src="{{asset('/js/app.js')}}"></script>
   
</body>

</html>