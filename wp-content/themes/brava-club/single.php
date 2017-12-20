<?php 
    get_header();
    if ( have_posts () ) : while (have_posts()) : the_post(); 
?>
<?php 
    switch(get_post_type()){
        case 'post' : 
        ?> 
        <div class="container">
            <div class="grid">
            <?php get_template_part('assets/css/components/post/post-blog'); ?>
            </div>
        </div>
        <?php 
        break;
    }
    endwhile; 
endif; 
get_footer(); 
?>