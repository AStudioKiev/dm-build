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

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/jquery.appear.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    @yield('head-end')
</head>

<body>

    <!-- <input type="submit" role="button" class="lg-btn red-btn mobile-btn" value="Зарегистрироваться" data-toggle="modal" data-target="#alertModal"> -->
    <div id="alertModal" class="modal fade" role="dialog">
        <div class="modal-dialog outer-wrapper">
            <div class="inner-wrapper">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        <div class="alert-ico"><img src="img/done-tick.png" alt="" width="100%"></div>
                        <div class="alert-info"><span>Благодарим за оставленную заявку. Менеджер свяжется с вами в ближайшее время</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="arrow-left"><a href="#"><img src="{{asset('img/left-arrow.png')}}" alt="" width="100%"></a></div>
    <div class="arrow-up"><a href="#"><img src="{{asset('img/left-arrow.png')}}" alt="" width="100%"></a></div>

    <div class="bot-shadow">
        <div class="container-md">
            <div class="white-nav space-btw">
                <div class="logo-holder">
                    <a href="{{url('/')}}">
                        <img src="{{asset('img/logo.png')}}" alt="logo" width="100%">
                    </a>
                </div>

                <div class="contact-nav space-btw">
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="{{asset('img/placeholder.png')}}" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="https://goo.gl/maps/mWNqZNCWEJP2" target="_blank">г. Киев ул. Космонавтов 23</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="{{asset('img/email.png')}}" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="mailto:dm-stroy@gmail.com">dm-stroy@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="{{asset('img/telephone.png')}}" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="tel:+380975216574">+38 (097) 521 65 74</a>
                        </div>
                    </div>

                    <div class="cart-holder">
                        <img src="{{asset('img/cart.png')}}" alt="" width="44px">
                        <div class="cart-count"><span>0</span></div>
                    </div>

                    <div id="toggle_nav" onclick="showNav();"><img src="{{asset('img/menu.png')}}" alt="" width="100%"></div>
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

    <div class="container-md">
        <div class="orange-nav-holder static">
            <ul class="main-nav space-btw">
                <li><a href="{{url('/')}}">Главная</a></li>
                <li><a href="{{url('/aboutus')}}">О нас</a></li>
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
            <span>Created by AStudio</span>
        </a>
    </div>

</body>

<script src="{{asset('js/mine.js')}}"></script>
@yield('js-section')

</html>
