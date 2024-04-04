<?php get_header(); ?>

<style>
/* Header Changes */
.is-header .head-links, .is-header .head-menu{display: none !important;}
/* ----------- */

/* Footer changes */
@media screen and (max-width: 767px){
    .is-footer .custom-logo-link, .is-footer img{margin: 0 auto;}
    .is-footer p, .is-footer .footer-links{display: none;}
    .is-footer ul{border-bottom: 1px solid #e3ddd1;}
}


/* -------------------------- */
.main_title { color:#753200;font-weight:700;font-size:25px;line-height:34px;text-transform:capitalize;  }
.art_content p, .art_content li {font-size: 16px; color: #753200; line-height: 26px;list-style-position: inside; padding: 0;margin-bottom:10px;}
.art_block strong, .art_content h1, .art_content h2, .art_content h3, .art_content h4, .art_content h5, .art_content h6 {color: #ff6024; font-size: 16px; margin-bottom: 5px;font-weight:700;}

.later-content{display:none;}
.article__image{display:none;}
.serp{padding:20px 0 20px;background-color: #f7f5f1;}
.bottom-ed-wrapp ul{padding-left:0}
.readMoreBtn{cursor:pointer;color:#ea4c10;font-size:16px;font-weight:700;line-height:20px;text-transform:capitalize;text-decoration:underline;transition:color .3s ease-in;display:inline-block;margin:15px 0px 30px}
.readMoreBtn:hover{color:#ff6024;}
.article__image{width:50%;float:left;margin-right:15px;margin-bottom:15px;}
.article__image img{max-height:350px;height:auto;}
.art_content em,.art_content i{font-style:normal !important;}
.art_content p, .art_content li{list-style-position: inside;padding: 0;}
.art_block ul{padding: 0;}
.top-ed-wrapp , .read-more-link{display:none;}

@media all and (max-width:1024px) {
header .hamburger-box, header .ham-box {display:none;}
}

@media only screen and (max-width: 767px) {
.article__image {width: 100%;float: none;margin: 0 0 14px 0;}
/* Header */
.main_title {font-size:18px;font-weight:600;line-height:24px}
.article__image img{height: auto}
}
</style>

<?php
  global $ad_api_data;
  $formatted_ad_data = $ad_api_data['formatted_ads'];
//   prd($formatted_ad_data);
?>

<?php 
  function inbetween_content($content){
    
    $firstContent = end_with_sentence( $content, wp_is_mobile() ?100 :250 );
    $secContent = end_with_sentence( $firstContent['part2'], 120 );
    $thirdContent = end_with_sentence( $secContent['part2'], 100 );

    $content = '<div class="firstContent art_content art_block clearfix"> <p>'. $firstContent['part1'] . '</p></div>'.
                '<div class="later-content clearfix art_block"> <div class="secContent art_content clearfix"> <p>'. $secContent['part1'] . '</p></div>'.
                '<div class="thirdContent art_content clearfix"> <p>'. $thirdContent['part1'] . '</p></div>'.
                '<div class="remainingContent art_content clearfix"><p>'. $thirdContent['part2'] . '</p></div></div>';

    return $content;

    $minWordCount = 250;
  }
  add_filter('the_content', 'inbetween_content');

  function end_with_sentence($excerpt, $minWords) {       
    $first_part_array=array();
    $second_part_array=array();
    $firstPartFound = false;
    $wordCount = 0;

    $allowed_end = array('.', '!', '?', ':');
    $contentArr = preg_split('/(?=<[^>]+>)|\s+(?![^<>]+>)|&nbsp;/m', $excerpt, -1, PREG_SPLIT_NO_EMPTY);

    foreach ($contentArr as $key => $content) {
        $strippedContent = strip_tags($content);
        if( $strippedContent ){ $wordCount++; }

        $sentFound = in_array( $strippedContent[strlen($strippedContent)-1], $allowed_end );

        if( !$firstPartFound ){
            array_push($first_part_array, $content);
            if( $wordCount >= $minWords && $sentFound ){
                $firstPartFound = true;
            }
        } else{
            array_push($second_part_array, $content);
        }       
    }

    return array(
        'part1'=>implode(' ', $first_part_array),
        'part2'=>implode(' ', $second_part_array)
    );
  }
?>

<section class="serp">
    <div class="wrapper container">
        <?php if (have_posts()) : the_post(); ?>
        <div class="top-ed-wrapp"><?php include(locate_template('templates/top-eds-fb.php')); ?></div>
        <span class="read-more-link serp-read-more readMoreBtn" title="Read More">read more</span>
        <h2 class="main_title posttitle"><?php the_title(); ?></h2>
        <div class="article__image img-wrap">
            <?php the_post_thumbnail('', array('alt' => get_the_title(), 'title' => get_the_title(), 'class' => "img-responsive" )); ?>
        </div>
        <div class="serp-text-block">
            <?php the_content(); ?>
        </div>
        <?php endif;  ?>
        <div class="bottom-ed-wrapp"><?php include(locate_template('templates/bottom-eds-fb.php')); ?></div>
    </div>
</section>
<?php get_footer(); ?>

<script>
    $(document).ready(function() {
        var isMobile = <?php echo wp_is_mobile()?'true':'false'?>;
        $('.top-ed-wrapp').show().insertBefore(".later-content");
        $('.read-more-link').show().insertAfter('.top-ed-wrapp');
        $('.bottom-ed-wrapp').hide();
        $('.img-wrap').prependTo(".secContent");
        $('.article__image').show();

        var status = false;
        $(".readMoreBtn").click(function() {
            if (!status) {
                $('.bottom-ed-wrapp').show().insertAfter('.remainingContent');
                $('.later-content').slideDown();
                $(".readMoreBtn").html("Read Less");
                $(".readMoreBtn").attr("title", "Read Less");
                $(".readMoreBtn").css("display", "none");
                status = true;
            } else {

                if (window.innerWidth <= 768) {
                    $('html, body').animate({
                        scrollTop: '0'
                    }, 500);
                    setTimeout(function() {
                        $('.later-content').slideUp();
                    }, 500);
                } else {
                    $('.later-content').slideUp();
                }

                $(".readMoreBtn").html("Read More");
                $(".readMoreBtn").attr("title", "Read More");
                status = false;
            }
        });
    });

</script> 