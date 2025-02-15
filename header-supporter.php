<?php
/**
 * Header for my theme.
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link
			href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
			rel="stylesheet"
		/>

		<?php wp_head(); ?>

	</head>

	<body>
		<?php wp_body_open(); ?>

		<header id="site-header" class="header-footer-group">
			<div class="header-inner section-inner">
				<div class="header-titles-wrapper">
					<div class="header-titles">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( home_url( '/' ) ); ?>/wp-content/themes/mytheme_base/images/ISMC_primary_logo.png" alt="ISMC logo" class="primary-logo" />
						</a>
					</div><!-- .header-titles -->
				</div><!-- .header-titles-wrapper -->

				<div class="header-navigation-wrapper">
					<?php
					if ( has_nav_menu( 'supporter' ) || ! has_nav_menu( 'expanded' ) ) {
						?>
							<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu' ); ?>">
								<ul class="primary-menu reset-list-style">
								<?php
								if ( has_nav_menu( 'primary' ) ) {
									wp_nav_menu(
										array(
											'container'  => '',
											'items_wrap' => '%3$s',
											'theme_location' => 'supporter',
										)
									);
								} elseif ( ! has_nav_menu( 'expanded' ) ) {
									wp_list_pages(
										array(
											'match_menu_classes' => true,
											'show_sub_menu_icons' => true,
											'title_li' => false,
										)
									);
								}
								?>
								</ul>
							</nav><!-- .primary-menu-wrapper -->
						<?php
					}
					?>
				</div><!-- .header-navigation-wrapper -->
        <div>
          <a href="/" class="supporter-link">Back to Student Page</a>
        </div>
			</div><!-- .header-inner -->
		</header><!-- #site-header -->
		<?php

		// Output the menu modal.
		get_template_part( 'template-parts/modal-menu' );
