(function ($) {
  var bannerSlide = new Swiper(".fotawp-banner-slider", {
    spaceBetween: 50,
    slidesPerView: 1,
    // autoplay: false,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".fotawp-slide-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".fotawp-slide-next",
      prevEl: ".fotawp-slide-prev",
      clickable: true,
    },
  });

  $(".fotawp-swiper-holder").find(".wp-block-post").addClass("swiper-slide");
})(jQuery);
