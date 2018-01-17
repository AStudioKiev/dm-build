@extends('layouts.main')

@section('body')

<div class="contacts-container mar-bt-5">
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

@stop
