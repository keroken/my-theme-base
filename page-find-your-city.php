<?php
/**
 * Template Name: Find Your City
 */

get_header(); ?>

<div class="front-bg">
  <div class="content-area">
    <div class="find-your-city-container">
      <div class="map-container">
        <div id="canada-map" style="height: 600px; width: 100%;"></div>
      </div>
      <div class="city-info" id="city-info">
        <h1>Select a City</h1>
        <p>Click on a city marker to view more information.</p>
      </div>
    </div>
    <span class="go-back-link"><a href="javascript:history.back()">Go Back</a></span>
  </div>
</div>

<?php get_footer(); ?> 