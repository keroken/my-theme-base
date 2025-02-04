<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header></header>

  <nav></nav>

  <main>
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    <?php endwhile; endif; ?>
  </main>

  <footer></footer>

  <?php wp_footer(); ?>
</body>
</html>