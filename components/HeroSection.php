<?php 
    global $post_exclude;
?>

<style>
.hero-section {position: relative;z-index: 1;overflow: hidden; margin-bottom: 60px;background-color: #f1eee7;}
.hero-section::before{content:"";position: absolute;border-radius: 50%;background-color: #fcfbfa;top:5%;left:6%;z-index: -1;padding: 25%;}
.hero-section::after{content:"";position: absolute;height: 126px;width: 126px;border-radius: 50%;background-color: #fbb195;bottom: -63px;left: 50%;}
.hero-section .inner-wrap { display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap;}
.hero-section .left-wrap { width: calc(100% - 500px);padding-right: 100px;padding-top: 40px; }
.hero-section .right-wrap{padding: 20px;}
.hero-section .img-wrap {height: 354px;width: 354px;border-radius: 50%;}
.hero-section .img-wrap::before{content:"";position: absolute;height: 110%;width: 110%;top:50%;left:50%;transform: translate(-50%, -50%);background-position: bottom;background-size: contain;background-repeat: no-repeat;background-image: url(<?php echo THEME_ROOT . '/assets/img/img-art.svg'; ?>);}
.hero-section .title { font-size: 30px; line-height: 45px; color: #753200;text-transform: capitalize;}
.hero-section .desc { font-size: 16px; line-height: 25px; color: #753200; height: 50px; overflow: hidden; margin: 15px 0 25px 0;}
.hero-section .desc *{font-weight: 400;font-style: normal;}
.hero-section .btn { width: 160px; height: 50px; border-radius: 6px; background-color: #753200; color: #fff; text-transform: capitalize; line-height: 50px;margin-bottom: 50px;background-position: right 25px center;background-size: 10px;background-repeat: no-repeat;background-image: url(<?php echo THEME_ROOT . '/assets/img/btn-arrow.svg'; ?>);padding-left: 25px;}
.hero-section .category{border-radius: 4px;border:1px solid #969183;padding: 6px;margin-bottom: 20px;font-size: 12px;}
.hero-section .arrow{position: absolute;top:40%;transform: translateY(-50%);height:43px;width:43px;border-radius: 50%;background-color: #e3ddd1;}
.hero-section .arrow svg{left: 50%;top:50%;transform: translate(-50%, -50%);position: absolute;}
.hero-section .prev{left:15px;}
.hero-section .next{right:15px;}
.hero-section .hero-slider:not(.slick-initialized) li:not(:first-child){display: none;}


@media screen and (max-width: 1250px){
.hero-section::before{top:15%;left:-2%}
.hero-section::after{left:42%;}
.hero-section .arrow{display: none;}
.hero-section .slick-dots{bottom:0px;text-align: left;}
.hero-section .slick-dots li{height: auto;width: auto;}
.hero-section .slick-dots button::before{display: none;}
.hero-section .slick-dots button{height:12px;width:12px;border-radius: 50%;background-color: #f1eee7;border:1px solid #fbb195}
.hero-section .slick-dots li.slick-active button{height:9px;width:18px;background-color: #fbb195;border-radius: 10px;}
}

@media screen and (max-width: 1024px){
.hero-section .left-wrap{padding-right: 0px;}
}

@media screen and (max-width: 899px){
.hero-section .left-wrap{width:calc(100% - 350px);}
.hero-section .img-wrap{height:300px;width: 300px;}
.hero-section .btn{margin-bottom: 30px;}
.hero-section .category{margin-bottom: 10px;}
.hero-section .desc{margin: 15px 0 25px 0;}
}

@media screen and (max-width: 767px){
.hero-section{margin-bottom: 30px;}
.hero-section::before{top:315px;bottom:initial;padding:0;left: 50%;transform: translateX(-50%);height: 740px;width:740px}
.hero-section::after{left: initial;right: -10px;}
.hero-section .left-wrap{width: 100%;order: 1;text-align: center;padding-top: 20px;}
.hero-section .right-wrap{width: 100%;order:0;margin-bottom: 60px;padding: 0;}
.hero-section .title{font-size: 20px;line-height: 28px;margin-bottom: 10px;}
.hero-section .desc{display: none;}
.hero-section .img-wrap{margin: 0 auto;}
.hero-section .btn{text-align: left;width: 145px;height: 45px;line-height: 45px;padding-left: 18px;background-position: right 18px center;margin-bottom: 0;}
.hero-section .slick-dots{text-align: center;bottom:initial;top:330px}
}

@media screen and (max-width: 480px){
.hero-section .img-wrap{height: 230px;width: 230px;}
.hero-section::before{top:240px}
.hero-section::after{bottom: -80px;right: -40px;}
.hero-section .left-wrap{padding-top: 0;}
.hero-section .slick-dots{top:250px}
}

@media screen and (min-width: 1025px){ 
.hero-section .arrow:hover{background-color: #fff;cursor: pointer;}
.hero-section .arrow:hover .arrow-color{fill:#dedacf}
.hero-section .btn:hover{background-color:#fbb195;}
}
</style>
<div class="hero-section">
    <div class="prev arrow tran"><?php echo get_svgs('prev-arrow'); ?></div>
    <div class="next arrow tran"><?php echo get_svgs('next-arrow'); ?></div>
    <div class="container">
        <div class="main-wrap">
            <ul class="hero-slider">
                <?php
                $articles = getArticles(['posts_per_page' => 4, 'post__not_in' => $post_exclude]);
                while ($articles->have_posts()) : $articles->the_post();
                    $post_exclude[] = get_the_ID();
                ?>
                <li class="card">
                    <div class="inner-wrap">
                        <div class="left-wrap">
                            <?php $cats = get_the_category($post->ID); ?>
                                <?php if(!empty($cats)) { ?>
                                <span class="category disp-in"><?php echo $cats[0]->name; ?></span>
                            <?php }; ?>
                            <div class="title"><?php the_title(); ?></div>
                            <div class="desc"><?php the_content(); ?></div>
                            <a href="<?php echo the_permalink(); ?>" class="btn disp-in">read more</a>
                        </div>
                        <div class="right-wrap">
                            <?php $url = get_the_post_thumbnail_url(get_the_ID()); ?>
                            <div class="img-wrap bgi pos-rel"
                                style="background-image:url('<?php echo addslashes($url); ?>')"></div>
                        </div>
                    </div>
                </li>
                <?php endwhile;
            wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</div>