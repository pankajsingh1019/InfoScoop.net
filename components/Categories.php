<?php
    $category = [   
        ['img-class' =>  'health',
        'title' => 'health',
        'clink' =>'category/health'],
        ['img-class' =>  'travel',
        'title' => 'travel',
        'clink' =>'category/travel'],
        ['img-class' =>  'lifestyle',
        'title' => 'lifestyle',
        'clink' =>'category/services'],
        ['img-class' =>  'finance',
        'title' => 'finance',
        'clink' =>'category/finance'],
        ['img-class' =>  'automotive',
        'title' => 'automotive',
        'clink' =>'category/auto']
] ?>

<style>
.categories{position: relative;padding-top: 60px;margin-bottom: 60px;overflow: hidden;}
.categories::after{content:'';position:absolute;width:100%;height:176px;top:0;left:0;background-color: #f1eee7;z-index: -1;}
.categories::before{content:'';position:absolute;width:82px;height:226px;top:-85px;right:65px;background-image: url(<?php echo THEME_ROOT . '/assets/img/bottom-art-2.svg'; ?>);background-position: center;background-repeat: no-repeat;transform: rotate(90deg);}
.categories .img-wrap{width:134px;height:134px;background-repeat: no-repeat;background-position: center;background-size: contain;margin: 0 auto;}
.categories .title{font-size: 20px;font-weight: 400;color:#753200;letter-spacing: 0px;text-transform: capitalize;}
.categories .health .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/health-cat.png'; ?>);}
.categories .travel .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/travel-cat.png'; ?>);}
.categories .lifestyle .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/lifestyle-cat.png'; ?>);}
.categories .finance .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/finance-cat.png'; ?>);}
.categories .automotive .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/automotive-cat.png'; ?>);}


.categories .slick-dots{bottom:-30px;}
.categories .slick-dots li{height: auto;width: auto;}
.categories .slick-dots button::before{display: none;}
.categories .slick-dots button{height:12px;width:12px;border-radius: 50%;background-color: #f0ede6;}
.categories .slick-dots li.slick-active button{height:9px;width:18px;background-color: #fbb195;border-radius: 10px;}

@media screen and (min-width: 1025px){ 
.categories .health .inner-wrap:hover .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/health-hover.png'; ?>);}
.categories .automotive .inner-wrap:hover .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/automotive-hover.png'; ?>);}
.categories .finance .inner-wrap:hover .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/finance-hover.png'; ?>);}
.categories .travel .inner-wrap:hover .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/travel-hover.png'; ?>);}
.categories .lifestyle .inner-wrap:hover .img-wrap{background-image: url(<?php echo THEME_ROOT . '/assets/img/lifestyle-hover.png'; ?>);}
.categories .inner-wrap:hover .title{font-weight: 700;}
}

@media screen and (max-width: 1024px){
.categories{margin-bottom: 30px;}
}

@media screen and (max-width: 767px){
.categories .img-wrap{height: 100px;width: 100px;}
.categories::after{height:145px}
.categories::before{top:-105px}
}
</style>

<div class="categories">
    <div class="container">
        <div class="main-wrp">
            <ul class="categories-slider">
                <?php foreach ($category as $cats) : ?>
                <li class="lists <?php echo $cats['img-class']?> text-center">
                    <div class="inner-wrap disp-in">                    
                        <a href="<?php echo site_url()?>/<?php echo $cats['clink'] ?>" class="img-wrap tran"></a>
                        <a href="<?php echo site_url()?>/<?php echo $cats['clink'] ?>" class="title tran disp-in"><?php echo $cats['title'] ?></a>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>