<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>
    <?php wp_title('|', true, 'right'); ?>
    <?php
		echo get_bloginfo('name');  // this is the name of your website.
		// use your code to display title in all other pages.
	?>
</title>

<?php wp_head(); ?>

</head>



<body <?php body_class() ?>>
<div class="contenedor-carrito">
  <div class="widget_shopping_cart_content">
<?php
woocommerce_mini_cart()

?>
</div>
</div>
<div class="navbar">
  	<div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.jpg" alt="Logo"></div>
    <div class="menu-item"><i class="fas fa-home"></i></div>
    <div class="menu-item">About Us</div>
    <div class="menu-item">Search</div>
    <div class="menu-item">Routes</div>
    <div id="abrir-carrito" class="menu-item ver-carrito">
      Ver carrito 
      
    </div>
    <div class="menu-item">
       <span class="total-carrito">
        <?php echo WC()->cart->get_cart_total(); ?>
       </span>

    </div>
    <div class="menu-item menu-expanded"><i class="fas fa-bars"></i></div>


  </div>
  <div class="overlay-header">
    <div>

    </div>
			
  </div>
  <div class="notificacion">
    <div class="contenedor-notificacion">
        
    </div>
  </div>
  <a id="boton-overlay" href="">Abrir overlay</a>
<div id="sidebar-primary" class="sidebar">
	<?php dynamic_sidebar( 'primary' ); ?>
</div>
  
</body>