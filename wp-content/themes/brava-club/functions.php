<?php

    ////////////////////////////////////////////////////

    function remove_menus(){
    global $post;
    remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'jetpack' );                    //Jetpack*
    // remove_menu_page( 'edit.php' );                   //Posts
    // remove_menu_page( 'upload.php' );                 //Media
    //   remove_menu_page( 'edit.php?post_type=page' );    //Pages
    // remove_menu_page( 'edit-comments.php' );          //Comments
    // remove_menu_page( 'themes.php' );                 //Appearance
    // remove_menu_page( 'plugins.php' );                //Plugins
    //   remove_menu_page( 'users.php' );                  //Users
    //   remove_menu_page( 'tools.php' );                  //Tools
    // remove_menu_page( 'options-general.php' );        //Settings
    // $frontpage_id = get_option('page_on_front');
    // add_menu_page( 'Home', 'Home', 'edit_posts', 'post.php?post='.$frontpage_id.'&action=edit', '', 'dashicons-admin-home', -1 );
    // add_menu_page( 'Customize', 'Customize', 'administrator', 'customize.php', '', 'dashicons-admin-appearance', 1 );
    }
    ////////////////////////////////////////////////////
    function getrid() {
    remove_post_type_support( 'page', 'page-attributes' );
    }
    ////////////////////////////////////////////////////
    function df_terms_clauses($clauses, $taxonomy, $args) {
    if (!empty($args['post_type'])) {
    global $wpdb;
    $post_types = array();
    foreach($args['post_type'] as $cpt) {
    $post_types[] = "'".$cpt."'";
    }
    if(!empty($post_types)) {
    $clauses['fields'] = 'DISTINCT '.str_replace('tt.*', 'tt.term_taxonomy_id, tt.term_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields']).', COUNT(t.term_id) AS count';
    $clauses['join'] .= ' INNER JOIN '.$wpdb->term_relationships.' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id INNER JOIN '.$wpdb->posts.' AS p ON p.ID = r.object_id';
    $clauses['where'] .= ' AND p.post_type IN ('.implode(',', $post_types).')';
    $clauses['orderby'] = 'GROUP BY t.term_id '.$clauses['orderby'];
    }
    }
    return $clauses;
    }
    ////////////////////////////////////////////////////
    //
    // function add_taxonomies_to_pages() {
    //  register_taxonomy_for_object_type( 'category', 'page' );
    //  }
    // function category_and_tag_archives( $wp_query ) {
    //     $my_post_array = array('post','page');

    //     if ( $wp_query->get( 'category_name' ) || $wp_query->get( 'cat' ) )
    //        $wp_query->set( 'post_type', $my_post_array );

    //    if ( $wp_query->get( 'tag' ) )
    //        $wp_query->set( 'post_type', $my_post_array );
    // }
    //
    ////////////////////////////////////////////////////
    function brava_club_theme_customizer( $wp_customize ) {
        $wp_customize->add_section( 'logo' , array(
        'title'       => __( 'Logo', 'brava-club' ),
        'priority'    => 1
        ));
        $wp_customize->add_setting( 'logo' );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
        'label'    => __( 'Logo', 'brava-club' ),
        'section'  => 'logo',
        'settings' => 'logo'
        )));
        //
        $wp_customize->add_panel( 'footer', array(
            'priority'       => 3,
            'capability'     => 'edit_theme_options',
            'title'          => __('Footer', 'themeslug')
        ));
        $wp_customize->add_section( 'copyright' , array(
        'title'       => __( 'Copyright', 'brava-club' ),
        'panel' => 'footer',
        'priority'    => 2
        ));
        $wp_customize->add_setting( 'copyright' );
        $wp_customize->add_control('copyright',  array(
            'label' => 'Copyright',
            'section' => 'copyright',
            'type' => 'text',
            'settings' => 'copyright'
        ));
        $wp_customize->add_section( 'social' , array(
        'title'       => __( 'Redes Sociais', 'brava-club' ),
        'panel' => 'footer',
        'priority'    => 2
        ));
        $wp_customize->add_setting( 'facebook' );
        $wp_customize->add_control('facebook',  array(
            'label' => 'Facebook',
            'section' => 'social',
            'type' => 'text',
            'settings' => 'facebook'
        ));
        $wp_customize->add_setting( 'instagram' );
        $wp_customize->add_control('instagram',  array(
            'label' => 'Instagram',
            'section' => 'social',
            'type' => 'text',
            'settings' => 'instagram'
        ));
        $wp_customize->add_setting( 'twitter' );
        $wp_customize->add_control('twitter',  array(
            'label' => 'Twitter',
            'section' => 'social',
            'type' => 'text',
            'settings' => 'twitter'
        ));
        //
        $wp_customize->add_section( 'contato' , array(
        'title'       => __( 'Contato', 'brava-club' ),
        'priority'    => 2
        ));
        $wp_customize->add_setting( 'telefone' );
        $wp_customize->add_control('telefone',  array(
            'label' => 'Telefone',
            'section' => 'contato',
            'type' => 'text',
            'settings' => 'telefone'
        ));
        $wp_customize->add_setting( 'email' );
        $wp_customize->add_control('email',  array(
            'label' => 'E-mail',
            'section' => 'contato',
            'type' => 'text',
            'settings' => 'email'
        ));
        $wp_customize->add_setting( 'endereco' );
        $wp_customize->add_control('endereco',  array(
            'label' => 'Endereço',
            'section' => 'contato',
            'type' => 'textarea',
            'settings' => 'endereco'
        ));
        $wp_customize->add_setting( 'gmaps' );
        $wp_customize->add_control('gmaps',  array(
            'label' => 'Google Maps',
            'section' => 'contato',
            'type' => 'textarea',
            'settings' => 'gmaps'
        ));
    }
    ////////////////////////////////////////////////////
    function remove_customizer_settings( $wp_customize ){
    $wp_customize->remove_panel('nav_menus');
    $wp_customize->remove_section('static_front_page');
    }
    ////////////////////////////////////////////////////
    function get_the_category_bytax( $id = false, $tcat = 'category' ) {
    $categories = get_the_terms( $id, $tcat );
    if ( ! $categories )
    $categories = array();
    $categories = array_values( $categories );
    foreach ( array_keys( $categories ) as $key ) {
    _make_cat_compat( $categories[$key] );
    }
    // Filter name is plural because we return alot of categories (possibly more than #13237) not just one
    return apply_filters( 'get_the_categories', $categories );
    }
    ////////////////////////////////////////////////////
    function get_custom_field_data($key, $echo = false) {
    global $post;
    $value = get_post_meta($post->ID, $key, true);
    if($echo == false) {
    return $value;
    } else {
    echo $value;
    }
    }
    ////////////////////////////////////////////////////
    function hide_admin_bar() {
    wp_add_inline_style('admin-bar', '<style> html { margin-top: 0 !important; } </style>');
    return false;
    }
    ////////////////////////////////////////////////////
    function menu() {
    register_nav_menus(
    array(
    'header' => __( 'Header' )
    )
    );
    }
    ////////////////////////////////////////////////////
    function updateNumbers() {
    global $wpdb;
    $querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'post' ";
    $pageposts = $wpdb->get_results($querystr, OBJECT);
    $counts = 0 ;
    if ($pageposts):
    foreach ($pageposts as $post):
    setup_postdata($post);
    $counts++;
    add_post_meta($post->ID, 'incr_number', $counts, true);
    update_post_meta($post->ID, 'incr_number', $counts);
    endforeach;
    endif;
    }
    ////////////////////////////////////////////////////
    set_post_thumbnail_size( 600, 600 );
    ////////////////////////////////////////////////////
    // if (class_exists('MultiPostThumbnails')) {
    // for ($i=1;$i<=15;$i++) {
    // new MultiPostThumbnails(
    // array(
    // 'label' => 'Imagem',
    // 'id' => 'featured-image-'.$i,
    // 'post_type' => 'page',
    // 'meta_key' => '_wp_page_template',

    // 'meta_value' => 'republicas.php'
    // )
    // );
    // }
    // }
    //
    ////////////////////////////////////////////////////
    function query_post_type($query) {
    if(is_category() || is_tag()) {
    $post_type = get_query_var('post_type');
    if($post_type)
    $post_type = $post_type;
    else
    $post_type = array('nav_menu_item','post','articles');
    $query->set('post_type',$post_type);
    return $query;
    }
    }
    function custom_pagination($numpages = '', $pagerange = '', $paged='') {
    if (empty($pagerange)) {
    $pagerange = 2;
    }
    /**
    * This first part of our function is a fallback
    * for custom pagination inside a regular loop that
    * uses the global $paged and global $wp_query variables.
    *
    * It's good because we can now override default pagination
    * in our theme, and use this function in default quries
    * and custom queries.
    */
    global $paged;
    if (empty($paged)) {
    $paged = 1;
    }
    if ($numpages == '') {
    global $wp_query;
    $numpages = $wp_query->max_num_pages;
    if(!$numpages) {
    $numpages = 1;
    }
    }
    /**
    * We construct the pagination arguments to enter into our paginate_links
    * function.
    */
    $pagination_args = array(
    'base'            => get_pagenum_link(1) . '%_%',
    'format'          => '<li>page/%#%</li>',
    'total'           => $numpages,
    'current'         => $paged,
    'show_all'        => False,
    'end_size'        => 1,
    'mid_size'        => $pagerange,
    'prev_next'       => true,
    'prev_text'       => __('&laquo;'),
    'next_text'       => __('&raquo;'),
    'type'            => 'plain',
    'add_args'        => false,
    'add_fragment'    => ''
    );
    $paginate_links = paginate_links($pagination_args);
    if ($paginate_links) {
    echo "<ul class='pagination'>";
        echo $paginate_links;
    echo "</ul>";
    }
    }
    ////////////////////////////////////////////////////
    function my_formatter($content) {
    $new_content = '';
    $pattern_full = '{(\[raw\].*?\[/raw\])}is';
    $pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
    $pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

    foreach ($pieces as $piece) {
    if (preg_match($pattern_contents, $piece, $matches)) {
    $new_content .= $matches[1];
    } else {
    $new_content .= wptexturize(wpautop($piece));
    }
    }

    return $new_content;
    }
    ////////////////////////////////////////////////////
    function regScripts() {
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_bloginfo('stylesheet_directory')."/node_modules/jquery/dist/jquery.min.js", '', '', true);
    wp_enqueue_script('pace-js', get_bloginfo('stylesheet_directory')."/assets/css/components/pace/pace.min.js", '', '', true);
    wp_enqueue_script('transformicons', get_bloginfo('stylesheet_directory')."/assets/css/components/transformicons/transformicons.min.js", '', '', true);
    wp_enqueue_script('owl-carousel', get_bloginfo('stylesheet_directory')."/assets/css/components/owlcarousel/owl.carousel.min.js", '', '', true);
    wp_enqueue_script('latinize', get_bloginfo('stylesheet_directory')."/node_modules/latinize/latinize.js", '', '', true);
    wp_enqueue_script('maps', "https://maps.googleapis.com/maps/api/js?v=3.exp", '', '', true);
    wp_enqueue_script('functions.js', get_bloginfo('stylesheet_directory')."/assets/js/functions.min.js", '', '', true);
    wp_enqueue_style('style-owl-carousel', get_bloginfo('stylesheet_directory').'/assets/css/components/owlcarousel/owl.carousel.min.css', '', '', '', true);
    wp_enqueue_style('style-owl-theme', get_bloginfo('stylesheet_directory').'/assets/css/components/owlcarousel/owl.theme.default.min.css', '', '', '', true);
    wp_enqueue_style('google-fonts', 'http://fontawesome.io/assets/font-awesome/css/font-awesome.css', '', '', '', true);
    wp_enqueue_style('font-awesome', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,700', '', '', '', true);
    wp_enqueue_style('style', get_bloginfo('stylesheet_directory').'/style.min.css', '', '', '', true); 
    }
    ////////////////////////////////////////////////////
    function my_add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
    }
    ////////////////////////////////////////////////////
    // Register widgetized areas
    // if ( ! function_exists( 'the_widgets_init' ) ) {
    //     function the_widgets_init() {
    //         if ( ! function_exists( 'register_sidebars' ) )
    //         return;
            
    //     }
    // }
    ////////////////////////////////////////////////////
    function add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="excerpt"', $excerpt);
        }
        function add_taxonomies_to_pages() {
        register_taxonomy_for_object_type( 'post_tag', 'page' );
        }
        function menu_fix_on_search_page( $query ) {
        if(is_search()){
        $query->set( 'post_type', array('attachment', 'post', 'nav_menu_item'));
        return $query;
        }
    }
    ////////////////////////////////////////////////////
    class description_walker extends Walker_Nav_Menu{
    function start_el(&$output, $item, $depth, $args){
    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="'. esc_attr( $class_names ) . '"';
    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . '>';
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $prepend = '<strong>';
        $append = '</strong>';
        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
        if($depth != 0)
        {
        $description = $append = $prepend = "";
        }
        $item_output = $args->before;
        $item_output .= '<a'. $attributes . $class_names .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        if ($item->menu_order == 1) {
        $classes[] = 'first';
        }
        }
        }
    ////////////////////////////////////////////////////
    function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
    }
    ////////////////////////////////////////////////////
    function hide_editor() {
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
        if( !isset( $post_id ) ) return;
        $page = get_the_title($post_id);
        remove_post_type_support('page', 'editor');
        remove_post_type_support('page', 'thumbnail');
    }
    // 

    if( function_exists('acf_add_options_page') ) {
    
        acf_add_options_page(array(
    		'page_title' 	=> 'BravaClub',
    		'menu_title'	=> 'BravaClub<br>Settings',
    		'menu_slug' 	=> 'brava-club',
    		'capability'	=> 'edit_posts',
            'parent_slug'   => '',
            'icon_url'      =>  get_template_directory_uri().'/favico.png', // Add this line and replace the second inverted commas with class of the icon you like
            'position' => -1
    	));
        
    	acf_add_options_sub_page(array(
    		'page_title' 	=> 'Home Settings',
    		'menu_title'	=> 'Home',
    		'capability'	=> 'edit_posts',
            'parent_slug'   => 'brava-club'
        ));
        
    	acf_add_options_sub_page(array(
    		'page_title' 	=> 'Footer Settings',
    		'menu_title'	=> 'Footer',
    		'capability'	=> 'edit_posts',
            'parent_slug'   => 'brava-club'
    	));
        
    	// acf_add_options_sub_page(array(
    	// 	'page_title' 	=> 'About Settings',
    	// 	'menu_title'	=> 'About',
    	// 	'capability'	=> 'edit_posts',
        //     'parent_slug'   => 'brava-club'
    	// ));

    	// acf_add_options_sub_page(array(
    	// 	'page_title' 	=> 'Benefits Settings',
    	// 	'menu_title'	=> 'Benefits',
    	// 	'capability'	=> 'edit_posts',
        //     'parent_slug'   => 'brava-club'
    	// ));

    	// acf_add_options_sub_page(array(
    	// 	'page_title' 	=> 'Getting Started Settings',
    	// 	'menu_title'	=> 'Getting Started',
    	// 	'capability'	=> 'edit_posts',
        //     'parent_slug'   => 'brava-club'
    	// ));
    }

    ////////////////////////////////////////////////////

    function search( $form ) {
        $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
        <input required="required" placeholder="Faça sua busca aqui" type="text" value="' . get_search_query() . '" name="s" id="s" />
        <button class="fa fa-search"></button>
        </form>';
     
        return $form;
    }
    add_filter( 'get_search_form', 'search' );

    //////////////////////////////////////////////////// 
    add_theme_support( 'post-thumbnails' );

    if( !is_admin() ) add_filter( 'pre_get_posts', 'menu_fix_on_search_page' );
    add_filter('upload_mimes', 'cc_mime_types');
    add_filter( 'wpcf7_validate_configuration', '__return_false' );
    add_filter('the_content', 'my_formatter', 99);
    add_filter('pre_get_posts', 'query_post_type');
    add_filter( 'show_admin_bar', 'hide_admin_bar' );
    add_filter('terms_clauses', 'df_terms_clauses', 10, 3);
    add_filter( "the_excerpt", "add_class_to_excerpt" );
    add_action( 'wp_enqueue_scripts', 'regScripts' );
    add_action ( 'publish_post', 'updateNumbers' );
    add_action ( 'deleted_post', 'updateNumbers' );
    add_action ( 'edit_post', 'updateNumbers' );
    add_action( 'init', 'menu' );
    add_action( 'customize_register', 'remove_customizer_settings', 20 );
    add_action( 'customize_register', 'brava_club_theme_customizer' );
    // if ( ! is_admin() ) {
    //    add_action( 'pre_get_posts', 'category_and_tag_archives' );
    // }
    // add_action( 'init', 'add_taxonomies_to_pages' );
    add_action( 'admin_menu', 'remove_menus' );
    add_action( 'init', 'getrid' );
    add_action( 'init', 'my_add_excerpts_to_pages' );
    // add_action( 'init', 'the_widgets_init' );
    add_action( 'init', 'add_taxonomies_to_pages' );
    add_action( 'admin_init', 'hide_editor' );
    // add_action( 'widgets_init', 'register_widgets' );
    // update_option( 'siteurl', 'http://www.gabrieldegennaro.com.br/projects/brava-club/' );
    // update_option( 'home', 'http://www.gabrieldegennaro.com.br/projects/brava-club/' );

?>