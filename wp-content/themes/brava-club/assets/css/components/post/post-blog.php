<article id="post_<?php echo get_the_id(); ?>" class="item">
    <?php if(wp_get_attachment_url(get_post_thumbnail_id($post->ID), full)) : ?>
    <div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)"></div>
    <?php endif; ?>
    <h3><?php echo get_the_title(); ?></h3>
    <?php if(is_single()) : ?>
    <p class="post-info">
        postado por <?php echo get_the_author(); ?> às <?php echo get_the_date(); ?>
    </p>
    <?php endif; ?>
    <p>
        <?php 
            if(!is_single()) {
                echo substr(get_the_content(), 0, 200);
            } else if(is_single()) { 
                echo get_the_content();
            }
        ?>    
    </p>
    <?php if(!is_single()) : ?>
        <a href="<?php echo get_the_permalink(); ?>" title="<?php echo get_the_title(); ?>" class="btn -btn-2">saiba mais</a>
    <?php endif; ?>
</article>