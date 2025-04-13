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
  <main class="single-container">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
      <article class ="single-article" <?php post_class(); ?>>
        <?php if(has_post_thumbnail()): ?>
          <figure class="single-thumbnail"><?php the_post_thumbnail(); ?></figure>
        <?php endif; ?>
        <span class="single-text">
          <?php the_content(); ?>
          <?php 
            $staff_embedded_code = get_post_meta(get_the_ID(), 'staff_form_embedded_code', true);
          ?>
          <?php if ($staff_embedded_code): ?>
            <div class="embedded-code">
              <?php echo $staff_embedded_code; ?>
            </div>
          <?php endif; ?>
          <p>This is page staff</p>
        </span>
      </article>
    <?php endwhile; endif; ?>
    <div class="back-to-stories">
      <a href="javascript:history.back()" class="post-link">Go Back</a>
    </div>
  </main>
</div>

<?php get_footer(); ?>