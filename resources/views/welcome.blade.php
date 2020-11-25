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
            body{
                color: #62ABB6;
                font-size: 21px;
                letter-spacing: 0.05em;
                margin-left: auto;
                margin-right: auto;
                font-family: 'Noto Sans JP', 'sans-serif';
            }
            html{
                
            }
            .side{
                /* display: inline-block; */
                display: flex;
            }
            /*ドロワーメニュー*/
            a.drawer-menu-a{
                text-decoration: none;
                color:#ffffff;
                display: block;
            }
            a.drawer-menu-a:hover{
                background-color: #4B8999;
            }
            .drawer-menu{
                width: 18vw;
                height:100vw;
                position: fixed;
                top: 0px;
                left: 0px;
                background: #62ABB6;
                list-style: none;
            }
            ul.drawer-menu-inner li{
                margin-bottom: 30px;
                padding-left: 25px;
            }
            /*検索*/
            .back-white{
                background: #fff;
                overflow-y: scroll;
            }
            .folder{
                background: #CCE3E3;
                position: fixed;
                top: 0px;
                left: 18vw;
                border: solid #E0E0E0 1px;
            }
            .search-text{
                height: 40px;
                width: 24vw;
                margin: 30px 70px;
                border: none;
                border-radius:4px;
                color: #00697A;
                font-family: "Font Awesome 5 Free", 'Noto Sans JP', 'sans-serif';
                font-weight: 600;
            }
            /*フォルダー追加*/
            .folder-add{
                height: 50px;
                background: #FFFFFF;
                color: #00697A;
                position: fixed;
                top: 100px;
                line-height: 50px;
                text-align: center;
                letter-spacing: 10px;
                margin: 0 auto;
            }
            /*フォルダ一覧*/
            ul.folder-list{
                list-style: none;
                /* height: 100vw; */
                display: block;
                text-align: center;
            }
            .folder-list li{
                background: #E9F2F3;
                margin-bottom: 10px;
                height: 60px;
            }
            a.folder-a , .folder-icon,.fa-ellipsis-h{
                text-decoration: none;
                color: #00697A;
                margin-bottom: 30px;
            }
            .folder-icon{
                margin-right: 50px;
            }
            
            .fa-ellipsis-h{
                margin-left: 90px;
            }
            /*ファイル共有*/
            .file_sharing{
                background: #E9F2F3;
                width: 40vw;
                height: 100px;
                position: fixed;
                top: 0px;
                left: 42vw;
            }
            .file_title{
                margin-top: 25px;
            }
            
            h5{
                margin-left: 15px;
            }
            h6{
                color: #8AA0A0;
                font-weight: 450;
                margin-top: 26px;
                margin-left: 15px;
            }
    </style>
</head>

<body class="antialiased">
    <div id="example"></div>
    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>
