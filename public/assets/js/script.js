jQuery(document).ready(function ($) {
    $(".pct-slider-list").slick({
        rtl: true,
        nextArrow: '<span class="next-slide"></span>',
        prevArrow: '<span class="prev-slide"></span>',
        autoplay: true
    });
    $(".pct-content-item-wrapper").first().show();
    $(".pct-category-list .category-item-click").on("click", function (e) {
        $(".pct-preloader").show();
        e.preventDefault();
        $(this).addClass("active");
        var contentSelector = $(this).attr("data-content");
        console.log(contentSelector);
        $(".pct-content-item-wrapper").hide();
        $(contentSelector).show();
        $(".pct-slider-list").slick('refresh');
        setTimeout(function () {
            $(".pct-preloader").hide();
        }, 1000);
    });
});