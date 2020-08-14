jQuery(document).ready(function() {
    var swiper = new Swiper('#images-container', {
        slidesPerView: 3,
        direction: getDirection(),
        navigation: {
            nextEl: '#images-container .carousel-control-next',
            prevEl: '#images-container .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper = new Swiper('#productIncluded', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#products_included .carousel-control-next',
            prevEl: '#products_included .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper = new Swiper('#youLike', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#products_youLike .carousel-control-next',
            prevEl: '#products_youLike .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper = new Swiper('#similar', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#products_similar .carousel-control-next',
            prevEl: '#products_similar .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });

    function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
        return direction;
    }

    $('[data-fancybox="images"]').fancybox({
        thumbs : {
            autoStart : true
        },
        slideShow: {
            autoStart: false,
            speed: 3000
        },
    })
});
