<?php 
/**
 * Template Name: Tour
 *
 * @package BravaClub
 */
get_header(); 
$galeria = new WP_Query( array( 'post_type' => 'galeria', 'order' => 'ASC'));
?>
<section class="tour-virtual">
    <div class="container">
        <h2 class="title">Tour Virtual</h2>
        <!-- Espaço para o tour virtual -->

        <!--  -->
    </div>
</section>
<?php if($galeria) : ?>
<section class="fotos">
    <div class="container">
        <h2 class="title">fotos</h2>
        <div class="tabs photo-grid">
            <ul class="tabs-navigation">
                <?php
                    $taxonomy = 'galeria_taxonomy';
                    $terms = get_terms($taxonomy); 
                    if ( $terms ) :
                        foreach ( $terms as $term ) : 
                            echo '<li><a href="javascript:void(0)">'.$term->name.'</a></li>';
                        endforeach;
                    endif;
                ?>
                <li>
                    <a href="javascript:void(0)" title="Tudo">Tudo</a>
                </li>
            </ul>
            <ul class="tabs-content">
                <?php if($galeria->have_posts()=="1") : while ( $galeria->have_posts() ) : $galeria->the_post(); $categories = get_the_terms( $post->ID, 'galeria_taxonomy' ); $categories = array_shift( $categories ); ?> 
                <li class="<?php echo $categories->slug; ?>">
                    <a href="javascript:void(0)" onclick="openModal(this)" title="<?php echo get_the_title(); ?>" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>)"></a>
                </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>