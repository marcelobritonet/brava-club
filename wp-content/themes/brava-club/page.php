<?php 
    get_header(); 
    get_template_part('assets/css/components/owcarousel/banner');
    if ( have_posts () ) : while (have_posts()):the_post(); 
        the_content();
		endwhile; 
    endif; 
    get_footer();
?>