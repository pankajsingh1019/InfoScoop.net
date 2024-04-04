<?php get_header(); ?>
<style>
	.fail-head-wrap{width: 100%;padding: 174px 0;background-color:#fff;}
	.fail-head-cont{width:700px;max-width:100%;position:relative;padding:50px;box-shadow: 22px 24px 55px -13px rgba(0,0,0,0.6);border-radius:10px}
	.fail-head-one{font-size: 45px; color: #753200; font-weight: 700; margin: 0 0 5px;line-height:45px}
	.fail-head-two{font-size:40px;font-weight:700;color:#753200;margin:0 0 10px;line-height:45px}
	.fail-head{margin:0 0 45px;position:relative}
	.fail-head::after{content:"";position:absolute;bottom:-22px;left:0;width:100px;background:#fff;height:3px}
	.fail-desc{font-size:16px;line-height:25px;color:#753200;margin:0 0 40px}
	.goto-links a{display:inline-block;border:2px solid #fff;padding:0 20px;height:50px;line-height:47px;border-radius:25px;font-weight:600;color:#fff;position:relative;z-index:1}
	.goto-links a::after{content:"";position:absolute;left:0;top:0;width:100%;height:100%;background: #753200;;z-index:-1;border-radius:25px;transition:.3s}
	.goto-links a:hover::after{background:#fbb195}
	.goto-links a:hover{color:#fff}
	footer{margin-top:0;}

	@media only screen and (max-width:1200px){
		.fail-head-cont{padding:25px;width:600px}
	}

	@media screen and (max-width:767px){
		.fail-head-wrap{padding:40px 0}

	}

	@media only screen and (max-width: 599px){
		.fail-head-cont{padding:20px 15px 15px}
	}
</style>
<div class="fail-head-wrap sticky-footer min-height">
	<div class="container">
		<div class="fail-head-cont">
			<div class="fail-head">
				<p class="fail-head-one"><?php _e('404', 'upz'); ?></p>
				<p class="fail-head-two"><?php _e('Lost in space', 'anf'); ?></p>
			</div>
			<div class="fail-desc">
				<?php _e( 'Ooops, looks like the page you are trying to reach is no longer available. Please check the URL for proper spelling and capitalization. If you\'re having a trouble locating a destination on InfoScoop.net, try visiting InfoScoop.net home page.' ); ?>
			</div>
			<div class="goto-links">
				<a href="<?php echo esc_url( home_url( '/' ) ) ; ?>" class="goto-link-one hide-ov">Go Home</a>
			</div>
		</div>
	</div>
</div>	
<?php get_footer(); ?>