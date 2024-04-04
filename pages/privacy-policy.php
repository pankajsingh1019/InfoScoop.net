<?php
	/* Template Name: Privacy-policy */
    get_header();
?>
<div class="privacy-policy static-page">
    <?php echo element("BreadCrumbs", ["page_name" => "Privacy"]); ?>
    <div class="container">
        <div class="static-head">Privacy Policy</div>
        <div class="main-wrap">
            <?php if(have_posts()) : the_post(); ?>
            <div class="info-wrap">
                <?php the_content(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>