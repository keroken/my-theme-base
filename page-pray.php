<?php
/**
 * Template Name: Pray Page
 *
 */
get_header('supporter');
$breadcrumbs_show = get_post_meta(get_the_ID(), 'breadcrumbs_show', true);
?>

<div class="supporter-bg">
  <div class="page-hero-container">
    <div class="hero-overlay"></div>
    <div class="page-hero-message">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="content-area">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>

      <section <?php post_class(); ?>>
        <div class="content-wrapper">
          <div class="message-text-supporter page-content-supporter prayer-content">
            <h3>Prayer Guide</h3>
            <p>Become a part of our ministry team by praying for God’s work among international students</p>
            <div class="prayer-guide-frame">
              <h4>Join Us In Prayer</h4>
              <p>Develop the habit of praying for international students.</p>
              <a href="https://app.textinchurch.com/connect-cards/cKY7PqTt0w3eVoW9dSWu" target="_blank" rel="noopener noreferrer">
                <img src="<?php echo get_template_directory_uri(); ?>/images/prayer-guide.png" alt="Prayer Guide">
              </a>
              <p><em><strong><a href="https://app.textinchurch.com/connect-cards/cKY7PqTt0w3eVoW9dSWu" target="_blank" rel="noopener noreferrer">Sign up for Uplift: texted requests to pray for international students</a>.</strong></em></p>
              <p>You’ll receive:</p>
              <ol class="prayer-guide-list">
                <li>weekly prayer points for international students via text message;</li>
                <li>ideas on how to get involved in reaching out to international students in your neighborhood.</li>
              </ol>
              <p>Thank you so much for your prayers! We trust God will use them to reach international students with His love and truth.</p>
            </div>
            <h3>Subscribe to DoorWays</h3>
            <p>Our quarterly Doorways newsletter (online or hard copy) is loaded with stories about God's work among international students.</p>
            <p><em><strong><a href="https://ismc.ca/doorways/" target="_blank" rel="noopener noreferrer">Subscribe to DoorWays</a></strong></em></p>
            <h3>33 Days of Prayer</h3>
            <p>Prayer is the foundation of our ministry. We believe that prayer is the key to unlocking the doors of international students' hearts. We invite you to join us in praying for the international students in your city.</p>
          </div>
        </div>
      </section>

    <?php
      endwhile;
    endif; ?>
    <span class="go-back-link"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<?php get_footer(); ?>
