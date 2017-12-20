<!-- Template Part Banner -->
<?php $fields = get_fields(); ?>
<div <?php if($fields['tera_url']==true) : ?> onclick="document.location='<?php echo $fields['url_do_webdoor']; ?>';return false;" <?php endif; ?> style="background-image:url(<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>)" class="item">
    <div class="container">
        
        <h2>
            <?php if($fields['tera_url']==true) : ?>
                <a target="_blank" class="btn -btn-1" href="<?php echo $fields['url_do_webdoor']; ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
            <?php else : echo "<span class='btn -btn-1'>".get_the_title()."</span>"; ?>
            <?php endif; ?>
        </h2>                
    </div>
</div>    

 