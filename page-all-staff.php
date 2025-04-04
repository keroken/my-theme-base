<?php
/**
 * Template Name: All Staff Page
 *
 */
get_header('supporter'); 
$breadcrumbs_show 			= get_post_meta(get_the_ID(), 'breadcrumbs_show', true);
?>

<div class="supporter-bg">
  <div class="page-hero-container">
    <div class="hero-overlay"></div>
    <div class="page-hero-message">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <div class="content-area">
  <?php
    global $post;
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
    $args = array( 
      'paged' => $paged, //ページネーションを使いたいなら指定
      'posts_per_page' => 10, //10記事のみ出力
      'post_status' => 'publish', //公開の記事だけ
      'post_type' => 'staf', //カスタム投稿slag
      'orderby' => 'title', //出力する基準
      'order' => 'ASC' //表示する順番（逆はDESC）
    );
    $myposts = new WP_Query( $args ); // Use WP_Query for better pagination support
    if ( $myposts->have_posts() ) : while ( $myposts->have_posts() ) : $myposts->the_post();
    //--------ここから繰り返し---------- 
  ?>

    <div class="staff-item">
      <h2 class="staff-name"><?php the_title(); ?></h2>
      <div class="staff-image">
        <?php 
          if ( has_post_thumbnail() ) {
            // Wrap the image with a link to the post's permalink
            echo '<a href="' . get_permalink() . '">';
            the_post_thumbnail('medium'); // Display the featured image with 'medium' size
            echo '</a>';
          } else {
            echo '<p>No Image Available</p>'; // Fallback if no featured image is set
          }
        ?>
      </div>
    </div>

  <?php endwhile; //------------繰り返しここまで---------- 
  ?>

  <!-- Pagination -->
  <div class="pagination">
    <?php
      echo paginate_links( array(
        'total' => $myposts->max_num_pages,
        'current' => $paged,
        'prev_text' => __('« Previous'),
        'next_text' => __('Next »'),
      ) );
    ?>
  </div>

  <?php else : //記事が無い場合 
  ?>
    <div class="result">
      <p>No Staff Found</p>
    </div>

  <?php //-----------get_posts終了----------
    wp_reset_postdata();
  endif; ?>
  </div>
</div>

<?php get_footer(); ?>