<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Агенство">
    <meta name="keywords" content="">
    <title>Astudio</title>

    <meta name="theme-color" content="#ffffff">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="bot-shadow">
        <div class="container-md">
            <div class="white-nav space-btw">
                <div class="logo-holder"><img src="img/logo.png" alt="" width="100%"></div>

                <div class="contact-nav space-btw">
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/placeholder.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="#">г. Киев ул. Космонавтов 23</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/email.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="#">dm-stroy@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-nav-point">
                        <div class="contact-nav-icon"><img src="img/telephone.png" alt="" height="100%"></div>
                        <div class="contact-nav-text">
                            <a href="#">+38 (097) 521 65 74</a>
                        </div>
                    </div>

                    <div class="cart-holder">
                        <img src="img/cart.png" alt="" width="44px">
                        <div class="cart-count"><span>2</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <div class="container-md">
        <div class="orange-nav-holder static">
            <ul class="main-nav space-btw">
                <li><a href="#">Главная</a></li>
                <li><a href="#">О нас</a></li>
                <li><a href="#">Каталог</a></li>
                <li><a href="#">Прайс-лист</a></li>
                <li><a href="#">Дилерам</a></li>
                <li><a href="#">Доставка</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </div>

        <div class="diller-container">
            <div class="space-btw">
                <div class="text-holder">
                    <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut consequat nunc. Pellentesque at libero vel ipsum pharetra fringilla. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi at ipsum in urna varius rhoncus ornare vitae augue. Morbi ut tortor vehicula lacus laoreet ullamcorper id ac massa. Proin in suscipit nulla. Aliquam varius sollicitudin quam et elementum. Praesent ut diam ut nulla efficitur sodales at sit amet mi. Donec in augue lobortis, ultrices urna non, lacinia elit. Pellentesque tellus magna, egestas a tristique vitae, semper a turpis. Morbi bibendum ac erat in bibendum. Nulla iaculis non dolor egestas congue. Etiam pretium elementum sem a molestie.</span>

                    <div class="diller-img-holder"><img src="img/diller.jpg" alt="" width="100%"></div>
                </div>

                <div class="diller-form-holder">
                    <form action="contactForm.php" method="post" id="contactPopup" class="form">
                        <p class="diller-form-header">Заполните форму и мы обязательно с вами свяжемся.</p>

                        <div class="select-wrapper">
                            <div class="select form-group mar-bt-2">
                                <input type="text" name="fio" required placeholder="ФИО" class="form-control input-field">
                            </div>
                        </div>
                        <div class="select-wrapper">
                            <div class="select form-group mar-bt-2">
                                <input type="text" name="company" required placeholder="Название компании" class="form-control input-field">
                            </div>
                        </div>
                        <div class="select-wrapper">
                            <div class="select form-group mar-bt-2">
                                <input type="text" name="address" required placeholder="Адрес компании" class="form-control input-field">
                            </div>
                        </div>
                        <div class="select-wrapper">
                            <div class="select form-group mar-bt-2">
                                <input type="text" name="phone" required placeholder="Контактный телефон" class="form-control input-field">
                            </div>
                        </div>
                        <div class="select-wrapper">
                            <div class="select form-group mar-bt-2">
                                <input type="email" name="email" required placeholder="Адрес электронной почты" class="form-control input-field">
                            </div>
                        </div>

                        <input type="submit" role="button" class="orange-btn" value="Отправить заявку">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    
<script src="js/mine.js"></script>
</html>