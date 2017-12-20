<ul>
    <?php wp_nav_menu( array( 'container' => false, 'menu' => 'Header', 'items_wrap' => '%3$s' ) ); ?>
    <li>
        <button onclick="mobileNavigation()" type="button" class="tcon tcon-menu--xcross" aria-label="toggle menu">
            <span class="tcon-menu__lines" aria-hidden="true">
            </span>
            <span class="tcon-visuallyhidden">toggle menu</span>
        </button>
    </li>
</ul>