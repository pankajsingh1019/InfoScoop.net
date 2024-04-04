<style>
    .banner-wrap .banner{padding:10%;background-image: url(<?php echo THEME_ROOT . '/assets/img/banner-d.png'; ?>);background-repeat: no-repeat;background-position: center;background-size: cover;margin-bottom: 30px;border-radius: 6px;-webkit-filter: grayscale(100%);
	filter: grayscale(100%);}

    @media screen and (max-width: 1024px){
        .banner-wrap .banner{transform: scale(1.02);	-webkit-filter: grayscale(0);
	filter: grayscale(0);}
    }
    @media screen and (max-width: 599px){
        .banner-wrap .banner{background-image: url(<?php echo THEME_ROOT . '/assets/img/banner-m.png'; ?>);padding:40%}
    }
    @media screen and (min-width: 1025px){ 
        .banner-wrap .banner:hover{transform: scale(1.02);	-webkit-filter: grayscale(0);
	filter: grayscale(0);}
    }
</style>
<div class="banner-wrap">
    <div class="container">
        <a href="/category/auto" class="banner tran"></a>
    </div>
</div>