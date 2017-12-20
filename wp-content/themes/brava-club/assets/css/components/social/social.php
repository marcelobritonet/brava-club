<?php if ( get_theme_mod('facebook') || get_theme_mod('twitter') || get_theme_mod('instagram') ) : ?>
    <ul class="social">
        <?php if ( get_theme_mod('facebook') ) : ?>
        <li>
            <a href="<?php echo get_theme_mod('facebook');  ?>" title="Facebook" target="_blank" class="fa fa-facebook"></a>
        </li>
        <?php endif; ?>
        <?php if ( get_theme_mod('instagram') ) : ?>
        <li>
            <a href="<?php echo get_theme_mod('instagram');  ?>" title="Instagram" target="_blank" class="fa fa-instagram"></a>
        </li>
        <?php endif; ?>
        <?php if ( get_theme_mod('twitter') ) : ?>
        <li>
            <a href="<?php echo get_theme_mod('twitter');  ?>" title="Twitter" target="_blank" class="fa fa-twitter"></a>
        </li>
        <?php endif; ?>
    </ul>
<?php endif; ?>