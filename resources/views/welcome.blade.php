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
            font-family: 'Nunito';
        }

        .search {
            font-family:"Font Awesome 5 Free";
            font-weight:400;

        }
    </style>
</head>

<body class="antialiased">
    <div id="example"></div>

    <div>
        <input type="text" class="fas fa-elipsis-h" placeholder="&#xf640 検索" style="font-family:Arial,Font Awesome 5 Free;">
    <div>
    <script src="{{asset('/js/app.js')}}"></script>
</body>

</html>
