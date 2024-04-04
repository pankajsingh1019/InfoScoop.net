<?php 
    global $post_exclude;
?>
<style>
.popular-articles{position: relative;overflow: hidden;}
.popular-articles::before{content:'';position:absolute;top:35%;left:-20px;width:115px;height:230px;background-image: url(<?php echo THEME_ROOT . '/assets/img/bottom-art-2.svg'; ?>);background-position: center;background-repeat: no-repeat;background-size: cover;opacity: .3;}
.popular-articles::after{content:'';position:absolute;top:20%;right:-20px;width:57px;height:105px;background-image: url(<?php echo THEME_ROOT . '/assets/img/bottom-art-1.svg'; ?>);background-position: center;background-repeat: no-repeat;background-size: cover;z-index: -1;}
.popular-articles .card-wrapper{display: flex;justify-content: space-between;flex-wrap: wrap;}
.popular-articles .card{width:48.5%;padding: 20px; border-radius: 6px; border: solid 1px #e3dfd4;display: flex;justify-content: space-between;flex-wrap: wrap;margin-bottom: 25px;align-items: center;background-color: #fff;}
.popular-articles .img-wrap{width: 170px;height: 160px;border-radius: 4px;}
.popular-articles .info-wrap{width:calc(100% - 190px);}
.popular-articles .category{font-size: 12px;padding: 6px;border:1px solid #969183;border-radius: 4px;color:#969183;text-transform: capitalize;margin-bottom: 8px;}
.popular-articles .title{font-size: 20px;line-height: 26px;font-weight: 700;color:#753200;height: 52px;margin-bottom: 8px;overflow: hidden;}
.popular-articles .desc{font-size: 16px;line-height: 20px;color:#753200;height: 40px;overflow: hidden;}
.popular-articles .desc *{font-weight: 400 !important;}

@media screen and (max-width: 899px){
.popular-articles .card{width: 100%;}
.popular-articles .title{height: auto;max-height:52px;}
.popular-articles .desc{height: auto;max-height:40px;}
}

@media screen and (max-width: 767px){
.popular-articles .card{margin-bottom: 20px;padding: 12px;}
.popular-articles .img-wrap{width: 130px;height: 120px;}
.popular-articles .info-wrap{width:calc(100% - 145px);}
.popular-articles .desc{display: none;}
.popular-articles .title{font-size: 18px;line-height: 24px;max-height: 48px;}
.popular-articles .category{padding: 4px;}
}

@media screen and (max-width: 599px){   
.popular-articles .img-wrap{width: 110px;height: 100px;}
.popular-articles .info-wrap{width:calc(100% - 125px);}
.popular-articles .title{font-size:16px;line-height: 20px;max-height: 40px;}
}

@media screen and (min-width: 1025px){ 
.popular-articles .card:hover .title{color:#ea4c10}
}

</style>
<div class="popular-articles">
    <div class="container">
        <div class="main-wrap">
        <?php echo element('SectionTitleTwo',['title' => ["popular","articles"]]); ?>
            <ul class="card-wrapper">
                <?php
                $articles = getArticles(['posts_per_page' => 4, 'post__not_in' => $post_exclude]);
                while ($articles->have_posts()) : $articles->the_post();
                    $post_exclude[] = get_the_ID();
                ?>
                <li class="card pos-rel">
                    <?php $url = get_the_post_thumbnail_url(get_the_ID()); ?>
                    <div class="img-wrap bgi" style="background-image:url('<?php echo addslashes($url); ?>')"></div>
                    <div class="info-wrap">
                        <?php $cats = get_the_category($post->ID); ?>
                        <?php if(!empty($cats)) { ?>
                        <span class="category disp-in"><?php echo $cats[0]->name; ?></span>
                        <?php }; ?>
                        <div class="title"><?php the_title(); ?></div>
                        <div class="desc"><?php the_content(); ?></div>
                    </div>
                    <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                </li>
                <?php endwhile;
            wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</div>