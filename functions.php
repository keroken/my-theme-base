<?php

// Basic setup
function mytheme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_setup');