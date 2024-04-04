<?php
	/* Template Name: Contact Us */
    get_header();
    
    global $is_eu_request;
    if($is_eu_request){
        header('Location:/');
    }
    
?>
<div class="contact-us static-page">
    <?php echo element("BreadCrumbs", ["page_name" => "Contact"]); ?>
    <div class="mob-img-wrap">
        <div class="img-wrap-mob bgi">
        </div>
        <div class="mob-head">Contact Us</div>
    </div>
    <div class="container">
        <div class="static-head">Contact Us</div>
        <div class="main-wrap">
            <div class="info">
                <div class="sub-head">Have queries? Email us to get them resolved. Also, write to us for your feedback, we’d love to hear from you.</div>
                <?php echo do_shortcode('[contact-form-7 id="1220" title="Contact-us"]'); ?>
            </div>
            <div class="img-wrap">
                <div class="img bgi"></div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '/thankyou/';
}, false );
</script>

<?php get_footer(); ?>