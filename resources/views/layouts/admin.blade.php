<!DOCTYPE html>
<html lang="ru">
<head>
    @yield('head-start')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Агенство">
    <meta name="keywords" content="">
    <title>Admin-panel</title>

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('admin-styles/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-styles/css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('admin-styles/js/jquery.js') }}"></script>
    <script src="{{ asset('admin-styles/js/bootstrap.min.js') }}"></script>
    @yield('head-end')
</head>

<body>
<div class="main-grid admin-grid">
    <div class="white-blur">
        <div class="outer-wrapper">
            <div class="inner-wrapper">
                @yield('body')
            </div>
        </div>
    </div>
</div>
</body>

@yield('js-section')

</html>
