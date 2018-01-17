<!DOCTYPE html>
<html lang="ru">
<head>
    @yield('head-sart')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Агенство">
    <meta name="keywords" content="">
    <title>ДМ-СТРОЙ</title>

    <meta name="theme-color" content="#ffffff">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/bootstrap.min.js"></script>
    @yield('head-end')
</head>

<body>
    <div class="arrow-left"><a href="#"><img src="img/left-arrow.png" alt="" width="100%"></a></div>
    <div class="arrow-up"><a href="#"><img src="img/left-arrow.png" alt="" width="100%"></a></div>

    <div class="bot-shadow">
        <div class="container-md">
            <div class="white-nav space-btw">
                <div class="logo-holder"><img src="img/logo.png" alt="" width="100%"></div>

                <div class="contact-nav space-btw">
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/placeholder.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="https://goo.gl/maps/mWNqZNCWEJP2" target="_blank">г. Киев ул. Космонавтов 23</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/email.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="mailto:dm-stroy@gmail.com">dm-stroy@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/telephone.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="tel:+380975216574">+38 (097) 521 65 74</a>
                        </div>
                    </div>

                    <div class="cart-holder">
                        <img src="img/cart.png" alt="" width="44px">
                        <div class="cart-count"><span>0</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-md">
        <div class="orange-nav-holder static">
            <ul class="main-nav space-btw">
                <li><a href="{{url('/')}}">Главная</a></li>
                <li><a href="{{url('/contacts')}}">О нас</a></li>
                <li><a href="{{url('/catalog')}}">Каталог</a></li>
                <li><a href="{{url('/pricelist')}}">Прайс-лист</a></li>
                <li><a href="{{url('/diller')}}">Дилерам</a></li>
                <li><a href="{{url('/delivery')}}">Доставка</a></li>
                <li><a href="{{url('/contacts')}}">Контакты</a></li>
            </ul>
        </div>

        @yield('body')

    </div>

    <div class="footer">
        <a href="https://web-site.kiev.ua/" target="_blank">
            <span>Сайт сделан web-site.kiev.ua</span>
        </a>
    </div>

</body>

<script src="js/mine.js"></script>
@yield('js-section')

</html>
