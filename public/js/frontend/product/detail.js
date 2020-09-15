$(document).ready(function() {
    $('.menu-header li').removeClass('active');
    $('.menu-header a[title="Sản phẩm"]').parent().addClass('active');


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
    var swiper1 = new Swiper('#favorite_product', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#youLike .carousel-control-next',
            prevEl: '#youLike .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper2 = new Swiper('#products_included', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#productIncluded .carousel-control-next',
            prevEl: '#productIncluded .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper2 = new Swiper('#similar', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#similar_product .carousel-control-next',
            prevEl: '#similar_product .carousel-control-prev',
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

    // $('[data-fancybox="images"]').fancybox({
    //     thumbs : {
    //         autoStart : true
    //     },
    //     slideShow: {
    //         autoStart: false,
    //         speed: 3000
    //     },
    // })
    $('.container-fluid').css('background-color', '#fff !important');
});
