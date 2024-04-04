var $ = jQuery.noConflict();

$(document).ready(function () {

    // header interaction js
    $(document).on('click','.head-menu .label', function(){
      $('.menu-header-menu-container').toggle();
      $(this).toggleClass('active');
    });

    $(document).on('click','.icons', function(){
      $(this).toggleClass('active');
      $('.is-header .right-wrap').toggle();
      $('.menu-header-menu-container').toggle();
      $('#prodSearch').focus();
    });


    //=====================================================

    //   header form js
    $('#searchForm').submit(function(e){
      var keyword = $('#prodSearch').val();
      if (keyword.trim() == '') {
          return false;
      }
  })

  $('#prodSearch').focus();

    //=======================================================

    $(".categories-slider").slick({
      dots: true,
      arrows: false,
      infinite: true,
      speed: 300,
      autoplay: false,
      slidesToShow: 5,
      slidesToScroll: 2,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 450,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        }
      ],
    });

    if(window.innerWidth>1024){
      $(".recent-slider").slick({
        dots: true,
        arrows: false,
        infinite: true,
        speed: 300,
        autoplay: false,
        slidesToShow: 3,
        slidesToScroll: 2,
      });
    }

    $(".hero-slider").slick({
      dots: false,
      arrows: true,
      infinite: true,
      speed: 300,
      autoplay: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $(".hero-section .prev"),
      nextArrow: $(".hero-section .next"),
      responsive: [
        {
          breakpoint: 1250,
          settings: {
            dots:true,
            arrows:false
          },
        }
      ],
    });
});
