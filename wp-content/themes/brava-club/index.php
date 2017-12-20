<?php 
/**
 * Template Name: Home
 *
 * @package BravaClub
 */
get_header(); 
$webdoor = new WP_Query( array( 'post_type' => 'webdoor', 'order' => 'DESC'));
$acomodacoes = new WP_Query( array( 'post_type' => 'acomodacoes', 'order' => 'DESC'));
$pacote = new WP_Query( array( 'post_type' => 'pacote', 'posts_per_page' =>  2, 'order' => 'DESC'));
$blog = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' =>  2, 'order' => 'DESC'));
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
    <?php if(get_field('a_pousada', 'option')) : ?>
        <section id="a-pousada" class="a-pousada">
            <div class="container">
                <h2 class="title">A Pousada</h2>
                <?php echo get_field('a_pousada', 'option'); ?>
            </div>
        </section>
    <?php endif; ?>
    <?php if($acomodacoes->have_posts()=="1") : ?> 
    <section id="acomodacoes" class="acomodacoes">
        <div class="container">
            <h2 class="title">Acomodações</h2>
            <div class="owl-carousel owl-theme">    
                <?php while ( $acomodacoes->have_posts() ) : $acomodacoes->the_post(); ?> 
                <div onclick="document.location='<?php echo get_the_permalink(); ?>';return false;" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>)" class="item">
                    <!-- -->
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php if($blog->have_posts()=="1") : ?>
    <section id="noticias" class="noticias">
        <div class="container">
            <h2 class="title">Notícias</h2>
            <div class="grid">
                <?php while ( $blog->have_posts() ) : $blog->the_post(); ?>
                <?php get_template_part('assets/css/components/post/post-blog'); ?>
                <?php endwhile; ?>
            </div>
            <a href="<?php echo site_url()."/noticias"; ?>" title="Mais Notícias" class="mais">
                <span>Mais Notícias</span>
                <i class="fa fa-chevron-right"></i>
            </a>
        </div>
    </section>
    <?php endif; ?>
    <?php if(get_theme_mod('telefone')||get_theme_mod('email')||get_theme_mod('endereco')||get_theme_mod('gmaps')) : ?>
    <section id="contato" class="contato">
        <div class="container">
            <h2 class="title">Contato</h2>
            <ul>
                <?php if(get_theme_mod('telefone')) : ?>
                <li>
                    <p><i class="fa fa-phone"></i> <?php echo get_theme_mod('telefone'); ?></p>
                </li>
                <?php endif; ?>
                <?php if(get_theme_mod('email')) : ?>
                <li>
                    <p><i class="fa fa-envelope"></i> <a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></p>
                </li>
                <?php endif; ?>
                <?php if(get_theme_mod('endereco')) : ?>
                <li>
                    <p><i class="fa fa-map-marker"></i> <span><?php echo get_theme_mod('endereco'); ?></span></p>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if(get_theme_mod('gmaps')) : ?>
        <div id="gmap_canvas" class="map"></div>
        <?php endif; ?>
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
            <a href="<?php echo site_url()."/pacotes"; ?>" title="Mais Pacotes" class="mais">
                <span>Mais Pacotes</span>
                <i class="fa fa-chevron-right"></i>
            </a>
        </div>
    </section>
    <?php endif; ?>
<?php get_footer(); ?>