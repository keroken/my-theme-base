<?php
/**
 * Template Name: Learn Page
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
            <h3>Learn, connect, and access resources to reach internationals in your area!</h3>
            <p>We empower individuals and churches to engage and minister to international students in their neighborhood through professional development, networking, and resourcing.</p>

            <h3>Latest Stories</h3>
            <div class="student-story-row">
              <div class="student-story-item student-story-image-05">
                <button class="story-circle-button" id="story-button-05">
                  <div class="student-story-overlay"></div>
                  <div class="story-label">Kenji</div>
                </button>
              </div>
              <div class="student-story-item student-story-image-02">
                <button class="story-circle-button" id="story-button-02">
                  <div class="student-story-overlay"></div>
                  <div class="story-label">Vinu</div>
                </button>
              </div>
              <div class="student-story-item student-story-image-04">
                <button class="story-circle-button" id="story-button-04">
                  <div class="student-story-overlay"></div>
                  <div class="story-label">Mindy</div>
                </button>
              </div>
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
