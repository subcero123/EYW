jQuery(function ($) {
  //beginning

  $("").on("click", function (e) {});

  var itemWidth = "";
  var sliderWidth = $("#js-mobile-indicator-1").width();

  if($("#js-mobile-indicator-1").is(":visible")){
      itemWidth = "100%";
  }
  else{
      itemWidth = sliderWidth/3;
  }

  // Can also be used with $(document).ready()
  $(window).on('load',(function () {
    $(".flexslider-1").flexslider({
      animation: "slide",
      customDirectionNav: $(".m-navigation-controls-1 .m-arrow-icon"),
      itemWidth: itemWidth,
      //minItems: 1,
      //maxItems: 3,
    });
    $(".flexslider-2").flexslider({
      animation: "slide",
      customDirectionNav: $(".m-navigation-controls-2 .m-arrow-icon"),
      minItems: 1,
      maxItems: 4,
      itemWidth: 210,

    });
    $(".flexslider-3").flexslider({
      animation: "slide",
      customDirectionNav: $(".m-navigation-controls-3 .m-arrow-icon"),
      minItems: 1,
      maxItems: 2,
      itemWidth: 210,

    });
    $(".flexslider-4").flexslider({
      animation: "slide",
      customDirectionNav: $(".m-navigation-controls-4 .m-arrow-icon"),
      minItems: 1,
      maxItems: 4,
      itemWidth: 210,

    });
  }));

  //ending
});
