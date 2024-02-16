jQuery(function ($) {
  //beginning

  $("").on("click", function (e) {});

  var itemWidth = "";
  var sliderWidth = $("#js-mobile-indicator-1").width();

  if ($("#js-mobile-indicator-1").is(":visible")) {
    itemWidth = "100%";
  } else {
    itemWidth = sliderWidth / 3;
  }

  // Can also be used with $(document).ready()
  $(window).on("load", function () {
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
  });

  //ending

  $("#select-filtro").on("change", function (e) {
    var cat = $(this).val();

    var boton = $("#boton-filtro").data("cat");
    //console.log(cat);

    $("#boton-filtro").attr("data-cat", cat);
    //console.log(boton);

    var url = "http://localhost:3000/work/wordpress/EYW/ajax-pagina";
    var urlParam = url + "?cat=" + cat;
    console.log(urlParam);

    $("#boton-filtro").attr("href", urlParam);
  });

  $("#boton-filtro").on("click", function (e) {
    e.preventDefault();
    var cat = $("#select-filtro").val();

    $.ajax({
      type: "POST",
      url: woocommerce_params.ajax_url,
      data: {
        action: "accion",
        cat: cat,
      },
    })
      .done(function (msg) {
        console.log(msg);
        $("#js-ajax").html(msg);
        //var msgString = JSON.parse(msg.data).data;
        //console.log(msgString);
      })
      .fail(function (jqXHR, textStatus) {
        alert(textStatus);
      });
  });

  $("#boton-filtro-archive").on("click", function (e) {
    e.preventDefault();
    var cat = $("#select-filtro").val();

    $.ajax({
      type: "POST",
      url: woocommerce_params.ajax_url,
      data: {
        action: "archive",
        cat: cat,
      },
    })
      .done(function (msg) {
        console.log(msg);
        $(".products").html(msg);
        //var msgString = JSON.parse(msg.data).data;
        //console.log(msgString);
      })
      .fail(function (jqXHR, textStatus) {
        alert(textStatus);
      });
  });

  $(document.body).on(
    "added_to_cart",
    function (e, fragments, cart_hash, $button) {
      var mensaje =
        'El producto "' +
        $($button[0]).data("product_sku") +
        '" ha sido añadido al carrito. Cantidad: ' +
        $($button[0]).data("quantity");

      e.preventDefault();
      $(".overlay-header").addClass("open");
      $(".notificacion").addClass("open");

      setTimeout(() => {
        $(".overlay-header div").addClass("open");

        $(".contenedor-carrito").addClass("open");
        //$(".contenedor-notificacion").addClass("open");
        //$(".contenedor-notificacion").text(mensaje)
      }, 500);
    }
  );

  $(".overlay-header").on("click", function (e) {
    e.preventDefault();
    $(".overlay-header div").removeClass("open");
    $(".contenedor-carrito").removeClass("open");
    //$(".contenedor-notificacion").removeClass("open");
    //$(".notificacion").removeClass("open");
    setTimeout(() => {
      $(this).removeClass("open");
    }, 500);
  });

  $(document.body).on(
    "removed_from_cart",
    function (e, fragments, cart_hash, $button) {
      $(".overlay-header div").removeClass("open");
      $(".contenedor-carrito").removeClass("open");
    }
  );

  //Experimento

  $(document.body).on("click", ".decrease-quantity", function (e) {
    e.preventDefault();

    var $button = $(this);
    var $quantityInput = $button.siblings('input[type="number"]');
    var currentVal = parseInt($quantityInput.val());
    var productId = $quantityInput.data("product_id");
    var cartItemKey = $quantityInput.data("cart_item_key");

    if (currentVal > 1) {
      var newQuantity = currentVal - 1;
      updateCartItemQuantity(productId, cartItemKey, newQuantity);
    }
  });

  $(document.body).on("click", ".increase-quantity", function (e) {
    e.preventDefault();

    var $button = $(this);
    var $quantityInput = $button.siblings('input[type="number"]');
    var currentVal = parseInt($quantityInput.val());
    var productId = $quantityInput.data("product_id");
    var cartItemKey = $quantityInput.data("cart_item_key");
    var newQuantity = currentVal + 1;
    updateCartItemQuantity(productId, cartItemKey, newQuantity);
  });

  function updateCartItemQuantity(productId, cartItemKey, newQuantity) {
    /*
    $.ajax({
      type: "POST",
      url: wc_add_to_cart_params.ajax_url,
      data: {
        action: "update_cart_item_quantity",
        product_id: productId,
        cart_item_key: cartItemKey,
        quantity: newQuantity,
      },
      beforeSend: function( xhr ) {
        console.log("Enviando" + xhr);
      },
      success: function (response) {
        if (response.success) {
          // Actualiza el contenido del mini carrito
          console.log(response);
          $(document.body).trigger("wc_fragment_refresh");
        }
      },
      
    }).
    fail(function (jqXHR, textStatus) {
      alert(textStatus);
    });
    */
    $.ajax({
      type: "POST",
      url: woocommerce_params.ajax_url,
      data: {
        action: "update_cart_item_quantity",
        productId: productId,
        cart_item_key: cartItemKey,
        quantity: newQuantity,
      },
    })
      .done(function (msg) {
        console.log(msg);
        $(document.body).trigger("refrescarFragmentos");
        //var msgString = JSON.parse(msg.data).data;
        //console.log(msgString);
      })
      .fail(function (jqXHR, textStatus) {
        alert(textStatus);
      });
  }

  $(document.body).on("refrescarFragmentos", function (e) {
    var $fragment_refresh = {
      url: wc_add_to_cart_params.wc_ajax_url
        .toString()
        .replace("%%endpoint%%", "get_refreshed_fragments"),
      type: "POST",
      data: {
        time: new Date().getTime(),
      },
      timeout: wc_add_to_cart_params.request_timeout,
      success: function (data) {
        if (data && data.fragments) {
          $.each(data.fragments, function (key, value) {
            $(key).replaceWith(value);
          });

          if (true) {
            sessionStorage.setItem(
              wc_add_to_cart_params.fragment_name,
              JSON.stringify(data.fragments)
            );
            set_cart_hash(data.cart_hash);

            if (data.cart_hash) {
              set_cart_creation_timestamp();
            }
          }

          $(document.body).trigger("wc_fragments_refreshed");
        }
      },
      error: function () {
        $(document.body).trigger("wc_fragments_ajax_error");
      },
    };
    $.ajax($fragment_refresh);
  });

  $(".ver-carrito").on("click", function (e) {
    $(".overlay-header div").addClass("open");
    $(".contenedor-carrito").addClass("open");
    $(".overlay-header").addClass("open");
  });
});
