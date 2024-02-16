<?php

// add actions
// ///////////
add_theme_support('widgets');
add_theme_support('wc-product-gallery-zoom');
add_theme_support('wc-product-gallery-lightbox');
add_theme_support('wc-product-gallery-slider');

add_action('wp_enqueue_scripts', 'wpt_theme_styles');  // add to the header the related styles files
add_action('wp_enqueue_scripts', 'wpt_theme_js');  // add to the very bottom of the html the related code files
add_action('after_setup_theme', 'woocommerce_support');  // add woocommerce support
// add_action( 'template_redirect', 'remove_woocommerce_styles_scripts', 999 );// remove all scripts from none woocommerce pages
add_action('wp_head', 'gtm', 20);  // add gtm tag

// add_action('woocommerce_before_main_content','output_h1');
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
// remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products', 20);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);

// Quitar quantity
// add_filter('woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2);

function wc_remove_all_quantity_fields($return, $product)
{
  return (true);
}

// Agregar rating
add_action('woocommerce_single_product_summary', 'add_rating', 6);

function add_rating()
{
  // Obtener el ID del producto (puedes obtenerlo de alguna manera, como por ejemplo desde un bucle de productos de WooCommerce)
  $product_id = get_the_ID();  // Ejemplo, obtén el ID del producto actual en un bucle de WordPress

  // Obtener el objeto del producto
  $product = wc_get_product($product_id);

  // Verificar si el producto tiene calificaciones
  if ($product->get_review_count() > 0) {
    // Obtener el rating promedio del producto
    $product_rating = $product->get_average_rating();

    // Obtener el HTML de las estrellas
    $rating_html = wc_get_rating_html($product_rating);

    // Puedes usar $product_rating y $rating_html en tu acción personalizada
    echo 'El rating del producto es: ' . $product_rating . ' Estrellas: ' . $rating_html;
  } else {
    echo 'El producto no tiene calificaciones.';
  }
}

add_action('woocommerce_single_product_summary', 'add_info', 7, 3);

function add_info($param1)
{
  // Aquí va el código para la primera sección
  echo '<div class="product-information">';
  echo '<div class="info">';
  echo '<b><i class="fa-solid fa-location-dot"></i>Lorem Ipsum</b>';
  echo '</div>';
  echo '<div class="info">';
  echo '<b><i class="fa-solid fa-calendar"></i>12/04/23</b>';
  echo '</div>';
  echo '<div class="info">';
  echo '<b><i class="fa-solid fa-plane"></i>Lorem Ipsum</b>';
  echo '</div>';
  echo '</div>';

  // Aquí va el código para la segunda sección
  echo '<div class="product-amenities">';
  echo '<div class="amenity">';
  echo '<b><i class="fa-solid fa-wifi"></i> Free Wi-Fi</b>';
  echo '</div>';
  echo '<div class="amenity">';
  echo '<b><i class="fa-solid fa-wifi"></i> Free Wi-Fi</b>';
  echo '</div>';
  echo '<div class="amenity">';
  echo '<b><i class="fa-solid fa-wifi"></i> Free Wi-Fi</b>';
  echo '</div>';
  echo '</div>';
}

// Related products

add_filter('woocommerce_output_related_products_args', 'jk_related_products_args', 20);

function jk_related_products_args($args)
{
  $args['posts_per_page'] = 2;  // 4 related products
  $args['columns'] = 2;  // arranged in 2 columns
  return $args;
}

// add_action('woocommerce_sidebar','related_products_2',10);

function related_products_2()
{
  echo "<div class='contenedor'>
    <div class='galeria'>

    </div>
    <div class='informacion'>
         <div class='product-info'>
          <p>Lorem Ipsum</p>
          <p>Lorem Ipsum</p>
         </div>
         <div class= 'productos-relacionados'>
         </div>
    </div>
  </div>";
}

// Agregar accion de notices archive
add_action('woocommerce_before_shop_loop', 'div_notices', 10);

function div_notices()
{
  echo '<div class="contenedor-columnas">';
  echo '<div class="columna-filtros">
  <select id="select-filtro" class="filtro" name="select">';
  $taxonomy = 'product_cat';
  $orderby = 'name';
  $show_count = 0;  // 1 for yes, 0 for no
  $pad_counts = 0;  // 1 for yes, 0 for no
  $hierarchical = 1;  // 1 for yes, 0 for no
  $title = '';
  $empty = 0;

  $args = array(
    'taxonomy' => $taxonomy,
    'orderby' => $orderby,
    'show_count' => $show_count,
    'pad_counts' => $pad_counts,
    'hierarchical' => $hierarchical,
    'title_li' => $title,
    'hide_empty' => $empty
  );
  $all_categories = get_categories($args);
  foreach ($all_categories as $cat) {
    $cat_name = $cat->cat_name;
    $cat_slug = $cat->slug;
    echo '<option value=' . $cat_slug . '>' . $cat_name . '</option>';
  };

  echo '</select>
  <a id="boton-filtro-archive" data-cat="" href="#">
      filtrar
  </a>
  </div>
  <div class="columna-productos" id="columna-productos">';
}

// Filtro columnas products

add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
  function loop_columns()
  {
    return 1;
  }
}

add_action('woocommerce_after_shop_loop', 'div_cerrar_notices', 11);

function div_cerrar_notices()
{
  echo '</div><!-- DIV CERRADO -->';
  echo '</div><!-- DIV CONTENERDOR COLUMNAS -->';
}

// Cambiar thumbnail producto
add_action('woocommerce_before_shop_loop_item', 'div_izquierdo', 9);

function div_izquierdo()
{
  if (true) {
    echo '<div class="contenedor-productos">';
    echo '<div class="informacion-izquierda">';
  }
}

// Cambiar thumbnail producto
add_action('woocommerce_before_shop_loop_item_title', 'cerrar_div_izquierdo', 11);

function cerrar_div_izquierdo()
{
  echo '
  </div> <!-- CIERRE DIV IZQUIERDO -->';
}

// add_action('woocommerce_before_shop_loop_item_title','',9);
add_action('woocommerce_shop_loop_item_title', 'div_derecho', 9);

function div_derecho()
{
  if (true) {
    echo '<div class="informacion-derecha">';
  }
}

// Juntar title
add_action('woocommerce_shop_loop_item_title', 'div_titulo', 9);

function div_titulo()
{
  echo '<div class="titular">';
}

// cerrar title
add_action('woocommerce_after_shop_loop_item_title', 'div_titulo_cerrar', 11);

function div_titulo_cerrar()
{
  echo '</div>  <!-- CIERRE DIV TITULO -->';
}

// Add other info
add_action('woocommerce_after_shop_loop_item_title', 'add_additional_info', 12);

function add_additional_info()
{
  // Verificar si estamos en un archivo de archivo
  if (true) {
    echo '<div class="location">
          <b><i class="fa-solid fa-location-dot"></i> Barsellona</b>
        </div>
        <div class="stars">
        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
        </div>
        <div class="description">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vestibulum lectus nec vestibulum posuere. Integer sit amet turpis sed dui gravida placerat nec eget libero.
        </div>
        <div class="room-info">
          <b><i class="fa-solid fa-calendar-days"></i> 12.02.2021 <b class="space">|</b>  <i class="fa-solid fa-person"></i> 5 people <b class="space">|</b> <i class="fa-solid fa-bed"></i> 3 rooms</b>
        <div class="botones">
        <a href="#" type="button" class="boton-corazon">
        <i class="fa-regular fa-heart"></i> 
      </a>';
  }
}

add_action('woocommerce_after_shop_loop_item', 'cerrar_div_derecho', 11);

function cerrar_div_derecho()
{
  echo '</div> <!-- CIERRE DIV BOTONES -->';
  echo '</div><!-- CIERRE DIV ROOM-INFO -->';
  echo '</div> <!-- CIERRE DIV DERECHO -->';
  echo '</div> <!-- CIERRE DIV PADRE -->';
}

// Precio

add_filter('woocommerce_get_price_html', 'agregar_texto_al_precio', 10, 2);

function agregar_texto_al_precio($price_html, $product)
{
  // Aquí puedes agregar el texto adicional que desees
  $texto_adicional = 'FOR TWO';

  // Concatenar el texto adicional al precio
  $price_html .= '<b class="additional-text">' . esc_html($texto_adicional) . '</b>';

  return $price_html;
}

add_action('wp_enqueue_scripts', 'wpdocs_theme_name_scripts');
// add Filters
// ////////////
add_filter('woocommerce_checkout_fields', 'custom_remove_woo_checkout_fields');  // remove fields from checkout

// add Functions
// /////////////
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_add_to_cart_button_text_single');

function woocommerce_add_to_cart_button_text_single()
{
  return __('BOOK NOW', 'woocommerce');
}

// add_filter( 'woocommerce_get_price_html', 'bbloomer_alter_price_display', 9999, 2 );

function bbloomer_alter_price_display($price, $product)
{
  $price = 1410;
  $nuevo_precio = wc_price($price, $product);

  return $nuevo_precio;
}

function wpt_theme_styles()
{  // get the necesary files for the style of the theme

  // wp_enqueue_style( 'googlefont2_css', 'https://fonts.googleapis.com/css?family=Itim&text=Woof%26',20 );
  wp_enqueue_style('main_css', get_template_directory_uri() . '/style.css', 'all');

  /*
   * Remove woocommerce styles from non Woocomemrce pages
   * if ( function_exists( 'is_woocommerce' ) ) {
   *     if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
   *        wp_dequeue_style( 'wc-gateway-ppec-frontend-cart' );
   *      }
   *    }
   */
}

function wpdocs_theme_name_scripts()
{
  wp_enqueue_style('flex-slider', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.min.css');
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');
  wp_enqueue_script('flex-slider', 'https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider.js', array(), '1.0.0');
}

function wpt_theme_js()
{  // get the necesary code files for the theme to work

  wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/code/general/code.js', array('jquery'), '', true);
  /* load custom code on page based on template name
  if(is_page()){ //Check if we are viewing a page
    global $wp_query;

          //Check which template is assigned to current page we are looking at
    $template_name = get_post_meta( $wp_query->post->ID, '_wp_page_template', true );
    if($template_name == 'page-templates/page-FoodDrDr.php'){
             //If page is draggable
       wp_enqueue_script('draggable', 'https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js','', true);
    }
  }*/
}

function woocommerce_support()
{  // add support
  add_theme_support('woocommerce');
  // add_theme_support( 'menus' );
  // add_theme_support( 'post-thumbnails' );
}

function gtm()
{  // add google tag mannager
  ?>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5MPFZLK');</script>
      <!-- End Google Tag Manager -->  
<?php
}

/*
 * ********************WOOCOMMERCE*****************************
 * *******help functions to start any soowommerce store*******
 */

function remove_woocommerce_styles_scripts()
{  // remove all scripts from none woocommerce pages
  if (function_exists('is_woocommerce')) {
    if (!is_cart() && !is_checkout()) {
      remove_action('wp_enqueue_scripts', [WC_Frontend_Scripts::class, 'load_scripts']);
      remove_action('wp_print_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
      remove_action('wp_print_footer_scripts', [WC_Frontend_Scripts::class, 'localize_printed_scripts'], 5);
    }
  }
}

function custom_remove_woo_checkout_fields($fields)
{  // remove fields from checkout
  if (function_exists('is_woocommerce')) {
    // remove billing fields
    // unset($fields['billing']['billing_first_name']);
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    // unset($fields['billing']['billing_address_1']);
    // unset($fields['billing']['billing_address_2']);
    // unset($fields['billing']['billing_city']);
    // unset($fields['billing']['billing_postcode']);
    // unset($fields['billing']['billing_country']);
    // unset($fields['billing']['billing_state']);
    unset($fields['billing']['billing_phone']);
    // unset($fields['billing']['billing_email']);

    // remove order comment fields
    unset($fields['order']['order_comments']);

    return $fields;
  }
}

function prueba()
{
  echo 'hola';
}

function output_h1()
{
  echo '<h1>Hola desde hook</h1>';
}

add_action('wp_ajax_accion', 'recibirDatos');
add_action('wp_ajax_nopriv_accion', 'recibirDatos');

function recibirDatos()
{
  $cat = $_POST['cat'];
  // echo $data['nombre'];
  $args = array(
    'post_type' => 'product',
    'product_cat' => $cat,
  );
  $the_query = new WP_Query($args);
  $links = array();

  if ($the_query->have_posts()):
    while ($the_query->have_posts()):
      $the_query->the_post();

?>
        <?php $links[] = '<a href=" ' . get_the_permalink() . ' "> ' . get_the_title() . ' </a> <br>' ?>
<?php
    endwhile;
  endif;

  wp_send_json($links);

  // die();
}

add_action('wp_ajax_archive', 'recibirDatosArchive');
add_action('wp_ajax_nopriv_archive', 'recibirDatosArchive');

function recibirDatosArchive()
{
  if (isset($_POST['cat'])) {
    $cat = sanitize_text_field($_POST['cat']);
  } else {
    wp_send_json_error('No se proporcionó una categoría válida.');
    return;
  }

  $args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'product_cat' => $cat,
  );

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()) {
    $products = array();  // Array para almacenar los productos

    while ($the_query->have_posts()) {
      $the_query->the_post();
      $product_id = get_the_ID();
      $products[] = get_template_html('content-product.php', array(
        'product' => wc_get_product($product_id),
      ));
    }

    wp_send_json($products);  // Devolver los productos como JSON
  } else {
    wp_send_json_error('No se encontraron productos en la categoría proporcionada.');
  }

  wp_reset_postdata();
}

add_filter('woocommerce_add_to_cart_fragments', 'refrescar_header', 10, 1);

function refrescar_header($fragments)
{
  global $woocommerce;

  $fragments['.total-carrito'] = '<span class="total-carrito"> ' . WC()->cart->get_cart_total() . ' </span>';

  // $fragments['.contenedor-carrito'] = '<div class="contenedor-carrito">' . $mini_cart . '</div>';

  return $fragments;
}

add_filter('woocommerce_widget_cart_item_quantity', 'add_minicart_quantity_fields', 10, 3);

function add_minicart_quantity_fields($html, $cart_item, $cart_item_key)
{
  // Obtiene la cantidad actual del producto
  $quantity = $cart_item['quantity'];

  // Construye el campo de cantidad con botones de aumento y disminución
  $quantity_field = '<div class="mini-cart-quantity">';
  $quantity_field .= '<button class="decrease-quantity" type="button">-</button>';
  $quantity_field .= '<input type="number" step="1" min="1" name="cart[' . esc_attr($cart_item_key) . '][qty]" value="' . esc_attr($quantity) . '" title="' . __('Qty', 'woocommerce') . '" size="4" pattern="[0-9]*" inputmode="numeric" data-cart_item_key="' . esc_attr($cart_item_key) . '" data-product_id="' . esc_attr($cart_item['product_id']) . '" />';
  $quantity_field .= '<button class="increase-quantity" type="button">+</button>';
  $quantity_field .= '</div>';

  // Devuelve el campo de cantidad
  return $quantity_field;
}

add_action('wp_ajax_update_cart_item_quantity', 'update_cart_item_quantity');
add_action('wp_ajax_nopriv_update_cart_item_quantity', 'update_cart_item_quantity');

function update_cart_item_quantity()
{
  $product_id = intval($_POST['product_id']);
  
  $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
  $quantity = intval($_POST['quantity']);

  // Actualiza la cantidad del producto en el carrito
  $cart_items = WC()->cart->get_cart();
  $cart_item = $cart_items[ $cart_item_key ];
  $product   = $cart_item['data'];
  $status = WC()->cart->set_quantity( $cart_item_key, $quantity );
  if ( $status ) {
    $message = sprintf( __( '"%s" has been updated.', 'cart-for-woocommerce' ), $product->get_name() );
    echo $message; 
    //die();

  }
  
  
}

add_action('widgets_init', 'my_register_sidebars');

function my_register_sidebars()
{
  /* Register the 'primary' sidebar. */
  register_sidebar(
    array(
      'id' => 'primary',
      'name' => __('Primary Sidebar'),
      'description' => __('A short description of the sidebar.'),
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );
  /* Repeat register_sidebar() code for additional sidebars. */
};

// Estilo de mini-cart
function agregar_titulo_mini_cart()
{
  echo '
  <div class="header-mini-cart">
  <div class="titulo-mini-cart">
  <h2>Tus productos</h2>
</div>';
};

add_action('woocommerce_before_mini_cart', 'agregar_titulo_mini_cart');

function encapsular_minicart() {
  // Agregar un div alrededor del contenido de la minicart
  echo '
  </div >
  <div class="footer-carrito">
  <div class="titulo-mini-cart">
  <h2>Resumen De Tu Pedido</h2>
  </div>
  <div class="minicart-wrapper-total">'
  ;
}

add_filter('woocommerce_widget_shopping_cart_total', 'encapsular_minicart', 9);

function cerrar_div_minicart() {
  // Cerrar el div que encapsula el contenido de la minicart
  echo '</div><!-- CIERRE DIV BOTONES -->
  </div>'; // Cierre del div .minicart-wrapper-total
}

add_action('woocommerce_widget_shopping_cart_after_buttons', 'cerrar_div_minicart', 10);


function encapsular_total_minicart() {
  // Agregar un div alrededor del total de la minicart
  echo  '<div class="contenedor-total"> ';
  
}

add_filter('woocommerce_widget_shopping_cart_total', 'encapsular_total_minicart', 9);


function cerrar_total_minicart() {
  // Agregar un div alrededor del total de la minicart
  echo  '</div> 
  <hr>';

  
}

add_filter('woocommerce_widget_shopping_cart_before_buttons', 'cerrar_total_minicart', 10);

?>

