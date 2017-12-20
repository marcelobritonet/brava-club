<?php 
/**
 * Template Name: Blog
 *
 * @package BravaClub
 */
get_header(); 
$blog = new WP_Query( array( 'post_type' => 'post', 'order' => 'DESC'));
?>
<?php if($blog->have_posts()=="1") : ?>
<section id="noticias" class="noticias">
    <div class="container">
        <h2 class="title">Notícias</h2>
        <div class="grid">
            <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
            <?php get_template_part('assets/css/components/post/post-blog'); ?>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>