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



<body>

<div class="l-adventure-element">
  <div class="navbar">
  	<div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.jpg" alt="Logo"></div>
    <div class="menu-item"><i class="fas fa-home"></i></div>
    <div class="menu-item">About Us</div>
    <div class="menu-item">Search</div>
    <div class="menu-item">Routes</div>
    <div class="menu-item"><i class="fas fa-bars"></i></div>
  </div>
	
	<div class="m-title">
  		EXPAND YOUR <span data-text="WORLD">WORLD</span>
	</div>
	<div class="m-search-bar">
		<div class="m-search-bar__icon"><i class="fa fa-search"></i></div>
		<input type="text" placeholder="Find your adventure" class="m-search-bar__input">
		<div class="m-search-bar__text">SEARCH</div>
	</div>
    <div class="m-categories">
		<button class="m-category --selected"><i class="fa fa-hotel"></i> Hotels</button>
		<button class="m-category"><i class="fa fa-binoculars"></i> Tours</button>
		<button class="m-category"><i class="fa fa-plane"></i> Flights</button>
		<button class="m-category"><i class="fa fa-map"></i> Excursions</button>
		<button class="m-category"><i class="fa fa-bicycle"></i> Bike Travel</button>
		<button class="m-category"><i class="fa fa-tent"></i> Camping</button>
		<button class="m-category"><i class="fa fa-sun"></i> One-day</button>
    </div>
</div>
</body>