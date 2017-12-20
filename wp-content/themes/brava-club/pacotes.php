<?php 
/**
 * Template Name: Pacotes
 *
 * @package BravaClub
 */
get_header(); 
$pacote = new WP_Query( array( 'post_type' => 'pacote', 'order' => 'DESC'));
$webdoor = new WP_Query( array( 'post_type' => 'webdoor', 'order' => 'DESC'));
?>
<?php if($webdoor->have_posts()=="1") : ?> 
<style type="text/css">
    .item[onclick]{
        cursor: pointer
    }
</style>       
<section class="webdoor">
    <div class="owl-carousel owl-theme">    
        <?php 
            while ( $webdoor->have_posts() ) : $webdoor->the_post(); 
            get_template_part('assets/css/components/owlcarousel/owlcarousel');
            endwhile;
        ?>
    </div>
</section>
<?php endif; ?>
<?php if($pacote->have_posts()=="1") : ?>
<section id="pacotes" class="pacotes">
    <div class="container">
        <h2 class="title">Pacotes</h2>
        <div class="grid">
            <?php while ( $pacote->have_posts() ) : $pacote->the_post(); ?>
            <?php get_template_part('assets/css/components/post/post-pacote'); ?>
            <?php endwhile; ?>
        </div>
        <?php if(is_home()) : ?>
        <a href="<?php echo site_url()."/pacotes"; ?>" title="Mais Pacotes" class="mais">
            <span>Mais Pacotes</span>
            <i class="fa fa-chevron-right"></i>
        </a>
        <?php endif; ?>
    </div>
</section>
<?php 
    endif; 
    wp_reset_postdata(); 
?>
<?php get_footer(); ?>