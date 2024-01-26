jQuery(function ($) {
  //beginning

  $("").on("click", function (e) {});

  // Can also be used with $(document).ready()
  $(window).on('load',(function () {
    $(".flexslider").flexslider({
      animation: "slide",
      customDirectionNav: $(".m-navigation-controls .m-arrow-icon"),
      minItems: 3,
      maxItems: 3,
      itemWidth: 210,
    });
  }));

  //ending
});
