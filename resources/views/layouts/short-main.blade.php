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
    <link rel="shortcut icon" href="/img/favicon.png" type="image/png">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/bootstrap.min.js"></script>
    @yield('head-end')
</head>

<body>
    <div class="arrow-left">
        <a href="{{substr(url()->current(), 0, strrpos(url()->current(), '/'))}}">
            <img src="{{asset('img/left-arrow.png')}}" alt="back" width="100%">
        </a>
    </div>
    <div class="arrow-up">
        <a href="#home" class="scroll">
            <img src="{{asset('img/left-arrow.png')}}" alt="up" width="100%">
        </a>
    </div>

    <div class="bot-shadow" id="home">
        <div class="container-md">
            <div class="white-nav space-btw">
                <div class="logo-holder">
                    <a href="{{url('/')}}">
                        <img src="img/logo.png" alt="logo" width="100%">
                    </a>
                </div>

                <div class="contact-nav space-btw">
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/placeholder.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a>ул. Коммунистическая 25г, офис Т-43</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/email.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="mailto:site@dmstroy.su">site@dmstroy.su</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/telephone.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="tel:+79031843746">+7 (903) 184 37 46</a>
                        </div>
                    </div>

                    <div class="cart-holder">
                        <a href="{{url('/basket')}}">
                            <img src="{{asset('img/cart.png')}}" alt="cart" width="44px">
                            <div class="cart-count">
                                <span>{{$basketCount}}</span>
                            </div>
                        </a>
                    </div>

                    <div id="toggle_nav" onclick="showNav();"><img src="img/menu.png" alt="" width="100%"></div>
                    <ul id="mobile_nav" class="mobile-hidden">
                        <li><a class="scroll" href="{{url('/')}}">Главная</a></li>
                        <li><a class="scroll" href="{{url('/aboutus')}}">О нас</a></li>
                        <li><a class="scroll" href="{{url('/catalog')}}">Каталог</a></li>
                        <li><a class="scroll" href="{{url('/pricelist')}}">Прайс-лист</a></li>
                        <li><a class="scroll" href="{{url('/diller')}}">Дилерам</a></li>
                        <li><a class="scroll" href="{{url('/delivery')}}">Доставка</a></li>
                        <li><a class="scroll" href="{{url('/contacts')}}">Контакты</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>

    @yield('body')

</body>

<!-- <input type="submit" role="button" class="lg-btn red-btn mobile-btn" value="Зарегистрироваться" data-toggle="modal" data-target="#alertModal"> -->
<div id="alertModal" class="modal fade" role="dialog">
    <div class="modal-dialog outer-wrapper">
        <div class="inner-wrapper">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="alert-ico"><img src="{{asset('img/done-tick.png')}}" alt="" width="100%"></div>
                    <div class="alert-info"><span>Благодарим за оставленную заявку. Менеджер свяжется с вами в ближайшее время</span></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <a href="https://web-site.kiev.ua/" target="_blank">
        <span>Created by AStudio</span>
    </a>
</div>

<script src="js/mine.js"></script>
@yield('js-section')

</html>
