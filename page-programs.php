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
            <h3>NEEDS ARE INFINITE POSSIBILITIES ARE ENDLESS</h3>
            <p>Our simple and strategic approach will potentially bring thousands of students returning home having been influenced by Christian love, service, and friendship. If they don’t become followers of Christ, they will have the seed of the gospel planted in their hearts. We trust the Holy Spirit will continue working toward their salvation and life transformation.</p>
            <ul class="programs-list">
              <?php
              $programs = json_decode(
                file_get_contents(
                  get_template_directory() . '/programs-data.json',
                ),
                true,
              );
              foreach ($programs['programs'] as $program) {
                echo '<li>';
                // echo '<img src="' .
                //   get_template_directory_uri() .
                //   '/images/' .
                //   $program['image'] .
                //   '" alt="' .
                //   $program['title'] .
                //   '">';
                echo '<h4>' . $program['title'] . '</h4>';
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
