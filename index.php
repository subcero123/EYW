<?php

/*
 * Displays single posts
 */

?>
<?php get_header() ?>
<?php
	    $taxonomy = get_field("categorias", "options");
		echo "hola";
		echo $taxonomy;
		
?>

<div class="l-container">
  <div class="l-section">
    <div class="m-wild-trips">
      <div class="m-text">
        WILD TRIPS
      </div>
      <button class="m-see-all">SEE ALL</button>
    </div>
    <div class="m-navigation-controls m-navigation-controls-1">
      <div class="flex-prev m-arrow-icon">
        <i class=" fa fa-arrow-left"></i>
      </div>
      <div class="flex-next m-arrow-icon m-arrow-icon--right">
        <i class="fa fa-arrow-right"></i>
      </div>
    </div>
  </div>
</div>
<div class="contenedor-slider">
<div class="flexslider flexslider-1">
	<div class="div-ocultar">

	</div>	
	<div id="js-mobile-indicator-1" class="mobile-indicator">

	</div>
  <ul class="slides">	
  <?php
	    $taxonomy = get_field("categorias", "options");
		$args = array(
			'post_type' => 'product',
			'tax_query' => array(
				array(
				'taxonomy' => 'product_cat',
				'field' => 'term_id',
				'terms' => $taxonomy
				 )
				)
		);
		$the_query = new WP_Query($args);
		while ($the_query->have_posts()) {
			$the_query->the_post();
			?>
			<li>
				<div class="m-slider-item">
					<div class="m-slider-overlay">
					<div class="corner-icons">
							<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
						</div>
						<img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="Slider Image">
						<div class="corner-container">
							<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
						</div>
						<div class="m-slider-text">
							<div class="column">
								<p class="bold-text"><?php echo get_the_title()?></p>
								<p class="gray-text">Transport: <b class="black-text">Quad bike <i class="fa-solid fa-motorcycle red-text"></i></b></p>
								<p class="gray-text">Distance: <b class="black-text">27 km</b></p>
							</div>
							<div class="column align-right">
								<p class="gray-text">Person: <b style="color:black;"> 2</b></p>
								<p class="gray-text">Max speed:</p>
								<p style="font-size: 20px">80-90 <b style="color: red; font-size: 15px;">km/h</b></p>
							</div>
						</div>
					</div>
				</div>
    		</li>
	<?php			
		}
	?>
	<!--
    <li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/quad-bikes.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">QUAD BIKE RIDES</p>
					<p class="gray-text">Transport: <b class="black-text">Quad bike <i class="fa-solid fa-motorcycle red-text"></i></b></p>
					<p class="gray-text">Distance: <b class="black-text">27 km</b></p>
				</div>
				<div class="column align-right">
					<p class="gray-text">Person: <b style="color:black;"> 2</b></p>
					<p class="gray-text">Max speed:</p>
					<p style="font-size: 20px">80-90 <b style="color: red; font-size: 15px;">km/h</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rafting.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">RAFTING</p>
					<p class="gray-text">Transport: <b class="black-text">Boat <i class="fa-solid fa-sailboat red-text"></i></b></p>
					<p class="gray-text">Distance: <b class="black-text">17 km</b></p>
				</div>
				<div class="column align-right">
					<p class="gray-text">Person: <b style="color:black;"> 17</b></p>
					<p class="gray-text">Max speed:</p>
					<p style="font-size: 20px">30-50 <b style="color: red; font-size: 15px;">km/h</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bike-ride.JPG" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">BIKE RIDES</p>
					<p class="gray-text">Transport: <b class="black-text">Bike <i class="fa-solid fa-bicycle red-text"></i></b></p>
					<p class="gray-text">Distance: <b class="black-text">19 km</b></p>
				</div>
				<div class="column align-right">
					<p class="gray-text">Person: <b style="color:black;"> 20</b></p>
					<p class="gray-text">Max speed:</p>
					<p style="font-size: 20px">80-90 <b style="color: red; font-size: 15px;">km/h</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/quad-bikes.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">QUAD BIKE RIDES</p>
					<p class="gray-text">Transport: <b class="black-text">Quad bike <i class="fa-solid fa-motorcycle red-text"></i></b></p>
					<p class="gray-text">Distance: <b class="black-text">27 km</b></p>
				</div>
				<div class="column align-right">
					<p class="gray-text">Person: <b style="color:black;"> 2</b></p>
					<p class="gray-text">Max speed:</p>
					<p style="font-size: 20px">80-90 <b style="color: red; font-size: 15px;">km/h</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rafting.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">RAFTING</p>
					<p class="gray-text">Transport: <b class="black-text">Boat <i class="fa-solid fa-sailboat red-text"></i></b></p>
					<p class="gray-text">Distance: <b class="black-text">17 km</b></p>
				</div>
				<div class="column align-right">
					<p class="gray-text">Person: <b style="color:black;"> 17</b></p>
					<p class="gray-text">Max speed:</p>
					<p style="font-size: 20px">30-50 <b style="color: red; font-size: 15px;">km/h</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/bike-ride.JPG" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">BIKE RIDES</p>
					<p class="gray-text">Transport: <b class="black-text">Bike <i class="fa-solid fa-bicycle red-text"></i></b></p>
					<p class="gray-text">Distance: <b class="black-text">19 km</b></p>
				</div>
				<div class="column align-right">
					<p class="gray-text">Person: <b style="color:black;"> 20</b></p>
					<p class="gray-text">Max speed:</p>
					<p style="font-size: 20px">80-90 <b style="color: red; font-size: 15px;">km/h</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	-->
  </ul>
</div>
</div>
<!-- HOTELS-->
<div class="l-container">
  <div class="l-section">
    <div class="m-wild-trips">
      <div class="m-text">
        HOTELS
      </div>
      <button class="m-see-all--selected">SEE ALL</button>
    </div>
    <div class="m-navigation-controls m-navigation-controls-2">
      <div class="flex-prev m-arrow-icon">
        <i class=" fa fa-arrow-left"></i>
      </div>
      <div class="flex-next m-arrow-icon m-arrow-icon--right">
        <i class="fa fa-arrow-right"></i>
      </div>
    </div>
  </div>
</div>
<div class="contenedor-slider">
	<div class="flexslider flexslider-2 ">
	<div class="div-ocultar">

	</div>	
	<ul class="slides">
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cancun.jpeg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
					<div class="column">
						<p class="bold-text">CANCUN HOTEL</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
					</div>
				</div>
			</div>
		</div>
		</li>
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/barcelo.jpg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
				<div class="column">
						<p class="bold-text">BARCELO COSTA CANCUN</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
					</div>
				</div>
			</div>
		</div>
		</li>
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/indian.jpg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
				<div class="column">
						<p class="bold-text">INDIAN HOTEL</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
				</div>
				</div>
			</div>
		</div>
		</li>
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cancun.jpeg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
				<div class="column">
						<p class="bold-text">ART DECO LUXURY HOTEL</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
					</div>
				</div>
			</div>
		</div>
		</li>
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cancun.jpeg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
					<div class="column">
						<p class="bold-text">CANCUN HOTEL</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
					</div>
				</div>
			</div>
		</div>
		</li>
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/barcelo.jpg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
				<div class="column">
						<p class="bold-text">BARCELO COSTA CANCUN</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
					</div>
				</div>
			</div>
		</div>
		</li>
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/indian.jpg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
				<div class="column">
						<p class="bold-text">INDIAN HOTEL</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
				</div>
				</div>
			</div>
		</div>
		</li>
		<li>
		<div class="m-slider-item">
			<div class="m-slider-overlay">
			<div class="corner-icons">
					<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
				</div>
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cancun.jpeg" alt="Slider Image">
				<div class="corner-container">
					<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
				</div>
				<div class="m-slider-text">
				<div class="column">
						<p class="bold-text">ART DECO LUXURY HOTEL</p>
						<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
						<p class="gray-text"><i class="red-text fa-solid fa-location-dot"></i> Turkey, Mamaria</p>
						<p class="gray-text"><i class="red-text fa-solid fa-hotel"></i> Rooms available: <b>375</b></p>
					</div>
				</div>
			</div>
		</div>
		</li>
		<!-- Agrega más slides para mostrar 4 elementos a la vez -->
	</ul>
	</div>
</div>


<!-- AIR TICKETS-->
<div class="l-container">
  <div class="l-section">
    <div class="m-wild-trips">
      <div class="m-text">
        AIR TICKETS
      </div>
      <button class="m-see-all">SEE ALL</button>
    </div>
    <div class="m-navigation-controls m-navigation-controls-3">
      <div class="flex-prev m-arrow-icon">
        <i class=" fa fa-arrow-left"></i>
      </div>
      <div class="flex-next m-arrow-icon m-arrow-icon--right">
        <i class="fa fa-arrow-right"></i>
      </div>
    </div>
  </div>
</div>
<div class="contenedor-slider">
<div class="flexslider flexslider-3">
	<div class="div-ocultar"></div>
  <ul class="slides">
    <li class="air-tickets">
      <div class="m-slider-item">
        <div class="m-slider-overlay m-slider-overlay--right">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img class="img-small" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faroe-island.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">BUDAPEST -- FAROE ISLANDS</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
					<p class="gray-text"><i class="red-text fa-solid fa-calendar"></i> 21/10/2020 | 03:53 pm</p>
					<p class="gray-text"><i class="red-text fa-solid fa-ticket"></i> Tickets available:  <b>13</b></p>
					<p class="gray-text"><i class="red-text fa-solid fa-plane"></i> Airline:  <b>Kyy Avla</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li class="air-tickets">
      <div class="m-slider-item">
        <div class="m-slider-overlay m-slider-overlay--right">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img class="img-small" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faroe-island.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">BUDAPEST -- FAROE ISLANDS</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
					<p class="gray-text"><i class="red-text fa-solid fa-calendar"></i> 21/10/2020 | 03:53 pm</p>
					<p class="gray-text"><i class="red-text fa-solid fa-ticket"></i> Tickets available:  <b>13</b></p>
					<p class="gray-text"><i class="red-text fa-solid fa-plane"></i> Airline:  <b>Kyy Avla</b></p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li class="air-tickets">
      <div class="m-slider-item">
        <div class="m-slider-overlay m-slider-overlay--right">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img class="img-small" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faroe-island.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">BUDAPEST -- FAROE ISLANDSL</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
					<p class="gray-text"><i class="red-text fa-solid fa-calendar"></i> 21/10/2020 | 03:53 pm</p>
					<p class="gray-text"><i class="red-text fa-solid fa-ticket"></i> Tickets available:  <b>13</b></p>
					<p class="gray-text"><i class="red-text fa-solid fa-plane"></i> Airline:  <b>Kyy Avla</b></p>
			</div>
			</div>
        </div>
      </div>
    </li>
	<li class="air-tickets">
  <div class="m-slider-item">
    <div class="m-slider-overlay m-slider-overlay--right">
      <div class="corner-icons">
        <div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
      </div>
      <img class="img-small" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faroe-island.jpg" alt="Slider Image">
      <div class="corner-container">
        <div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
      </div>
      <div class="m-slider-text">
        <div class="column">
          <p class="bold-text">BUDAPEST -- FAROE ISLANDS</p>
          <p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
		  <p class="gray-text"><i class="red-text fa-solid fa-calendar"></i> 21/10/2020 | 03:53 pm</p>
					<p class="gray-text"><i class="red-text fa-solid fa-ticket"></i> Tickets available:  <b>13</b></p>
					<p class="gray-text"><i class="red-text fa-solid fa-plane"></i> Airline:  <b>Kyy Avla</b></p>
        </div>
      </div>
    </div>
  </div>
	</li>

    <!-- Agrega más slides para mostrar 4 elementos a la vez -->
  </ul>
</div>
</div>

<!-- LAST MINUTE DEALS-->
<div class="l-container">
  <div class="l-section">
    <div class="m-wild-trips">
      <div class="m-text">
        LAST MINUTE DEALS
      </div>
    </div>
    <div class="m-navigation-controls m-navigation-controls-4">
      <div class="flex-prev m-arrow-icon">
        <i class=" fa fa-arrow-left"></i>
      </div>
      <div class="flex-next m-arrow-icon m-arrow-icon--right">
        <i class="fa fa-arrow-right"></i>
      </div>
    </div>
  </div>
</div>
<div class="contenedor-slider">
<div class="flexslider flexslider-4">
	<div class="div-ocultar"></div>
  <ul class="slides">
    <li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faroe.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">FAROE ISLANDS</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cleopatra.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">CLEOPATRA BEACH</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vasili.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">VASILI BEACH</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
			</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/costa.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">COSTA RICA</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faroe.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
				<div class="column">
					<p class="bold-text">FAROE ISLANDS</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cleopatra.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">CLEOPATRA BEACH</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
				</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/vasili.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">VASILI BEACH</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
			</div>
			</div>
        </div>
      </div>
    </li>
	<li>
      <div class="m-slider-item">
        <div class="m-slider-overlay">
		<div class="corner-icons">
				<div class="circle-icon">5<b style="color: #fcc200;">&#9733</b></div>
  			</div>
          	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/costa.jpg" alt="Slider Image">
			<div class="corner-container">
    			<div class="circle-container"><b style="color: #fcc200;">$</b> 450</div>
  			</div>
			<div class="m-slider-text">
			<div class="column">
					<p class="bold-text">COSTA RICA</p>
					<p class="gray-text">Lorem Ipsum is simply dummy text of the printing and ...</p>
				</div>
			</div>
        </div>
      </div>
    </li>
    <!-- Agrega más slides para mostrar 4 elementos a la vez -->
  </ul>
</div>
</div>

<div class="l-centered-container">
	<div class="overlay">
		<div class="m-title">DISCOVER THE WORLD WITH</div>
		<div class="m-subtitle">DISCOVER THE PLANET</div>
		<p class="m-lorem-ipsum">
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
		</p>
		<button class="m-button">TO BEGIN</button>
	</div>
</div>

<?php get_footer() ?>