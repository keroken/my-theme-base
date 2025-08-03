<?php
/**
 * Header for my theme.
 */
?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo('charset'); ?>">
		<?php mytheme_seo_meta_tags(); ?>
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
						<a href="<?php echo esc_url(home_url('/')); ?>">
							<img src="<?php echo esc_url(
								home_url('/'),
							); ?>wp-content/themes/my-theme-base/images/ISMC_primary_logo.png" alt="ISMC logo" class="primary-logo" />
						</a>
					</div><!-- .header-titles -->
				</div><!-- .header-titles-wrapper -->

				<div class="header-navigation-wrapper">
					<?php if (has_nav_menu('supporter') || !has_nav_menu('expanded')) { ?>
							<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x(
								'Horizontal',
								'menu',
							); ?>">
                <button id="hamburger-button" aria-label="Open navigation menu"><svg class="hamburger-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg></button>
                <button id="close-menu-button" aria-label="Close navigation menu"><svg class="hamburger-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg></button>
								<ul id="primary-menu" class="primary-menu reset-list-style">
								<?php if (has_nav_menu('primary')) {
          wp_nav_menu([
            'container' => '',
            'items_wrap' => '%3$s',
            'theme_location' => 'supporter',
          ]);
        } ?>
								</ul>
							</nav><!-- .primary-menu-wrapper -->
						<?php } ?>
				</div><!-- .header-navigation-wrapper -->
        <div>
          <a href="<?php echo esc_url(
            home_url('/'),
          ); ?>" class="left-link">Student Pages</a>
        </div>
			</div><!-- .header-inner -->
		</header><!-- #site-header -->
		<?php // Output the menu modal.

get_template_part('template-parts/modal-menu');
