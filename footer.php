<?php
/**
 * Footer for my theme.
 */

?>
			<footer id="site-footer" class="header-footer-group">
				<div class="footer-inner">

					<div class="footer-column">
						<h4>About ISMC</h4>
						<p class="footer-text">International Student Ministries Canada—ISMC—is a ministry in Canada focused on ministering to international students, empowering them to become fully devoted followers of Jesus and to reach out and minister to those God has placed in their lives, whether in Canada or in their home country.</p>
					</div>
					<div class="footer-column">
						<h4>Contact Us</h4>
            <div class="contact-container">
              <div class="contact-line">
                <svg class="contact-icon" viewBox="0 0 11 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0_287_37)">
                    <path d="M5.89805 13.65C7.30078 11.8945 10.5 7.63984 10.5 5.25C10.5 2.35156 8.14844 0 5.25 0C2.35156 0 0 2.35156 0 5.25C0 7.63984 3.19922 11.8945 4.60195 13.65C4.93828 14.0684 5.56172 14.0684 5.89805 13.65ZM5.25 3.5C5.71413 3.5 6.15925 3.68437 6.48744 4.01256C6.81563 4.34075 7 4.78587 7 5.25C7 5.71413 6.81563 6.15925 6.48744 6.48744C6.15925 6.81563 5.71413 7 5.25 7C4.78587 7 4.34075 6.81563 4.01256 6.48744C3.68437 6.15925 3.5 5.71413 3.5 5.25C3.5 4.78587 3.68437 4.34075 4.01256 4.01256C4.34075 3.68437 4.78587 3.5 5.25 3.5Z" />
                  </g>
                  <defs>
                    <clipPath id="clip0_287_37">
                    <rect width="10.5" height="14" />
                    </clipPath>
                  </defs>
                </svg>
                <span>Box 1205, Three Hills AB, T0M 2A0</span>
              </div>
              <div class="contact-line">
                <svg class="contact-icon" viewBox="0 0 14 14" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M4.50898 0.673273C4.29844 0.164679 3.74336 -0.106024 3.21289 0.0388978L0.806641 0.695148C0.330859 0.826398 0 1.25843 0 1.75062C0 8.51546 5.48516 14.0006 12.25 14.0006C12.7422 14.0006 13.1742 13.6698 13.3055 13.194L13.9617 10.7877C14.1066 10.2573 13.8359 9.70218 13.3273 9.49163L10.7023 8.39788C10.2566 8.21194 9.73984 8.34046 9.43633 8.71507L8.33164 10.0631C6.40664 9.15257 4.84805 7.59398 3.9375 5.66898L5.28555 4.56702C5.66016 4.26077 5.78867 3.74671 5.60273 3.30101L4.50898 0.676007V0.673273Z" />
                </svg>
                <span>403 443-5676</span>
              </div>
              <div class="contact-line">
                <svg class="contact-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48L48 64zM0 176L0 384c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-208L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                <span>info@ismc.ca</span>
              </div>
            </div>
					</div>
					<div class="footer-column">
						<h4>Staff</h4>
						<a href="https://sites.google.com/ismc.ca/staffroom/home" target="_blank">Login</a>
					</div>
				</div><!-- .footer-inner -->

					<div class="footer-credits">
						<p class="footer-copyright">&copy;
							<?php
							/* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
							$date_format = _x( 'Y', 'copyright date format' );
							if ( function_exists( 'wp_date' ) ) {
								echo wp_date( $date_format );
							} else {
								echo date_i18n( $date_format );
							}
							?>
							<?php bloginfo( 'name' ); ?>
						</p><!-- .footer-copyright -->
						<?php
						if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( '<p class="privacy-policy">', '</p>' );
						}
						?>
					</div><!-- .footer-credits -->

          <?php get_template_part( 'content', 'cta-button' ); ?>

			</footer><!-- #site-footer -->
		<?php wp_footer(); ?>
	</body>
</html>
