</div>
<footer class="<?php echo THEME_PREFIX ?>-footer pos-rel">
  <div class="container">
    <div class="main-wrap">
      <div class="left-wrap">
        <?php
              if (function_exists('the_custom_logo')) {
                  the_custom_logo();
              }
          ?> 
          <?php if (get_theme_mod('footer_credit')) : ?>
            <p><?php echo get_theme_mod('footer_credit'); ?></p>
          <?php endif; ?>
          <div class="cr-desk cr">&copy; <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?>. All Rights Reserved</div>
      </div>
      <div class="right-wrap clearfix">
            <div class="footer-links">
              <?php wp_nav_menu( array( 'menu' => 'Footer Links' ) ); ?>
            </div>
            <div class="footer-pages">
              <?php wp_nav_menu( array( 'menu' => 'Footer Pages' ) ); ?>
            </div>
            <div class="cr-mob cr">&copy; <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?>. All Rights Reserved</div>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
<?php 
  if(is_home()) { 
    if(function_exists('get_common_file_path')) {
      include(get_common_file_path('LocalApiKeywordAutocompleteAjax'));
      include(get_common_file_path('LocalApiLocationAutocompleteAjax'));
    }   
  } 
?>
<?php 
  if(function_exists('get_common_file_path')) { 
    include(get_common_file_path('footer'));
  } 
?>
</body>

</html>