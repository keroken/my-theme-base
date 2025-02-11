<?php get_header(); ?>

<div class="front-bg">
  <div class="page-hero-container">
    <div class="hero-overlay"></div>
    <div class="page-hero-message">
      <h1><?php the_title() ?></h1>
    </div>
  </div>
  <main class="single-container" id="content-area">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <article class ="single-article" <?php post_class(); ?>>
        <?php if(has_post_thumbnail()): ?>
          <figure class="single-thumbnail"><?php the_post_thumbnail(); ?></figure>
        <?php endif; ?>
        <span class="single-text">
          <?php the_content(); ?>
        </span>
      </article>
    <?php endwhile; endif; ?>
  </main>
</div>

<?php get_footer(); ?>