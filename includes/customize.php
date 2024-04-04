<?php

// Below function has used for show the Header logo 

function theme_prefix_setup() {
  
add_theme_support( 'custom-logo', array(
  'height'      => 37,
  'width'       => 88,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
) );

}
add_action( 'after_setup_theme', 'theme_prefix_setup' );

/**
* Create Logo Setting and Upload Control
*/
function customize_footer_register($wp_customize) {

  $wp_customize->add_section('footer_section', array(
  'title' => 'Footer',
  'description' => 'Add footer Logo & Credits',
  'priority' => 120,
  ));

  // add a setting for the site logo
  $wp_customize->add_setting('footer_logo');
  // Add a control to upload the logo
  $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo',
  array(
    'label' => 'Footer Logo',
    'section' => 'footer_section',
    'settings' => 'footer_logo',
  ) ) );

  $wp_customize->add_setting('footer_credit');
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_credit',
  array(
    'label' => 'Footer Credit',
    'section' => 'footer_section',
    'settings' => 'footer_credit',
  ) ) );
}
add_action('customize_register', 'customize_footer_register');