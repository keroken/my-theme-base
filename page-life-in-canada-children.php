<?php
/**
 * Template Name: Life in Canada - Children Page
 *
 */
get_header();
$breadcrumbs_show = get_post_meta(get_the_ID(), 'breadcrumbs_show', true);
?>

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
  <div class="content-area">
    <div class="content-wrapper">
      <div class="message-text page-content">
        <div class="life-in-canada-children-container">
        <div class="life-in-canada-children-content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </div>
    <span class="go-back-link"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<?php get_footer(); ?>
