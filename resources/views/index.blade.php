@extends('layouts.short-main')

@section('body')

<div class="container-md">
    <div id="topCarousel" class="carousel slide" data-ride="carousel">
        <div class="orange-nav-holder">
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

        <ol class="carousel-indicators">
            <li data-target="#topCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#topCarousel" data-slide-to="1"></li>
            <li data-target="#topCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            @for($i = 0; $i < count($posters); $i++)
                <div class="item @if($i == 0) active @endif">
                    <img src="{{asset($posters[$i]->image)}}" alt="{{$posters[$i]->name}}" width="100%">
                </div>
            @endfor
        </div>
    </div>
</div>

<div class="container-md mar-tp-4 mar-bt-4">
    <div class="catalog-sm-container space-btw">
        @foreach($types as $type)
        <div class="category-card">
            <div class="brown-border">
                <a href="{{url('/catalog', $type->id)}}">
                    <div class="category-name">
                        <span>{{$type->name}}</span>
                    </div>
                </a>
                <div class="category-img">
                    <a href="{{url('/catalog', $type->id)}}">
                        <img src="{{asset($type->image)}}" height="100%">
                    </a>
                </div>
                <div class="category-info">
                    <span>{!! $type->description !!}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="feedback-container">
        <form action="contactForm.php" method="post" id="contactForm" class="form">
            <div class="select-wrapper">
                <div class="select form-group">
                    <input type="text" id="name" name="name" placeholder="имя" required="required" class="form-control input-field">
                </div>
            </div>

            <div class="select-wrapper">
                <div class="select form-group">
                    <input type="text" id="phone" name="phone" placeholder="номер телефона" required="required" class="form-control input-field">
                </div>
            </div>

            <input type="submit" role="button" class="orange-btn" value="Заказать обратный звонок">
        </form>
    </div>

    <div class="about-container">
        <div class="image-text-holder space-btw">
            <div class="image-holder"><img src="img/kotl_info.jpg" alt="" width="100%"></div>

            <div class="text-holder">
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</span>
            </div>
        </div>
    </div>

    <div class="advantages-container space-btw">
        <div class="advantage-card advantage-card-1">
            <div class="table-texture">
                <div><span>15 лет успешной работы</span></div>
            </div>
        </div>
        <div class="advantage-card advantage-card-2">
            <div class="table-texture">
                <div><span>Более 50 партнёров</span></div>
            </div>
        </div>
        <div class="advantage-card advantage-card-3">
            <div class="table-texture">
                <div><span>Более 5 000 клиентов</span></div>
            </div>
        </div>
        <div class="advantage-card advantage-card-4">
            <div class="table-texture">
                <div><span>Гибкое ценообразование</span></div>
            </div>
        </div>
        <div class="advantage-card advantage-card-5">
            <div class="table-texture">
                <div><span>Команда профессионалов</span></div>
            </div>
        </div>
        <div class="advantage-card advantage-card-6">
            <div class="table-texture">
                <div><span>Индивидуальный подход</span></div>
            </div>
        </div>
    </div>

    <div class="delivery-container">
        <div class="grey-border">
            <div class="md-header">
                <h3>Оформить заказ просто</h3>
            </div>

            <div class="delivery-stages-holder">
                <img src="img/delivery.png" alt="" width="100%">
            </div>
        </div>
    </div>

    <div class="partners-container">
        <div class="grey-border">
            <div class="md-header">
                <h3>Наши партнёры</h3>
            </div>

            <div class="space-btw pad-bt-4">
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/1.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Чугунно-литейный завод</span></div>
                </div>
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/2.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Завод печного оборудования</span></div>
                </div>
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/3.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Чугунно-литейный завод</span></div>
                </div>
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/4.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Завод по обработке камня</span></div>
                </div>
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/5.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Чугунно-литейный завод</span></div>
                </div>
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/6.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Завод изоляционных материалов</span></div>
                </div>
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/7.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Завод металлоконструкций</span></div>
                </div>
                <div class="partner-holder">
                    <div class="partner-logo"><img src="img/8.JPG" alt="" width="100%"></div>
                    <div class="partner-name"><span>Завод полимерной продукции</span></div>
                </div>
            </div>
        </div>
    </div>

    <div class="contacts-container">
        <div class="grey-border">
            <div class="md-header">
                <h3>Контакты</h3>
            </div>

            <div class="space-btw pad-vl-6">
                <div class="contacts-info">
                    <div class="contact-point">
                        <div class="contact-icon"><img src="img/telephone.png" alt="" width="100%"></div>
                        <div class="contact-text">
                            <a href="#">+38 (093) 555 55 55<br></a>
                            <a href="#">+38 (097) 333 33 33<br></a>
                            <a href="#">+38 (078) 999 99 99<br></a>
                        </div>
                    </div>
                    <div class="contact-point">
                        <div class="contact-icon"><img src="img/email.png" alt="" width="100%"></div>
                        <div class="contact-text">
                            <a href="#">dm-stroy@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-point">
                        <div class="contact-icon"><img src="img/placeholder.png" alt="" width="100%"></div>
                        <div class="contact-text">
                            <a href="#">г. Киев ул. Космонавтов 23</a>
                        </div>
                    </div>
                </div>

                <div class="map-holder">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d10165.110045866442!2d30.45826133127441!3d50.43593139373317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce9889498f69%3A0xe6a9e0d555f1bade!2z0KHRg9C_0YPRgtC90LjQug!5e0!3m2!1suk!2sua!4v1516019775571" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

@stop
