<?php
	/* Template Name: About-us */
    get_header();
?>
<div class="about-us static-page">
    <?php echo element("BreadCrumbs", ["page_name" => "About"]); ?>
    <div class="mob-img-wrap">
        <div class="img-wrap-mob bgi">
        </div>
        <div class="mob-head">About Us</div>
    </div>
    <div class="container">
        <div class="static-head">About Us</div>
        <div class="main-wrap">
            <?php if(have_posts()) : the_post(); ?>
            <div class="info">
                <?php the_content(); ?>
            </div>
            <?php endif; ?>
            <div class="img-wrap">
                <div class="img bgi"></div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>