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
<div class="l-adventure-element">
  <div class="navbar">
  	<div class="logo"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.jpg" alt="Logo"></div>
    <div class="menu-item"><i class="fas fa-home"></i></div>
    <div class="menu-item">About Us</div>
    <div class="menu-item">Search</div>
    <div class="menu-item">Routes</div>
    <div class="menu-item menu-expanded"><i class="fas fa-bars"></i></div>
  </div>
	
	<div class="m-title">
  		EXPAND YOUR <span data-text="WORLD">WORLD</span>
	</div>
	<div class="m-search-bar">
		
		<!--
		<div class="m-search-bar__icon"><i class="fa fa-search"></i></div>
		<input type="text" placeholder="Find your adventure" class="m-search-bar__input">
		<div class="m-search-bar__text">SEARCH</div>
		-->
		<?php

			echo get_search_form();
		?>
		
	</div>
    <div class="m-categories">
		<?php
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

			$all_categories = get_categories( $args );
			//var_dump($all_categories);
			foreach ($all_categories as $cat) {
				?>
				 <a href="<?php echo get_term_link($cat->slug, 'product_cat')?>"><button class="m-category"><i class="fa fa-hotel"></i><?php echo $cat->name;?></button></a> 
				<?php
			}
		?>
		
		<!--
		<button class="m-category --selected"><i class="fa fa-hotel"></i> Hotels</button>
		<button class="m-category --selected"><i class="fa fa-hotel"></i> Hotels</button>
		<button class="m-category"><i class="fa fa-binoculars"></i> Tours</button>
		<button class="m-category"><i class="fa fa-plane"></i> Flights</button>
		<button class="m-category"><i class="fa fa-map"></i> Excursions</button>
		<button class="m-category"><i class="fa fa-bicycle"></i> Bike Travel</button>
		<button class="m-category"><i class="fa fa-tent"></i> Camping</button>
		<button class="m-category"><i class="fa fa-sun"></i> One-day</button>
		-->
    </div>
</div>
</body>