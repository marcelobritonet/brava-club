<article id="post_<?php echo get_the_id(); ?>" class="item -horizontal">
<div class="thumbnail" style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), full); ?>)"></div>
<div>
    <p>
        <?php echo get_the_title(); ?>
        <br><br>
        <?php echo get_the_content(); ?>
    </p>
</div>
</article>