<?php
/**
 * Template Name: Front Page
 *
 */
get_header(); 
$breadcrumbs_show 			= get_post_meta(get_the_ID(), 'breadcrumbs_show', true);
?>

<div class="front-bg">
  <div class="overlay"></div>
  <div class="sp40th-container">
    <div class="inner">
      <div class="hero-area move-target">
        <div class="hero-message-container">
          <div class="hero-message">
            <h1>International Student Ministries Canada</h1>
            <h2>Empowering international students to impact the world through Jesus Christ.</h2>
          </div>
        </div>
      </div>
      <div class="hero-overlay"></div>
    </div>
  </div>

  <div class="content-area">
    <section class="section section-stats opacity0 fade">
      <div class="section-title">
        <h4>Empowering international students to impact the world
  through Jesus Christ</h4>
      </div>
      <div class="stats-row fade">
        <div class="stats-item">
          <div class="stats-number">40</div>
          <div class="stats-label">Years</div>
        </div>
        <div class="stats-item">
          <div class="stats-number">17</div>
          <div class="stats-label">Cities in Canada</div>
        </div>
        <div class="stats-item">
          <div class="stats-number">40</div>
          <div class="stats-label">Campuses in Canada</div>
        </div>
        <div class="stats-item">
          <div class="stats-number">20k</div>
          <div class="stats-label">Students Reached</div>
        </div>
      </div>
    </section>
    <section class="section section-stories opacity0 fade">
      <div class="section-title">
        <h4>A local community with global impact</h4>
      </div>
      <div class="story-preface">
        <p class="message-text">What God started 40 years ago has touched so many lives. Over those
decades, ISMC has impacted the eternity of countless students, who
have gone on to impact their circles of influence in Canada and around
the world.</p>
        <p class="message-text">This is not a new strategy.</p>
        <p class="message-text">Remember Pentecost? People from all over heard
about Jesus in Jerusalem and took the gospel home with them.</p>
        <p class="message-text">This back and
forth has been part of God's strategy since the early church and continues today with 
diaspora communities like international students.</p>
      </div>
      <div class="story-container">
        <div class="story-canvas">
          <div class="circle circle-01 fingerprint fade"></div>
          <div class="circle circle-03 fingerprint fade"></div>
          <div class="circle circle-04 fingerprint fade"></div>
          <div class="circle circle-09 fingerprint fade"></div>
          <div class="circle circle-11 fingerprint fade"></div>
          <div class="circle circle-10 logo-circle fade"></div>
          <div class="story-circle circle-02">
            <button class="story-circle-button" id="story-button-01">
              <div class="story-overlay"></div>
              <div class="story-label">Hatsumi</div>
            </button>
          </div>
          <div class="story-circle circle-05">
            <button class="story-circle-button" id="story-button-02">
              <div class="story-overlay"></div>
              <div class="story-label">Vinu</div>
            </button>
          </div>
          <div class="story-circle circle-06">
            <button class="story-circle-button" id="story-button-03">
              <div class="story-overlay"></div>
              <div class="story-label">Yan</div>
            </button>
          </div>
          <div class="story-circle circle-07">
            <button class="story-circle-button" id="story-button-04">
              <div class="story-overlay"></div>
              <div class="story-label">Mindy</div>
            </button>
          </div>
          <div class="story-circle circle-08">
            <button class="story-circle-button" id="story-button-05">
              <div class="story-overlay"></div>
              <div class="story-label">Kenji</div>
            </button>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<dialog class="story-modal">
  <div id="dialogInputArea">
    <div class="dialog-header">
        <p id="story-title">Story</p>
        <button class="close-button">Close Story</button>
    </div>
    <div class="story-body">
      <p style="width:50%; float:left; margin-right:12px"><img id="story-image" src="/" /></p>
      <p id="story-content"></p>
    </div>
    <button class="close-button-bottom">Close Story</button>
  </div>
</dialog>

<?php get_footer(); ?>