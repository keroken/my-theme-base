<?php
/**
 * Template Name: Resources Page
 *
 */
get_header('supporter'); 
$breadcrumbs_show 			= get_post_meta(get_the_ID(), 'breadcrumbs_show', true);
?>

<div class="supporter-bg">
  <div class="page-hero-container">
    <div class="hero-overlay"></div>
    <div class="page-hero-message">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="content-area">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>

      <section <?php post_class(); ?>>
        <div class="content-wrapper">
          <div class="message-text-supporter page-content-supporter">
            <?php the_content(); ?>
          </div>
        </div>
      </section>

    <?php endwhile; endif; ?>
  </div>
</div>

<?php get_footer(); ?>