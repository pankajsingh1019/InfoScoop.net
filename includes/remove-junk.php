<?php

    //Remove Embed script
    function dequeue_wp_embed(){
        wp_deregister_script( 'wp-embed' );
    }
    add_action( 'wp_footer', 'dequeue_wp_embed' );

    // Remove default wordpress thumbnail sizes
    function remove_default_image_sizes( $sizes) {
        unset( $sizes['thumbnail']);
        unset( $sizes['medium']);
        unset( $sizes['large']);
        return $sizes;
    }
    add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

    // Remove jquery migrate
    function dequeue_jquery_migrate( &$scripts){
        if(!is_admin()){
            $scripts->remove( 'jquery');
            $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
        }
    }
    add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

    //Remove Unwanted Wordpress Stuff
    add_filter('wp_get_attachment_image_attributes', function($attr) {
        if (isset($attr['sizes'])) unset($attr['sizes']);
        if (isset($attr['srcset'])) unset($attr['srcset']);
        return $attr;
    });
    add_filter('wp_calculate_image_sizes', '__return_false');
    add_filter('wp_calculate_image_srcset', '__return_false');

    remove_filter('the_content', 'wp_make_content_images_responsive');
    remove_action('wp_print_styles', 'print_emoji_styles' );
    remove_action('admin_print_scripts', 'print_emoji_detection_script' );
    remove_action('admin_print_styles', 'print_emoji_styles' );
    remove_action('wp_head', 'print_emoji_detection_script', 7 );
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link', 10, 0);
    remove_action('wp_head', 'start_post_rel_link', 10, 0);
    remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
    remove_action('wp_head', 'rel_canonical');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
    remove_action('wp_head', 'rest_output_link_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_resource_hints', 2 );