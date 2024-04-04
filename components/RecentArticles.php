<?php 
    global $post_exclude;
    $num_post = 6;
    if(wp_is_mobile()){
        $num_post = 3;
    }
?>

<style>
.recent-articles{position: relative;overflow: hidden;z-index: 1;}
.recent-articles::before{content:'';position:absolute;top:40%;right:72px;width:84px;height:217px;background-image: url(<?php echo THEME_ROOT . '/assets/img/bottom-art-2.svg'; ?>);background-repeat: no-repeat;background-position: center;z-index: -1;opacity: .4;transform: scale(.6);}
.recent-articles .card-wrapper{margin: 0 -15px 30px -15px;}
.recent-articles .card{padding: 0 15px;}
.recent-articles .inner-wrapper{  border-radius: 4px; border: solid 1px #e3dfd4;padding: 20px;}
.recent-articles .img-wrap{padding: 32%;margin-bottom: 20px;border-radius: 4px;}
.recent-articles .category{font-size: 12px;padding: 6px;border:1px solid #969183;border-radius: 4px;color:#969183;text-transform: capitalize;margin-bottom: 8px;}
.recent-articles .title{font-size: 20px;line-height: 26px;font-weight: 700;color:#753200;height: 52px;margin-bottom: 8px;overflow: hidden;}
.recent-articles .desc{font-size: 16px;line-height: 20px;color:#753200;height: 40px;overflow: hidden;}
.recent-articles .desc *{font-weight: 400 !important;}
.recent-articles .slick-slide{height: auto;}

@media screen and (max-width: 1024px){
.recent-articles .card-wrapper{margin:0 -15px}
.recent-articles .card{padding: 0 15px;width:33.33%;float: left;margin-bottom: 20px;}
}

@media screen and (max-width: 767px){
.recent-articles .card{width: 100%;float: none;}
.recent-articles .inner-wrapper{padding: 15px;}
.recent-articles .title{height: auto;max-height:52px;}
.recent-articles .desc{height: auto;max-height:40px;}
}
@media screen and (min-width: 1025px){ 
.recent-articles .inner-wrapper:hover .title{color:#ea4c10}
}
</style>

<div class="recent-articles">
    <div class="container">
        <div class="main-wrap">
        <?php echo element('SectionTitleTwo',['title' => ["recent","articles"]]); ?>
            <ul class="card-wrapper recent-slider clearfix">
            <?php
                $articles = getArticles(['posts_per_page' => $num_post, 'post__not_in' => $post_exclude]);
                while ($articles->have_posts()) : $articles->the_post();
                    $post_exclude[] = get_the_ID();
                ?>
                <li class="card pos-rel">
                    <div class="inner-wrapper">
                        <?php $url = get_the_post_thumbnail_url(get_the_ID()); ?>
                            <div class="img-wrap bgi" style="background-image:url('<?php echo addslashes($url); ?>')"></div> 
                            <?php $cats = get_the_category($post->ID); ?>
                            <?php if(!empty($cats)) { ?>
                                <span class="category disp-in"><?php echo $cats[0]->name; ?></span>
                            <?php }; ?>
                            <div class="title"><?php the_title(); ?></div>
                            <div class="desc"><?php the_content(); ?></div>
                            <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                    </div>
                </li>
                <?php endwhile;
            wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</div>