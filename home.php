<?php get_header(); ?>

<div class="front-bg">
  <div class="overlay"></div>
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
  <main class="post-container">
    <div class="page-content">
      <h2>UNITED IN GOD'S GREAT STORIES</h2>
      <div class="message-text about-content">
        <p>Sharing from students, volunteers and staff</p>
      </div>
    </div>
    <div class="post-wrapper">
      <?php if (have_posts()):
        while (have_posts()):
          the_post(); ?>
        <article class ="post-frame" <?php post_class(); ?>>
        <?php if ($wp_query->current_post % 2 == 0): ?>
          <?php if (has_post_thumbnail()): ?>
            <figure class="post-thumbnail">
              <button class="story-circle-button story-button" aria-label="View <?php echo esc_attr(get_the_title()); ?> story">
                <?php the_post_thumbnail(); ?>
              </button>
            </figure>
          <?php endif; ?>
          <div class="post-content">
            <?php the_title('<h4 class="post-title">', '</h4>'); ?>
            <span class="post-text">
              <?php the_excerpt(); ?>
            </span>
            <span class="post-link-container">
              <button class="post-link read-more-button">Read More</button>
            </span>
          </div>
          <dialog class="story-modal">
            <div id="dialogInputArea">
              <div class="dialog-header">
                  <p id="story-title"><?php the_title(); ?></p>
                  <button class="close-button">Close Story</button>
              </div>
              <div class="story-body">
                <p style="width:50%; float:left; margin-right:12px"><?php the_post_thumbnail(); ?></p>
                <p id="story-content"><?php the_content(); ?></p>
              </div>
              <button class="close-button-bottom">Close Story</button>
            </div>
          </dialog>
          <?php else: ?>
          <div class="post-content">
            <?php the_title('<h4 class="post-title">', '</h4>'); ?>
            <span class="post-text">
              <?php the_excerpt(); ?>
            </span>
            <span class="post-link-container">
              <button class="post-link read-more-button">Read More</button>
            </span>
          </div>
          <?php if (has_post_thumbnail()): ?>
            <figure class="post-thumbnail">
              <button class="story-circle-button story-button" aria-label="View <?php echo esc_attr(get_the_title()); ?> story">
                <?php the_post_thumbnail(); ?>
              </button>
            </figure>
          <?php endif; ?>
          <dialog class="story-modal">
            <div id="dialogInputArea">
              <div class="dialog-header">
                  <p id="story-title"><?php the_title(); ?></p>
                  <button class="close-button">Close Story</button>
              </div>
              <div class="story-body">
                <p style="width:50%; float:left; margin-right:12px"><?php the_post_thumbnail(); ?></p>
                <p id="story-content"><?php the_content(); ?></p>
              </div>
              <button class="close-button-bottom">Close Story</button>
            </div>
          </dialog>
          <?php endif; ?>
        </article>
      <?php
        endwhile;
      endif; ?>
    </div>
  </main>
</div>

<?php get_footer(); ?>
