$(document).ready(function() {
    $('.menu-header li').removeClass('active');
    $('.menu-header a[title="Sản phẩm"]').parent().addClass('active');
    var height = $(window).height() - 70;
    $('.filter_left').css({'height': (height - 126)  + 'px', 'overflow-x': 'hidden'});
    $('#content_list_product').css({'height': (height - 13)  + 'px', 'overflow-x': 'hidden'});

    var swiper_product = new Swiper('#new_product_today', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#new_products .carousel-control-next',
            prevEl: '#new_products .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper_product1 = new Swiper('#new_product_categories1', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#new_categories1 .carousel-control-next',
            prevEl: '#new_categories1 .carousel-control-prev',
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
});
