<?php get_header() ?>
<h1>busqueda</h1>
<?php
    if ( have_posts() ){
		while (have_posts()) {
			the_post();
			?>
			<a href="<?php echo get_the_permalink()?>">
			<?php echo get_the_title()?>
			</a>
			<br>
	<?php			
		}
    }
    else{
        echo "No se encontró su busqueda";
    }
	?>

<?php get_footer() ?>