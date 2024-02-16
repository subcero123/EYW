
<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */
if (!defined('ABSPATH')) {
    exit;  // Exit if accessed directly
}

get_header('shop');
?>
<!--
<div class="l-container-principal-shop-item">
    <?php while (have_posts()): ?>
        <div class="l-container-izquierdo">
            <?php the_post(); 
            echo woocommerce_get_product_thumbnail(); ?>
        </div>
        <div class="l-container-derecho">
            <div class="m-container-informacion">
                <h2><?php the_title(); ?></h2>
                <div class="product-rating">
                    <b>5.0</b>
                    <?php echo wc_get_rating_html(get_the_ID()); ?>
                </div>
                <div class="product-price">
                    <?php echo $product->get_price_html(); ?>
                    <b> FOR TWO</b>
                </div>
                <div class="product-information">
                    <div class="info">
                        <b><i class="fa-solid fa-location-dot"></i>Lorem Ipsum</b>
                    </div>
                    <div class="info">
                        <b><i class="fa-solid fa-calendar"></i>12/04/23</b>
                    </div>
                    <div class="info">
                        <b><i class="fa-solid fa-plane"></i>Lorem Ipsum</b>
                    </div>
                </div>
                <div class="product-amenities">
                    <div class="amenity">
                        <b><i class="fa-solid fa-wifi"></i> Free Wi-Fi</b>
                    </div>
                    <div class="amenity">
                        <b><i class="fa-solid fa-wifi"></i> Free Wi-Fi</b>
                    </div>
                    <div class="amenity">
                        <b><i class="fa-solid fa-wifi"></i> Free Wi-Fi</b>
                    </div>
                </div>
                <div class="product-reservation">
                    <?php woocommerce_template_single_add_to_cart(); ?>
                </div>
            </div>
            <div class="m-container-related-products">
                <div class="related-products-container">
                    <?php
                    $related_products = wc_get_related_products(get_the_ID(), 2);

                    foreach ($related_products as $related_product_id) {
                        $related_product = wc_get_product($related_product_id);
                        $image_url = wp_get_attachment_url($related_product->get_image_id()); // Obtener la URL de la imagen
                        ?>

                        <div class="related-product">
                            <a href="<?php echo esc_url(get_permalink($related_product_id)); ?>">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($related_product->get_title()); ?>">
                                
                                <h3><?php echo esc_html($related_product->get_title()); ?></h3>
                            </a>
                            <h2>POPULAR PRODUCT</h2>
                        </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endwhile; // end of the loop. ?>
</div>
-->

<?php
get_footer('shop');

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
?>
