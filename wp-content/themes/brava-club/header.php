<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php if (is_front_page()) { echo get_bloginfo('title')." - ".get_bloginfo('description'); } else { echo get_bloginfo('title')." - ".get_the_title(); } ?></title>
    <?php wp_meta(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/php;charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="DC.title" content="<?php echo get_bloginfo('title'); ?>" />
    <meta name="DC.creator " content="Wesley Andrade - http://www.github.com/wesandradealves" />
    <meta name="DC.creator.address" content="http://www.github.com/wesandradealves" />
    <meta name="DC.description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta name="DC.publisher" content="Aluguel de carros online | Reserve aqui o seu veículo na CarRentalz - https://carrentalz.com.br/" />
    <meta name="DC.Identifier" content="<?php echo site_url(); ?>">
    <?php
        // header("Cache-Control: private, max-age=10800, store, cache, no-revalidate, pre-check=10800");
        // header("Pragma: private");
        // header("Expires: " . date(DATE_RFC822,strtotime("30 day")));    
    ?>
    <!--cache-->
    <!-- <meta http-equiv="cache-Control" content="public, max-age=604800" />
    <meta name="expires" content="sun, 03 Dec 2017 19:45:00 GMT">
    <meta name="date" content="2017-11-14T01:48:00EST">
    <meta name="last-modified" content="2017-11-14T01:48:00EST">
    <meta http-equiv="last-modified" content="2017-11-14T01:48:00EST"> -->
    <!---->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="audience" content="all" />
    <meta name="author" content="Wesley Andrade - http://www.github.com/wesandradealves" />
    <meta name="copyright" content="Wesley Andrade - http://www.github.com/wesandradealves" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="index, follow, ALL" />
    <meta name="GOOGLEBOT" content="index, follow" />
    <meta name="rating" content="General" />
    <meta name="revisit-after" content="2 Days" />
    <meta http-equiv="content-language" content="<?php echo $lang; ?>" />
    <meta name="language" content="<?php echo $lang; ?>" />
    <meta property="og:locale" content="<?php echo $lang; ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/screenshot.png" />
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php wp_head(); ?>
</head>
    <body 
        <?php
        global $post;
        global $wp_query;
        if (is_front_page()) {
        echo 'class="pg-home"';
        } else if(is_archive()){
        echo 'class="pg-archive pg-interna"';
        } else if(is_category()){
        echo 'class="pg-category pg-interna"';
        } else if(is_search()){
        echo 'class="pg-search pg-interna"';
        } else if(is_single()){
        echo 'class="pg-single pg-interna"';
        } else {
        echo 'class="pg-interna page_id_'.$post->ID.'"';
        }
        ?>>
        <div class="wrap">
            <!-- Header -->
            <header class="header">
                <!--  -->                
                <div class="container">
                    <div>
                        <h1>
                            <!-- Template Part Logo -->
                            <a href="" class="logo" title="">
                                <img height="46" src="assets/imgs/logo.png" alt="">
                            </a>
                            <!--  -->
                        </h1>
                        <!-- Template Part Registration -->
                        <form action="#" method="#" class="registration">
                            <div>
                                <i class="fa fa-calendar"></i>
                                <span class="btn -btn-1">
                                    Data da Reserva
                                    <input type="hidden" value="" />
                                </span>
                            </div>
                            <div>
                                <i class="fa fa-users"></i>
                                <span class="btn -btn-1">
                                    10 Hóspede(s)
                                </span>
                            </div>
                        </form>                        
                    </div>
                    <!-- Template Part Navigation -->
                    <nav class="navigation -menu">
                        <ul>
                            <li>
                                <a href="">A Pousada</a>
                            </li>
                            <li>
                                <a href="">Tour e Fotos</a>
                            </li> 
                            <li>
                                <a href="">Acomodações</a>
                            </li>
                            <li>
                                <a href="">Pacotes</a>
                            </li> 
                            <li>
                                <a href="">Notícias</a>
                            </li>
                            <li>
                                <a href="">Serviços</a>
                            </li> 
                            <li>
                                <a href="">Avaliações</a>
                            </li>
                            <li>
                                <a href="">Contato</a>
                            </li> 
                            <li>
                                <button onclick="mobileNavigation()" type="button" class="tcon tcon-menu--xcross" aria-label="toggle menu">
                                    <span class="tcon-menu__lines" aria-hidden="true">
                                    </span>
                                    <span class="tcon-visuallyhidden">toggle menu</span>
                                </button>
                            </li>
                        </ul>
                    </nav>
                    <!--  -->
                </div>
                <!-- Template Part Navigation -->
                <nav class="navigation -menu -mobile-navigation">
                    <ul>
                        <li>
                            <a href="">A Pousada</a>
                        </li>
                        <li>
                            <a href="">Tour e Fotos</a>
                        </li> 
                        <li>
                            <a href="">Acomodações</a>
                        </li>
                        <li>
                            <a href="">Pacotes</a>
                        </li> 
                        <li>
                            <a href="">Notícias</a>
                        </li>
                        <li>
                            <a href="">Serviços</a>
                        </li> 
                        <li>
                            <a href="">Avaliações</a>
                        </li>
                        <li>
                            <a href="">Contato</a>
                        </li> 
                        <li>
                            <button onclick="mobileNavigation()" type="button" class="tcon tcon-menu--xcross" aria-label="toggle menu">
                                <span class="tcon-menu__lines" aria-hidden="true">
                                </span>
                                <span class="tcon-visuallyhidden">toggle menu</span>
                            </button>
                        </li>
                    </ul>
                </nav>
            </header>
            <main>