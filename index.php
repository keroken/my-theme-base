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
      <article <?php post_class(); ?>>
        <?php if(has_post_thumbnail()): ?>
          <figure><?php the_post_thumbnail(); ?></figure>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
      </article>
    <?php endwhile; endif; ?>
  </main>

  <footer></footer>

  <?php wp_footer(); ?>
</body>
</html>