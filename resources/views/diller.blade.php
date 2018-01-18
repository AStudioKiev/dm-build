@extends('layouts.main')

@section('body')

<div class="diller-container">
    <div class="space-btw">
        <div class="text-holder">
            <p>Компания ТД «ДМ-строй» является дистрибьютором печного оборудования, вентиляционных систем, изоляции.
Приглашаем к взаимовыгодному сотрудничеству новых партнеров – магазины, оптовики, интернет-магазины.</p>

            <p><span class="underlined">ПРЕИМУЩЕСТВА РАБОТЫ С НАМИ</span></p>
            <p><span class="bold">Расширение ассортимента</span><br>Возможность расширения ассортимента продукцией предлагаемой нашей компанией.</p>
            <p><span class="bold">Договоримся с каждым партнером</span><br>
                К каждому партнеру индивидуальный подход. С каждым найдем удобный и взаимовыгодный формат сотрудничества.</p>
            <p><span class="bold">Эксклюзивные условия поставки</span><br>
                Наличие собственного автопарка позволяет производит отгрузку товара партнерам на следующий день после заказа.</p>
            <p><span class="bold">Информационная и техническая поддержка</span><br>
                Наличие персонального менеджера закрепленного за каждым партнером. Предоставление информационной и рекламной продукции.</p>

            <p><span class="underlined">УСЛОВИЯ ДОСТАВКИ ДЛЯ ПАРТНЕРОВ<br></span></p>
            <p>Осуществляем БЕСПЛАТНУЮ ДОСТАВКУ по Москве и МО<br></p>
            <p><span class="bold">Доставка от 15 000 тр.</span><br>Доставка осуществляется на склад партнера<br>
                При заказе на сумму от 15 000 р. доставка осуществляется БЕСПЛАТНО.
                Срок поставки в течение 1-2х дней при наличии товара на складах в Москве</span></p>
            <p><span class="bold">Доставка до 15 000 р.</span><br>Доставка осуществляется на склад партнера<br>
                При заказе до 15 000 р. доставка осуществляется БЕСПЛАТНО.
                Открытая дата поставки (попутным транспортом) по согласованию с менеджером.</p>

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

@section('js-section')

<script>


</script>

@stop
