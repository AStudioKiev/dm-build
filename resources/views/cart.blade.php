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

        <div class="cart-container">
            <div class="row">
                <div class="bought-grid col-md-7">
                    <h3 class="cart-header">Ваши покупки</h3>
                    
                    <div class="bought-panel">
                        <div class="bought-info">
                            <div class="bought-name">
                                <span>Вентиль металлочерепицы</span>
                            </div>
                            
                            <div class="table-inline">
                                <div class="bought-photo"><img src="img/cat_3.jpg" alt="" width="100%"></div>

                                <div class="bought-count-holder">
                                    <div class="count-lebel"><span>Количество</span></div>

                                    <div class="calc-count">
                                        <div class="minus"><span>-</span></div>
                                        <div class="counter"><span>1</span></div>
                                        <div class="plus"><span>+</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bought-action">
                            <button class="look-btn">Просмотреть товар</button>
                            <button class="del-btn">Убрать из корзины</button>
                        </div>
                    </div>
                    
                    <div class="bought-panel">
                        <div class="bought-info">
                            <div class="bought-name">
                                <span>Вентиль металлочерепицы</span>
                            </div>
                            
                            <div class="table-inline">
                                <div class="bought-photo"><img src="img/cat_3.jpg" alt="" width="100%"></div>

                                <div class="bought-count-holder">
                                    <div class="count-lebel"><span>Количество</span></div>

                                    <div class="calc-count">
                                        <div class="minus"><span>-</span></div>
                                        <div class="counter"><span>1</span></div>
                                        <div class="plus"><span>+</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bought-action">
                            <button class="look-btn">Просмотреть товар</button>
                            <button class="del-btn">Убрать из корзины</button>
                        </div>
                    </div>
                    
                    <div class="bought-panel">
                        <div class="bought-info">
                            <div class="bought-name">
                                <span>Вентиль металлочерепицы</span>
                            </div>
                            
                            <div class="table-inline">
                                <div class="bought-photo"><img src="img/cat_3.jpg" alt="" width="100%"></div>

                                <div class="bought-count-holder">
                                    <div class="count-lebel"><span>Количество</span></div>

                                    <div class="calc-count">
                                        <div class="minus"><span>-</span></div>
                                        <div class="counter"><span>1</span></div>
                                        <div class="plus"><span>+</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bought-action">
                            <button class="look-btn">Просмотреть товар</button>
                            <button class="del-btn">Убрать из корзины</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-5">
                    <form action="contactForm.php" method="post" id="cartForm" class="form form-grid">
                        <p class="diller-form-header">Заполните форму и мы обязательно с вами свяжемся.</p>

                        <div class="select-wrapper">
                            <div class="select form-group mar-bt-2">
                                <input type="text" name="name" required placeholder="Имя" class="form-control input-field">
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

                        <input type="submit" role="button" class="orange-btn lg-btn" value="Оформить заказ">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
    
<script src="js/mine.js"></script>
</html>