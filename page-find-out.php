<?php
/**
 * Template Name: Find Out Page
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
          <h2>Vision</h2>
          <p>We seek to love international students unconditionally, partner with local churches in leading students to discover Jesus through the Word of God, and prepare them to serve God wherever He leads them.</p>
          <h2>Numbers</h2>
          <div class="stats-row">
            <div class="stats-item">
              <div class="stats-number-supporter">600+</div>
              <div class="stats-label-supporter">Staff and Volunteers</div>
            </div>
            <div class="stats-item">
              <div class="stats-number-supporter">23</div>
              <div class="stats-label-supporter">Cities across Canada</div>
            </div>
            <div class="stats-item">
              <div class="stats-number-supporter">52</div>
              <div class="stats-label-supporter">Campuses in Canada</div>
            </div>
          </div>
          <h2>Student Stories</h2>
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
          <h2>Get Involved</h2>
          <div class="action-list">
            <div class="action-item">
              <h4>Learn</h4>
              <p>Learn how you can support international students</p>
              <a href="<?php echo home_url(); ?>/learn">Learn More</a>
            </div>
            <div class="action-item">
              <h4>Give</h4>
              <p>Donate and support international students</p>
              <a href="<?php echo home_url(); ?>/give">Donate Now</a>
            </div>
            <div class="action-item">
              <h4>Pray</h4>
              <p>Become a prayer partner today</p>
              <a href="<?php echo home_url(); ?>/pray">Prayer Guide</a>
            </div>
            <div class="action-item">
              <h4>Volunteer</h4>
              <p>Get involved in our network of hosts</p>
              <a href="<?php echo home_url(); ?>/volunteer">Volunteer</a>
            </div>
          </div>
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
