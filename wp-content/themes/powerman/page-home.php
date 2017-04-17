<?php
/**
 * The home template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Template Name: Home
 *
 */



?>
<?php get_header();?>
<div class="container">
    
    <div class="page-home">
        
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

                <?php the_content(); ?>

    <?php endwhile; ?>
</div></div>
<?php get_footer(); ?>