<?php
/**
 * Template Name: Learn Page
 *
 */
get_header('supporter');
$breadcrumbs_show = get_post_meta(get_the_ID(), 'breadcrumbs_show', true);
?>

<div class="supporter-bg">
  <div class="overlay"></div>
  <div class="page-hero-container">
    <div class="hero-overlay"></div>
    <div class="page-hero-message">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="content-area">
      <section <?php post_class(); ?>>
        <div class="content-wrapper">
          <div class="message-text-supporter page-content-supporter">
            <h3>Learn, connect, and access resources to reach internationals in your area!</h3>
            <p>We empower individuals and churches to engage and minister to international students in their neighborhood through professional development, networking, and resourcing.</p>

            <h3>Latest Stories</h3>
            <div class="post-wrapper">
              <?php
              // Create custom query for blog posts
              $args = [
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => 6, // Display 6 latest posts
                'orderby' => 'date',
                'order' => 'DESC',
              ];
              $posts_query = new WP_Query($args);

              if ($posts_query->have_posts()):
                while ($posts_query->have_posts()):
                  $posts_query->the_post(); ?>
                <article class ="post-frame" <?php post_class(); ?>>
                <?php if ($posts_query->current_post % 2 == 0): ?>
                  <?php if (has_post_thumbnail()): ?>
                    <figure class="post-thumbnail">
                      <button class="story-circle-button story-button">
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
                    <div id="dialogInputArea-<?php echo get_the_ID(); ?>">
                      <div class="dialog-header">
                          <p id="story-title-<?php echo get_the_ID(); ?>"><?php the_title(); ?></p>
                          <button class="close-button">Close Story</button>
                      </div>
                      <div class="story-body">
                        <p style="width:50%; float:left; margin-right:12px"><?php the_post_thumbnail(); ?></p>
                        <p id="story-content-<?php echo get_the_ID(); ?>"><?php the_content(); ?></p>
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
                      <button class="story-circle-button story-button">
                        <?php the_post_thumbnail(); ?>
                      </button>
                    </figure>
                  <?php endif; ?>
                  <dialog class="story-modal">
                    <div id="dialogInputArea-<?php echo get_the_ID(); ?>">
                      <div class="dialog-header">
                          <p id="story-title-<?php echo get_the_ID(); ?>"><?php the_title(); ?></p>
                          <button class="close-button">Close Story</button>
                      </div>
                      <div class="story-body">
                        <p style="width:50%; float:left; margin-right:12px"><?php the_post_thumbnail(); ?></p>
                        <p id="story-content-<?php echo get_the_ID(); ?>"><?php the_content(); ?></p>
                      </div>
                      <button class="close-button-bottom">Close Story</button>
                    </div>
                  </dialog>
                  <?php endif; ?>
                </article>
              <?php
                endwhile;
                wp_reset_postdata(); // Reset global post data
              endif;
              ?>
            </div>

            <ul class="get-involved-list">
              <li class="get-involved-item">
                <h4>Learn online</h4>
                <p>Access video courses to help you share the love of Jesus with international students.</p>
                <div><a href="https://everyinternational.com/" target="_blank" rel="noopener">Register</a></div>
              </li>
              <li class="get-involved-item">
                <h4>Access resources</h4>
                <p>Explore ready-made materials to reach out to international students in your neighborhood.</p>
                <div><a href="mailto:syncia.chan@ismc.ca">Contact us</a></div>
              </li>
            </ul>
          </div>
        </div>
      </section>
      <span class="go-back-link-supporter"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<dialog class="story-modal">
  <div id="dialogInputArea">
    <div class="dialog-header">
        <p id="story-title">Story</p>
        <button class="close-button">Close Story</button>
    </div>
    <div class="story-body">
      <div class="story-image-container">
        <img id="story-image" src="" alt="Story image" />
      </div>
      <div id="story-content"></div>
    </div>
    <button class="close-button-bottom">Close Story</button>
  </div>
</dialog>

<?php get_footer(); ?>
