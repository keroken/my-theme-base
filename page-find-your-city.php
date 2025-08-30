<?php
/**
 * Template Name: Find Your City
 */

get_header(); ?>

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
        <h2>Connect with our Staff in your city</h2>
        <p>Click on a city marker to view more information.</p>
        <div class="find-your-city-container">
          <div class="map-container">
            <div id="canada-map" style="height: 600px; width: 100%;"></div>
          </div>
          <div class="city-info" id="city-info">
            <h3>Select a City</h3>
            <p>Click on a city marker to view more information.</p>
          </div>
        </div>
      </div>
    </div>

    <span class="go-back-link"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<?php get_footer(); ?> 