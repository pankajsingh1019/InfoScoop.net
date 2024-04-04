<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="google-site-verification" content="UB4kAv3r9V1bQlX4LHAR3grTQ1WP4DEQ4TZVdM-l9jo" />
    <meta name="description" content="
	<?php
		if (is_single()) {
			single_post_title('', true);
		} else{
			bloginfo('name');
			echo " – ";
			bloginfo('description');
		}
	?>" />
    <title><?php bloginfo('name'); ?> | <?php if (is_single()) {
			single_post_title('', true);
		} else{
			bloginfo('description');
		} ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="description"
        content="Read up about fashion, makeup trends,  fitness, health, finance, and travel. InfoScoop.net offers expertly-curated blogs across varied categories.">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@400;700&display=swap" rel="stylesheet">
    <meta name="theme-color" content="#ff7724">
    <meta name="msapplication-navbutton-color" content="#f1eee7">
    <link rel="shortcut icon" href="<?php echo THEME_ROOT; ?>/assets/img/favicon.png" type="image/png" />
    <meta name="apple-mobile-web-app-status-bar-style" content="#000">
    <?php
        wp_head();
		if(function_exists('get_common_file_path')){
            include(get_common_file_path('header'));
            include(get_common_file_path('DFPInitialization', array('slots_data' => array(
                array(
                    'ad_unit_path'=>'/45361917/infoscoop.net-onodfp/Blog-Article-List-Category-300x250-1',
                    'width' => 300,
                    'height' => 250,
                    'opt_div_id' => 'blog-article-list-category-300x250-1',
                    'page' => array('article-page-desktop','custom-blog-page-desktop','category-page-desktop','article-page-mobile', 'custom-blog-page-mobile', 'category-page-mobile')
                )
            ))));
		}
	?>
</head>

<body <?php body_class(); ?>>
    <header class="header <?php echo THEME_PREFIX; ?>-header pos-rel">
        <div class="container">
            <div class="main-wrap pos-rel">
                <?php
                    if (function_exists('the_custom_logo')) {
                        the_custom_logo();
                    }
                ?> 
                <div class="right-wrap">
                    <div class="head-links">
                        <?php wp_nav_menu( array( 'menu' => 'Header Links' ) ); ?>
                    </div>
                    <div class="search-wrap">
                        <div class="form-wrap">
                            <form action="<?php echo home_url( '/' ); ?>" method="get" id="searchForm" class="search-form tran">
                                <input type="submit" class="search-submit" value="Search">
                                <input id="prodSearch" name="s" class="search-input" value="" type="text" required
                                    autocomplete="off" placeholder="Search...">
                                <input type="hidden" name="post_type" value="post" />
                            </form>
                        </div>
                        <div class="head-menu">
                            <a href="javascript:void(0)" class="label disp-in">Categories <?php echo get_svgs('arrow-down'); ?></a>
                            <?php wp_nav_menu( array( 'menu' => 'Header Menu' ) ); ?>
                        </div>
                    </div> 
                </div>
                <a href="javascript:void(0)" class="icons">
                    <?php echo get_svgs('menu-cross'); ?>
                    <?php echo get_svgs('menu-dots'); ?>
                </a>
            </div>
        </div>
    </header>
<div id="overlay" class="tran"></div>
<div class="min-ht-wrpr">
    <div class="<?php echo THEME_PREFIX; ?>-breadcrumb">
        <?php get_breadcrumb(); ?>
    </div>