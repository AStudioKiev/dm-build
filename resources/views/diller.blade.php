@extends('layouts.main')

@section('body')

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

@stop
