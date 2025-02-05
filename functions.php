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

// widget area
function mytheme_widgets() {
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar-1',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
  ));
}
add_action('widgets_init', 'mytheme_widgets');

// Styles and scripts
function mytheme_enqueue() {

  // Styles
  wp_enqueue_style('mytheme-style', get_stylesheet_uri(), array(), date('U'));
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue');
