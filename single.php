<?php get_header(); ?>

<div class="front-bg">
  <div class="page-hero-area">
    <div class="page-hero-inner">
      <div class="page-hero-container">
        <div class="hero-overlay"></div>
        <div class="page-hero-message">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
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
    <div class="back-to-stories">
      <a href="<?php echo get_post_type_archive_link('post'); ?>" class="post-link">Back to stories</a>
    </div>
  </main>
</div>

<?php get_footer(); ?>