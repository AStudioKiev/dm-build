@extends('layouts.main')

@section('body')

<div class="delivery-container">
    <div class="floated-text"><img src="img/car.png" width="320px" alt="" align="right" vspace="5" hspace="5">
        <p align="left"><span class="underlined-lg">Доставка по Москве и МО</span></p>
        <p><span class="bold">Москва</span><br>
            При заказе на сумму от 25 000 р. доставка осуществляется БЕСПЛАТНО<br>
            При заказе на сумму  до 25 000 р. стоимость доставки – 500 р.</p>
        <p><span class="bold">Московская область</span><br>
            Доставка за пределами МКАД 30 р/км к стоимости доставки по Москве<br>
            Выгрузка товара осуществляется силами заказчика.<br>
            Доставка осуществляется с 9:00 до 18:00</p>

        <p align="left"><span class="underlined-lg">Доставка по всей России</span></p>
        <p>Доставка по России осуществляется согласно расценок  транспортных компаний: «Деловые линии», «ПЭК» и др.</p>
        <p><span class="bold">ВАЖНО!</span> Прежде чем расписаться в путевом листе или накладной, обязательно убедитесь в отсутствии повреждений упаковки и комплектности.</p>
    </div>

    <div class="grey-border sm-border">
        <div class="md-header">
            <h3>Оформить заказ просто</h3>
        </div>

        <div class="delivery-stages-holder">
            <img class="md-delivery" src="img/delivery.png" alt="" width="100%">
            <img class="sm-delivery" src="img/grey.png" alt="" width="100%">
       </div>
    </div>

    <div class="floated-text">
        <p align="left"><span class="underlined-lg">СТОИМОСТЬ ДОСТАВКИ</span><br>
        Стоимость доставки зависит от веса товара и адреса доставки. До офиса транспортной компании в Москве мы доставляем товар БЕСПЛАТНО. При получении товаров вы оплачиваете только услуги транспортной компании до терминала в вашем городе или курьером.</p>
        <p>Остались вопросы? Позвоните по номеру <span class="bold">+7 (985) 390 45 03</span> или напишите на почту <span class="bold">site@dmstroy.su</span></p>
    </div>
</div>

@stop
