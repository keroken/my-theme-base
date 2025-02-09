<?php get_header(); ?>

<div class="front-bg">
  <div class="page-hero-container">
    <div class="page-hero-message">
      <h1>Stories</h1>
    </div>
  </div>
  <main class="post-container">
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
            <figure class="post-thumbnail"><?php the_post_thumbnail(); ?></figure>
          <?php endif; ?>
          <h3 class="post-title"><?php the_title(); ?></h3>
          <span class="message-text">
            <?php the_excerpt(); ?>
          </span>
        </article>
      <?php endwhile; endif; ?>
    </div>
  </main>
</div>

<?php get_footer(); ?>