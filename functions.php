<?php

// Basic setup
function mytheme_setup() {
  // Add title tag support
  add_theme_support('title-tag');

  // Add post thumbnail support
  add_theme_support('post-thumbnails');

  // Add custom menu support
  register_nav_menus(array(
    'primary' => 'Primary Menu',
  ));
}
add_action('after_setup_theme', 'mytheme_setup');