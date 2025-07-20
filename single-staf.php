<?php get_header(); ?>

<div class="supporter-bg">
  <div class="page-hero-container">
    <div class="hero-overlay"></div>
    <div class="page-hero-message">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <main class="content-area">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
      <article class ="single-article single-text=supporter" <?php post_class(); ?>>
        <div class="single-staff-header">
          <?php if (has_post_thumbnail()): ?>
            <figure class="single-staff-thumbnail"><?php the_post_thumbnail(); ?></figure>
          <?php endif; ?>
          <div class="single-staff-details">
            <h2 class="single-staff-name"><?php the_title(); ?></h2>
            <?php
            // Retrieve custom fields for staff title and location
            $staff_title = get_post_meta(get_the_ID(), 'staff_tittle', true);
            $staff_location = get_post_meta(
              get_the_ID(),
              'staff_location',
              true,
            );
            ?>
            <span class="single-staff-title"><?php echo esc_html(
              $staff_title,
            ); ?></span>
            <span class="single-staff-location"><?php echo esc_html(
              $staff_location,
            ); ?></span>
          </div>
        </div>
        <div class="single-staff-content single-text">
          <?php the_content(); ?>
          <?php $staff_embedded_code = get_post_meta(
            get_the_ID(),
            'staff_form_embedded_code',
            true,
          ); ?>
          <?php if ($staff_embedded_code): ?>
            <div class="embedded-code">
              <?php echo $staff_embedded_code; ?>
            </div>
          <?php endif; ?>
        </div>
      </article>
    <?php
      endwhile;
    endif; ?>
    <div class="back-to-stories">
      <a href="javascript:history.back()" class="post-link">Go Back</a>
    </div>
  </main>
</div>

<?php get_footer(); ?>
