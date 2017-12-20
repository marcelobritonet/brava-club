<?php echo locate_template($this); ?>
<a class="logo" href="<?php echo site_url(); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
    <?php if(get_theme_mod('logo')) : ?>
        <img height="46" src="<?php echo esc_url( get_theme_mod( 'logo' ) );?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) )." - ".get_bloginfo('description'); ?>">
    <?php else : ?>
        <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>
    <?php endif; ?>
</a> 