<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('style')
    <title>Books - @yield('title')</title>
    <style type="text/css">
        *{
            font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
            padding: 0;
            margin: 0;
        }

        body{
            background-color: #1a202c;
        }

        .content{
            padding: 15px;
            width: 800px;
            margin: auto;

        }

        @media (max-width: 900px) {
            .content{
                width: 300px;
                display: flex;
                flex-direction: column;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
<div class="content">
    @yield('content')
</div>

</body>
</html>
