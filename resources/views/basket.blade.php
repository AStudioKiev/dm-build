@extends('layouts.main')

@section('body')

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

@stop
