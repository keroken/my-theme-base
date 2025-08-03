<?php
/**
 * Template Name: All Staff Page
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
    <div class="content-wrapper">
      <div class="page-content-staff">
        <?php
        global $post;
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $args = [
          'paged' => $paged,
          'posts_per_page' => 10,
          'post_status' => 'publish',
          'post_type' => 'staf',
          'orderby' => 'title',
          'order' => 'ASC',
        ];
        $myposts = new WP_Query($args); // Use WP_Query for better pagination support
        if ($myposts->have_posts()):
          while ($myposts->have_posts()):
            $myposts->the_post();
            //--------repeat start----------
            ?>

          <div class="staff-item">
            <div class="staff-image">
              <?php if (has_post_thumbnail()) {
                // Wrap the image with a link to the post's permalink
                echo '<a href="' . get_permalink() . '">';
                the_post_thumbnail('medium'); // Display the featured image with 'medium' size
                echo '</a>';
              } else {
                echo '<p>No Image Available</p>'; // Fallback if no featured image is set
              } ?>
            </div>
            <?php
            // Retrieve custom fields for staff title and location
            $staff_title = get_post_meta(get_the_ID(), 'staff_tittle', true);
            $staff_location = get_post_meta(
              get_the_ID(),
              'staff_location',
              true,
            );
            ?>
            <div class="staff-details">
              <h2 class="staff-name"><?php the_title(); ?></h2>
              <span class="staff-title"><?php echo esc_html(
                $staff_title,
              ); ?></span>
              <span class="staff-location"><?php echo esc_html(
                $staff_location,
              ); ?></span>
            </div>
          </div>

        <?php
          endwhile;
          //------------repeat end----------
          ?>

        <?php // if no posts found
          //-----------end of get_posts----------


        else:
           ?>
          <div class="result">
            <p>No Staff Found</p>
          </div>

        <?php wp_reset_postdata();
        endif;
        ?>
      </div>
      <!-- End of page-content-staff -->
      <div class="pagination">
        <?php echo paginate_links([
          'total' => $myposts->max_num_pages,
          'current' => $paged,
          'prev_text' => __('« Previous'),
          'next_text' => __('Next »'),
        ]); ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
