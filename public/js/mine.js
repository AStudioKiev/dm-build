$('.carousel').carousel();

$("#carousel-example-generic .carousel-indicators p").hover(function(){
    var goto = Number( $(this).attr('data-slide-to') );
    $("#carousel-example-generic").carousel(goto);
});

$(function() {
    $(document.body).on('appear', '.popup-up', function(e, $affected) {
        $(this).addClass("appeared");
    });

    $('.popup-up').appear({force_process: true});
});
$(function() {
    $(document.body).on('appear', '.popup-down', function(e, $affected) {
        $(this).addClass("appeared");
    });

    $('.popup-down').appear({force_process: true});
});
$(function() {
    $(document.body).on('appear', '.popup-left', function(e, $affected) {
        $(this).addClass("appeared");
    });

    $('.popup-left').appear({force_process: true});
});
$(function() {
    $(document.body).on('appear', '.popup-right', function(e, $affected) {
        $(this).addClass("appeared");
    });

    $('.popup-right').appear({force_process: true});
});
$(function() {
    $(document.body).on('appear', '.card-holder-3', function(e, $affected) {
        $(this).addClass("appeared");
    });

    $('.card-holder-3').appear({force_process: true});
});

$(document).ready(function() {
    $(".scroll").click(function() {
        $("html, body").animate({
            scrollTop: $($(this).attr("href")).offset().top + "px"
        }, {
             duration: 800,
             easing: "swing"
        });
        return false;
    });
});

function showNav() {
    var nav = document.getElementById("mobile_nav");

    if (nav.classList.contains('mobile-hidden')) {
        nav.classList.remove('mobile-hidden');
        nav.classList.add('mobile-visible');
    }
    else {
        nav.classList.remove('mobile-visible');
        nav.classList.add('mobile-hidden');
    }
}
function showAsk() {
    var nav = document.getElementById("ask_popup");

    if (nav.classList.contains('ask-hidden')) {
        nav.classList.remove('ask-hidden');
        nav.classList.add('ask-visible');
    } else {
        nav.classList.remove('ask-visible');
        nav.classList.add('ask-hidden');
    }
}
