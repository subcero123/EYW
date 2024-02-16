<?php
/** Template Name: example of page template */
get_header();
?>

<select id="select-filtro" class="filtro" name="select">

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
$all_categories = get_categories($args);
foreach ($all_categories as $cat) {
    $cat_name = $cat->cat_name;
    $cat_slug = $cat->slug;
    echo '<option value=' . $cat_slug . '>' . $cat_name . '</option>';
}
?>
 
</select>
<a id="boton-filtro" data-cat="" href="#">
    filtrar
</a>
</div>
<div class="ajax" id="js-ajax">
<?php
if ($_GET['cat']) {
    $taxonomy = $_GET['cat'];
} else {
    $taxonomy = 'clothing';
}
$args = array(
    'post_type' => 'product',
    'product_cat' => $taxonomy,
);
$the_query = new WP_Query($args);
?>

<?php
if ($the_query->have_posts()):
    while ($the_query->have_posts()):
        $the_query->the_post();

        ?>
        <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
        <br>

<?php
    endwhile;
endif;
?>
</div>


<?php get_footer() ?>