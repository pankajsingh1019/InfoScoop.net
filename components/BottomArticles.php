<?php 
    global $post_exclude;
?>
<style>
.bottom-articles { background-color: #f1eee7; padding: 60px 0;}
.bottom-articles .left-wrapper .card-wrapper{ background-color: #fff; border-radius: 8px; padding: 20px; }
.bottom-articles .left-wrapper .card { display: flex; justify-content: space-between; flex-wrap: wrap; margin-bottom: 25px; align-items: center; }
.bottom-articles .left-wrapper .card:last-child{margin-bottom: 0;}
.bottom-articles .left-wrapper .img-wrap { width: 230px; height: 150px; border-radius: 4px; }
.bottom-articles .left-wrapper .info-wrap { width: calc(100% - 250px); padding-right: 100px; }
.bottom-articles .left-wrapper .category { font-size: 12px; padding: 6px; border: 1px solid #969183; border-radius: 4px; color: #969183; text-transform: capitalize; margin-bottom: 8px; }
.bottom-articles .left-wrapper .title { font-size: 20px; line-height: 26px; font-weight: 700; color: #753200; height: auto; max-height: 52px; margin-bottom: 8px; overflow: hidden; }
.bottom-articles .left-wrapper .desc { font-size: 16px; line-height: 20px; color: #753200; height: 40px; overflow: hidden; }
.bottom-articles .left-wrapper .desc * { font-weight: 400 !important; }
.bottom-articles .arrow { position: absolute; height: 43px; width: 43px; border-radius: 50%; border: solid 1px #753200; top: 50%; transform: translateY(-50%); right: 30px; }
.bottom-articles .arrow svg { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); }
.bottom-articles svg .arrow-color { fill: #753200 }
.bottom-articles .side-bar .side-articles{padding: 0;border:none;border-radius: 0;}
.bottom-articles .side-bar .card-wrapper { border: none; background-color: #fff; padding:25px 20px; border-radius: 8px; }
.bottom-articles .side-bar .side-articles .card:last-child{margin-bottom: 0;}
.bottom-articles .side-bar .side-articles-one{margin-bottom: 40px;}

.bottom-articles .left-wrapper{position: relative;z-index: 1;}
.bottom-articles .left-wrapper::before{content:'';position:absolute;height: 207px;width:104px;left:-104px;bottom:10%;background-image: url(<?php echo THEME_ROOT . '/assets/img/bottom-art-1.svg'; ?>);background-repeat: no-repeat;background-position: center;z-index: -1;}
.bottom-articles .side-articles-one{position: relative;z-index: 1;}
.bottom-articles .side-articles-one::before{content:'';position:absolute;width:83px;height:166px;right:-70px;top:35%;background-image: url(<?php echo THEME_ROOT . '/assets/img/bottom-art-2.svg'; ?>);background-position: center;background-repeat: no-repeat;z-index: -1;}

@media screen and (max-width: 1200px){
.bottom-articles .left-wrapper::before{left:-14px}
.bottom-articles .side-articles-one::before{right: -14px;}
}

@media screen and (max-width: 1024px){
.bottom-articles .left-wrapper::before{display: none;}
.bottom-articles .side-articles-two{position: relative;}
.bottom-articles .side-articles-two::before{content:'';position:absolute;height: 83px;width:52px;left:-14px;bottom:24%;background-image: url(<?php echo THEME_ROOT . '/assets/img/bottom-art-3.svg'; ?>);background-repeat: no-repeat;background-position: center;z-index: -1;}

.bottom-articles .side-bar .side-articles-one{margin-bottom: 20px;}
.bottom-articles .left-wrapper{margin-bottom: 20px;}
}

@media screen and (max-width: 767px) {
.bottom-articles{padding: 30px 0;}
.bottom-articles .left-wrapper .img-wrap { width: 87px; height: 82px; }
.bottom-articles .left-wrapper .desc, .bottom-articles .left-wrapper .category { display: none; }
.bottom-articles .left-wrapper .info-wrap { width: calc(100% - 100px); padding-right: 40px; }
.bottom-articles .left-wrapper .title { font-size: 16px; line-height: 20px; max-height: 40px; }
.bottom-articles .arrow { height: 30px; width: 30px; right: 0px; }
}

@media screen and (min-width: 1025px){ 
.bottom-articles .left-wrapper .card:hover .title{color:#ea4c10}
.bottom-articles .left-wrapper .card:hover .arrow{background-color: #753200;}
.bottom-articles .left-wrapper .card:hover svg .arrow-color{fill:#fff;}

}
</style>
<div class="bottom-articles">
    <div class="container">
        <div class="main-wrap clearfix">
            <div class="left-wrapper">
                <?php echo element('SectionTitleTwo',['title' => ["editor's","choice"]]); ?>
                <ul class="card-wrapper">
                    <?php
                    $articles = getArticles(['posts_per_page' => 5, 'post__not_in' => $post_exclude]);
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
                        <div class="arrow">
                            <?php echo get_svgs('next-arrow'); ?>
                        </div>
                        <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                    </li>
                    <?php endwhile;
                    wp_reset_query(); ?>
                </ul>
            </div>
            <div class="right-wrapper">
                <div class="side-bar">
                    <div class="side-articles-one side-articles">
                        <?php echo element('SectionTitleTwo',['title' => ["our","spotlight"]]); ?>
                        <ul class="card-wrapper">
                            <?php
                                $articles = getArticles(['posts_per_page' => 4, 'post__not_in' => $post_exclude]);
                                while ($articles->have_posts()) : $articles->the_post();
                                    $post_exclude[] = get_the_ID();
                                ?>
                            <li class="card mb-20 pos-rel">
                                <?php $url = get_the_post_thumbnail_url(get_the_ID(), array(180, 140)); ?>
                                <div class="img-wrap bgi"
                                    style="background-image:url('<?php echo addslashes($url); ?>')"></div>
                                <div class="title tran"><?php the_title(); ?></div>
                                <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                            </li>
                            <?php endwhile;
                                wp_reset_query(); ?>
                        </ul>
                    </div>
                    <div class="side-articles-two side-articles">
                    <?php echo element('SectionTitleTwo',['title' => ["top","reads"]]); ?>
                        <ul class="card-wrapper">
                            <?php
                                $articles = getArticles(['posts_per_page' => 3, 'post__not_in' => $post_exclude]);
                                while ($articles->have_posts()) : $articles->the_post();
                                    $post_exclude[] = get_the_ID();
                                    $num;
                                ?>
                            <li class="card mb-20 pos-rel">
                                <div class="no"><?php echo $num + 1; ?>.</div>
                                <div class="title tran"><?php the_title(); ?></div>
                                <a href="<?php echo the_permalink(); ?>" class="overlay-link"></a>
                            </li>
                            <?php $num++; endwhile; wp_reset_query();?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>