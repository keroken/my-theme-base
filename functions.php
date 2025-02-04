<?php

// Basic setup
function mytheme_a_setup() {
  add_theme_support('title-tag');
}
add_action('after_setup_theme', 'mytheme_a_setup');