<?php 
/**
 * Template Name: Acomodações
 *
 * @package BravaClub
 */
get_header();
$acomodacoes = new WP_Query( array( 'post_type' => 'acomodacoes','post__not_in' => array($post->ID), 'order' => 'DESC'));
if ( have_posts () ) : while (have_posts()) : the_post(); 
$galeria = get_field('galeria'); 
$features = get_field('features'); 
?>
<section class="panels">
    <div class="container">
        <aside class="sidebar">
            <div>
                <h3 class="title"><?php echo get_the_title(); ?></h3>
                <?php echo get_the_content(); ?>
            </div>
            <div>
                <ul>
                    <?php while ( $acomodacoes->have_posts() ) : $acomodacoes->the_post(); ?> 
                    <li>
                        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                            <?php echo get_the_title(); ?>
                        </a>
                    </li>
                    <?php endwhile; ?>
                </ul>                                
            </div>
            <a href="mailto:contato@bravaclub.com?subject=<?php echo "Reserva ".get_the_title(); ?>" title="Reserve Já" class="btn -btn-2">Reserve Já</a>
        </aside>
        <?php if($galeria) : ?>
        <div class="feed">
            <div class="galeria">
                <div class="owl-carousel owl-theme">
                    <?php foreach( $galeria as $i => $row ) :  ?>
                    <div style="background-image:url(<?php echo $row['imagem']['url']; ?>)" class="item">
                        <!-- -->
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>                 
        <?php endif; ?>       
    </div>
</section>
<section class="a-acomodacao">
    <div class="container">
        <?php if(get_field('informações_extras')) : ?>
        <?php echo get_field('informações_extras'); ?>
        <?php endif; ?>
        <?php if($features) : ?>
        <h4>Amenidades</h4>
        <ul class="item-list">
            <?php foreach( $features as $i => $row ) :  ?>
            <li><?php echo $row['feature']; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
    </div>
</section>
<?php 
        endwhile; 
    endif; 
    get_footer(); 
?>