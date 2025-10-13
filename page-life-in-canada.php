<?php
/**
 * Template Name: Life in Canada Page
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
    <section <?php post_class(); ?>>
      <div class="content-wrapper">
        <div class="message-text page-content">
          <ul class="life-in-canada-container">
            <li class="life-in-canada-section">
              <h2>Getting Started in Canada</h2>
              <p>We often have students reaching out with questions about life in Canada, so we have put together some resources to help you get started in your journey as an international student.</p>
              <a href="<?php echo home_url(); ?>/life-in-canada/getting-started-in-canada">Get Resources</a>
            </li>
            <li class="life-in-canada-section">
              <h2>Finances in Canada</h2>
              <p>The cost of living in Canada is higher than ever, so we have put together some resources to help you manage your finances while studying in your city.</p>
              <a href="<?php echo home_url(); ?>/life-in-canada/finances-in-canada">Get Resources</a>
            </li>
            <li class="life-in-canada-section">
              <h2>Getting a Job in Canada</h2>
              <p>Whether you are looking for a part time job while you study or a full time job with your Post-Grad Work Permit, here are some helpful resources as you apply for jobs.</p>
              <a href="<?php echo home_url(); ?>/life-in-canada/getting-a-job-in-canada">Get Resources</a>
            </li>
            <li class="life-in-canada-section">

              <h2>Buying a Car in Canada</h2>
              <p>When you graduate, your post-grad job might require you to commute or you might simply be sick of taking the bus and want to drive yourself.  Here is some information on buying a car in Canada.</p>
              <a href="<?php echo home_url(); ?>/life-in-canada/buying-a-car-in-canada">Get Resources</a>
            </li>
            <li class="life-in-canada-section">
              <h2>About Canadian Law</h2>
              <p>The laws in Canada might be very different from your home country.  Here are a few important things every international student should know about Canadian law.</p>
              <a href="<?php echo home_url(); ?>/life-in-canada/about-canadian-law">Get Resources</a>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <span class="go-back-link"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<?php get_footer(); ?> 