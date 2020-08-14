jQuery(document).ready(function() {
    var swiper_pane = new Swiper('#carouselExampleIndicators', {
        navigation: {
            nextEl: '#carouselExampleIndicators .carousel-control-next',
            prevEl: '#carouselExampleIndicators .carousel-control-prev',
        },
    });
    var swiper_supplier = new Swiper('#brand_carousel_last', {
        slidesPerView: 6,
        direction: getDirection(),
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '#section_supplier .next',
            prevEl: '#section_supplier .prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper_blog = new Swiper('#blog-carousel', {
        slidesPerView: 2,
        direction: getDirection(),
        navigation: {
            nextEl: '#blog_home .carousel-control-next',
            prevEl: '#blog_home .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper_product = new Swiper('#feature-carousel', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#featureProduct .carousel-control-next',
            prevEl: '#featureProduct .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper = new Swiper('#tmcategorylist-carousel', {
        slidesPerView: 8,
        direction: getDirection(),
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '#product_department .carousel-control-next',
            prevEl: '#product_department .carousel-control-prev',
        },
        on: {
            resize: function () {
                swiper.changeDirection(getDirection());
            }
        }
    });
    var swiper = new Swiper('#tmcategory3-carousel', {
        slidesPerView: 5,
        direction: getDirection(),
        navigation: {
            nextEl: '#list_product2 .carousel-control-next',
            prevEl: '#list_product2 .carousel-control-prev',
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
