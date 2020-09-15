$(document).ready(function() {
    $('.menu-header li').removeClass('active');
    $('.menu-header a[title="Sản phẩm"]').parent().addClass('active');
    var height = $(window).height() - 70;
    $('.filter_left').css({'height': (height - 126)  + 'px', 'overflow-x': 'hidden'});
    $('#content_list_product').css({'height': (height + 10)  + 'px', 'overflow-x': 'hidden'});

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
    $('.new_products').each(function (index) {
        var id = $(this).attr('id');
        var idSub = $(this).find('.swiper-container').attr('id');
        console.log(id)
        console.log(idSub)
        new Swiper( '#' + idSub, {
            slidesPerView: 5,
            direction: getDirection(),
            navigation: {
                nextEl: '#' + id + ' .carousel-control-next',
                prevEl: '#' + id + ' .carousel-control-prev',
            },
            on: {
                resize: function () {
                    swiper.changeDirection(getDirection());
                }
            }
        });
    });

    function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 760 ? 'vertical' : 'horizontal';
        return direction;
    }

});
