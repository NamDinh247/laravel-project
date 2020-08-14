jQuery(document).ready(function() {
    // setTimeout(function () {
    //     $('#blog-carousel').carousel("pause");
    // }, 200);

    $('#carouselExampleIndicators').carousel({
        interval: 6000,
        wrap: true,
        keyboard: true
    });
    $('#blog-carousel').carousel({
        interval: false,
        wrap: true,
        keyboard: true,
        pause: true
    });
    $('#blog-carousel').on('slide.bs.carousel', function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 3;
        var totalItems = $('#blog-carousel .carousel-item').length;

        if (idx >= totalItems-(itemsPerSlide-1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i=0; i<it; i++) {
                // append slides to end
                if (e.direction=="left") {
                    $('#blog-carousel .carousel-item').eq(i).appendTo('#blog-carousel .carousel-inner');
                }
                else {
                    $('#blog-carousel .carousel-item').eq(0).appendTo('#blog-carousel .carousel-inner');
                }
            }
        }
    });
    $('#tmcategorylist-carousel').carousel({
        interval: 6000,
        wrap: true,
        keyboard: true
    });
    $('#tmcategorylist-carousel').on('slide.bs.carousel', function (e) {
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 9;
        var totalItems = $('#tmcategorylist-carousel .carousel-item').length;

        if (idx >= totalItems-(itemsPerSlide-1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i=0; i<it; i++) {
                // append slides to end
                if (e.direction=="left") {
                    console.log(33333)
                    $('#tmcategorylist-carousel .carousel-item').eq(i).appendTo('#tmcategorylist-carousel .carousel-inner');
                }
                else {
                    console.log(5555555)
                    $('#tmcategorylist-carousel .carousel-item').eq(0).appendTo('#tmcategorylist-carousel .carousel-inner');
                }
            }
        }
    });
    $('#brand_carousel_last').carousel({
        interval: 6000,
        wrap: true,
        keyboard: true
    });
    $('#brand_carousel_last').on('slide.bs.carousel', function (e) {
        console.log(123123123)
        var $e = $(e.relatedTarget);
        var idx = $e.index();
        var itemsPerSlide = 7;
        var totalItems = $('#brand_carousel_last .carousel-item').length;

        if (idx >= totalItems-(itemsPerSlide-1)) {
            var it = itemsPerSlide - (totalItems - idx);
            for (var i=0; i<it; i++) {
                // append slides to end
                if (e.direction=="left") {
                    console.log(4543534)
                    $('#brand_carousel_last .carousel-item').eq(i).appendTo('#brand_carousel_last .carousel-inner');
                }
                else {
                    $('#brand_carousel_last .carousel-item').eq(0).appendTo('#brand_carousel_last .carousel-inner');
                }
            }
        }
    });
});