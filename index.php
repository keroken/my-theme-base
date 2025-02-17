<?php get_header(); ?>

<div class="front-bg">
  <div class="page-hero-area">
    <div class="page-hero-inner">
      <div class="page-hero-container">
        <div class="hero-overlay"></div>
        <div class="page-hero-message">
          <h1>Stories</h1>
        </div>
      </div>
    </div>
  </div>
  <main class="post-container" id="page-top">
    <div class="page-content">
      <h3>UNITED IN GOD'S GREAT STORIES</h3>
      <div class="message-text about-content">
        <p>Sharing from students, volunteers and staff</p>
      </div>
    </div>
    <div class="post-wrapper">
      <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <article class ="post-frame" <?php post_class(); ?>>
          <?php if(has_post_thumbnail()): ?>
            <figure class="post-thumbnail">
              <a href="<?php the_permalink()?>">
                <?php the_post_thumbnail(); ?>
              </a>
            </figure>
          <?php endif; ?>
          <?php the_title( '<h4 class="post-title">', '</h4>' ); ?>
          <span class="post-text">
            <?php the_excerpt(); ?>
          </span>
          <span class="post-link-container">
            <a href="<?php the_permalink() ?>" class="post-link">Read More</a>
          </span>
        </article>
      <?php endwhile; endif; ?>
    </div>
  </main>
</div>

<?php get_footer(); ?>