<?php
/**
 * Template Name: Volunteer Page
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
      <section <?php post_class(); ?>>
        <div class="content-wrapper">
          <div class="message-text-supporter page-content-supporter">
            <h2>Get Involved</h2>
            <p>We are thankful for volunteers who faithfully support the vision to empower international students to impact the world through Jesus Christ. Together, we can reach the nations with the Gospel!</p>
            <p>We invite you to join our community and use what God has given you to sow in His Kingdom! There are many ways you may get involved and impact an international student’s life.</p>
            <h2>Get connected</h2>
            <div class="front-bg-supporter">
              <div class="find-your-city-container">
                <div class="map-container">
                  <div id="canada-map" style="height: 600px; width: 100%;"></div>
                </div>
                <div class="city-info city-info-volunteer" id="city-info">
                  <h3>Select a City</h3>
                  <p>Click on a city marker to view more information.</p>
                </div>
              </div>
              <p class="message-text-supporter">If your city isn’t listed, <a href="mailto:info@ismc.ca">contact us</a> to find an ISM near you</p>
            </div>
          </div>
        </div>
      </section>
      <span class="go-back-link-supporter"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<?php get_footer(); ?>
