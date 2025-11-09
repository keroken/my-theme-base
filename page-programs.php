<?php
/**
 * Template Name: Programs Page
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
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>

      <section <?php post_class(); ?>>
        <div class="content-wrapper">
          <div class="message-text page-content">
            <h2>MEETING THE NEEDS OF INTERNATIONAL STUDENTS</h2>
            <p>Events and activities vary from city to city and campus to campus, but what doesn't change is that ISMC programs strive to meet the practical, social and spiritual needs of international students in Canada. Here are some of the ISMC programs you might find on your local campus.</p>
            <ul class="programs-list">
              <?php
              $programs = json_decode(
                file_get_contents(
                  get_template_directory() . '/data/programs-data.json',
                ),
                true,
              );
              foreach ($programs['programs'] as $program) {
                echo '<li>';
                echo '<img src="' .
                  get_template_directory_uri() .
                  '/images/' .
                  $program['image'] .
                  '" alt="' .
                  $program['title'] .
                  '">';
                echo '<h3>' . $program['title'] . '</h3>';
                echo '<p>' . $program['description'] . '</p>';
                echo '</li>';
              }
              ?>
            </ul>
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
