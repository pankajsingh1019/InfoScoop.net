<?php
	include_once 'includes/remove-junk.php';
	include_once 'includes/pagination.php';
	include_once 'includes/customize.php';

	if( !defined('THEME_ROOT') ){
		define( 'THEME_ROOT', get_template_directory_uri() );
	}
	if( !defined('THEME_PREFIX') ){
		define( 'THEME_PREFIX', 'is' );
	}

	global $dfp_status;
	$dfp_status = false;

	add_filter( 'nav_menu_link_attributes', 'custom_data_attribute', 10, 4 );
	function custom_data_attribute( $atts, $item, $args ) {
		$atts['data-hover'] = $item->title;
		return $atts;
	}

	//Register Navigation Location
	function register_theme_menus(){
		register_nav_menus( array(
			'header-links'	=>	__('Header Links'),
			'header-menu'	=>	__('Header Menu'),
			'footer-links'	=>	__('Footer Links'),
			'footer-pages'	=>	__('Footer Pages')
		) );
	}
	add_action( 'after_setup_theme', 'register_theme_menus' );

		if( function_exists('add_theme_support') ){
			add_theme_support('menus');
			add_theme_support('post-thumbnails');

			//Add Image Sizes
			add_image_size('thumbnail-360x220', '360', '220', array("1", ""), true);
			add_image_size('thumbnail-180x140', '180', '140', array("1", ""), true);
			add_image_size('thumbnail-540x420', '540', '420', array("1", ""), true);
			add_image_size('thumbnail-220x200', '220', '200', array("1", ""), true);
			add_image_size('thumbnail-320x210', '320', '210', array("1", ""), true);
			
			//Allow Shortcode In Widget Area
			add_filter('widget_text','do_shortcode');
		}
	
		function site_assets(){
			wp_enqueue_style( 
				'slick-theme', THEME_ROOT.'/assets/css/slick.css',
				$deps = array(),
				filemtime( get_template_directory() . '/assets/css/slick.css' ),
				$media = 'all'
			);
			wp_enqueue_style( 
				'bootstrap-stylesheet', THEME_ROOT.'/assets/css/bootstrap.css',
				$deps = array(),
				filemtime( get_template_directory() . '/assets/css/bootstrap.css' ),
				$media = 'all'
			);
			wp_enqueue_style( 
				'header-stylesheet', THEME_ROOT.'/assets/css/header.css',
				$deps = array(),
				filemtime( get_template_directory() . '/assets/css/header.css' ),
				$media = 'all'
			);
			wp_enqueue_style( 
				'footer-stylesheet', THEME_ROOT.'/assets/css/footer.css',
				$deps = array(),
				filemtime( get_template_directory() . '/assets/css/footer.css' ),
				$media = 'all'
			);
			wp_enqueue_style( 
				'main-stylesheet', THEME_ROOT.'/style.css',
				$deps = array(),
				filemtime( get_template_directory() . '/style.css' ),
				$media = 'all'
			);
	
			if (is_front_page()) {
				wp_enqueue_style( 
					'autocomplete', THEME_ROOT.'/assets/css/autocomplete.min.css',
					$deps = array(),
					filemtime( get_template_directory() . '/assets/css/autocomplete.min.css' ),
					$media = 'all'
				);
			}

		/* Scripts */

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
		wp_enqueue_script( 'jquery' );

		if ( is_front_page() ) {
			wp_enqueue_script( 
				'jquery-autocomplete', THEME_ROOT.'/assets/js/autocomplete.js',
				$deps = array('jquery'),
				filemtime( get_template_directory() . '/assets/js/autocomplete.js' ),
				$in_footer = true
			);
		}

		wp_enqueue_script( 
			'slick-script', THEME_ROOT.'/assets/js/slick.js',
			$deps = array('jquery'),
			filemtime( get_template_directory() . '/assets/js/slick.js' ),
			$in_footer = true
		);
		
		wp_enqueue_script( 
			'main-script', THEME_ROOT.'/assets/js/main.js',
			$deps = array('jquery'),
			filemtime( get_template_directory().'/assets/js/main.js' ),
			$in_footer = true
		);
	}
	add_action( 'wp_enqueue_scripts', 'site_assets' );

	// short desc
	function short_excerpt($num){
		$excerpt = get_the_content();
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$the_str = substr($excerpt, 0, $num);
		return ($the_str ."...");
	}

	// short title
	function elipsed_title($num) {
		$limit = $num + 1;
		$title = explode(' ', get_the_title(), $limit);
		array_pop($title);
		$title = implode(" ",$title)."...";
		echo $title;
	}

	function excerpt_new_1($num, $link){
		$excerpt = get_the_content();
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$the_str = substr($excerpt, 0, $num);
		echo $the_str ."...<a href='" . $link . "' class='read-more disp-in'> Read More</a>";	}

	function getArticles($queryArgs=[]){
		$defaultArgs = [
			'post_type' => 'post',
			'post_status' => 'publish',
			'orderby' => 'rand'
		];
		
		$my_query = null;
		$my_query = new WP_Query(array_merge($defaultArgs, $queryArgs));
		return $my_query;
	}
		
	
	//Use for featured Image
	
	function post_query_thumbnail($thumbs_size = 'post-thumbnails'){
			$url = get_the_post_thumbnail_url(null, $thumbs_size);
			if ($url) {
					echo esc_url($url);
			} else {
					echo bloginfo('template_url') . '/assets/img/default-image.png';
			}
	}
	

	// Frontend Admin Bar
	show_admin_bar(false);

	// Removing type attribute from script and link tag
	add_filter('autoptimize_html_after_minify', 'codeless_remove_type_attr', 10, 2);
	add_filter('style_loader_tag', 'codeless_remove_type_attr', 10, 2);
	add_filter('script_loader_tag', 'codeless_remove_type_attr', 10, 2);
	add_filter('autoptimize_html_after_minify', 'codeless_remove_type_attr', 10, 2);
	function codeless_remove_type_attr($tag, $handle){
		return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
	}

	//Register tag cloud filter callback
	add_filter('widget_tag_cloud_args', 'tag_widget_limit');

	//Limit number of tags inside widget
	function tag_widget_limit($args){
	if(isset($args['taxonomy']) && $args['taxonomy'] == 'post_tag'){
		$args['number'] = 8;
	}
	return $args;
	}
	
	function upload_svg_files( $allowed ) {
		if ( !current_user_can( 'manage_options' ) )
			return $allowed;
		$allowed['svg'] = 'image/svg+xml';
		return $allowed;
	}
	add_filter( 'upload_mimes', 'upload_svg_files');


	$svgs = include('components/SVG.php');
	function get_svgs($name){
		global $svgs;
		return (!empty($svgs[$name])?$svgs[$name]:'');
	}


	function element($fileName,$variables = []){
		ob_start();
		extract($variables);
		if(strpos($fileName,'.php') === false){
			$fileName.='.php';
		}
		include(locate_template("components/$fileName"));
		return ob_get_clean();
	}
	
	function getValue(&$var, $default){
		return isset($var) ? $var : $default;
	}

	function get_breadcrumb() {	
		$before_html = '<div class="breadcrumb"><div class="container">';
		$after_html = '</div></div>';
		$home =  '<a href="'.home_url().'" class="home" rel="nofollow">Home</a>'; 
		$sep = '<span class="sep">|</span>';
	
		$breadcrumbs_temp  = array(
			'blog.php',
			'category.php',
			'classifieds.php',
			'tag.php',
			'templates/template-default.php'
		);

		global $dispayBreadcrumb;		
		if( $dispayBreadcrumb ){
			echo $before_html;
			echo $home;
			echo $sep;
			if( is_single() ){    		
				the_category(' &bull; ');
				echo $sep . '<span class="main-txt">';
				echo the_title();
				echo '</span>';
			}elseif ( is_category() ) {
				echo '<span class="main-txt">';
				echo  single_cat_title();
				echo '</span>';
			}elseif( in_array( get_page_template_slug() , $breadcrumbs_temp) ){
				echo '<span class="main-txt">';
				echo the_title();
				echo '</span>';
			}elseif ( is_tag() ) {
				echo '<span class="main-txt">';
				echo single_cat_title();
				echo '</span>';
			}
			echo $after_html;
		}	    
	}
	
	
