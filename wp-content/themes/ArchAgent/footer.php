			<footer id="footer" class="full" role="contentinfo">

				<?php // Newsletter Signup CTA & Form ?>
				<div id="newsletter-signup" class="full">
					<div class="semi tiny-twelvecol">
						<div id="newsletter-cta" class="tiny-twelvecol small-twelvecol medium-sixcol large-sixcol first">
							<h3><?php the_field('newsletter_cta_header', 'option'); ?></h3>
							<h6><?php the_field('newsletter_cta_sub_header', 'option'); ?></h6>
						</div>
						<div id="newsletter-form" class="tiny-twelvecol small-twelvecol medium-sixcol large-sixcol last">
							<!--This Is Where The Mailchimp Form Goes-->
						</div>
					</div>
				</div>

				<?php // Footer ?>
				<div id="inner-footer" class="semi tiny-twelvecol">

					<?php // Footer Logo ?>
					<div id="footer-logo-container" class="tiny-twelvecol small-fourcol medium-threecol large-threecol first">
						<a href="<?php echo home_url(); ?>" rel="nofollow"><img src="<?php the_field('site_logo', 'option'); ?>" class="logo" alt="ArchAgent Logo"></a>
					</div>

					<?php // Contact Info & Email ?>
					<div id="footer-contact-us" class="tiny-twelvecol small-sixcol small-first medium-threecol large-threecol">
						<h4>Contact Us</h4>
						<div class="footer-address"><a href="" target="_blank"><p><?php the_field('address', 'option'); ?><br /><?php the_field('city', 'option'); ?>,<?php the_field('State', 'option'); ?> <?php the_field('zip', 'option'); ?></p></a></div>
						<div class="footer-phone"><a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></div>
						<div class="footer-email"><a href="mailto:<?php the_field('email_address', 'option'); ?>"><p><?php the_field('email_address', 'option'); ?></p></a></div>
					</div>

					<?php // Footer Lnks (Located in Appearacnce > Menus > Footer Links) ?>
					<nav id="footer-quick-links" class="tiny-twelvecol small-sixcol medium-threecol large-threecol">
						<h4>Quick Links</h4>
						<?php bones_footer_links(); ?>
					</nav>

					<?php // Social Media Links & CTA Button ?>
					<div id="footer-social" class="tiny-twelvecol small-sevencol small-first medium-threecol large-threecol">
						<h4>Follow Us</h4>
						<?php if( have_rows('footer_social_media', 'option') ): ?>
							<ul>
					    <?php while( have_rows('footer_social_media', 'option') ): the_row(); ?>
					        <a href="<?php the_sub_field('link_to_social_media_account'); ?>" target="_blank"><li class="tb-<?php the_sub_field('social_media_platform'); ?>"><i class="fa fa-<?php the_sub_field('social_media_platform'); ?>"></i></li></a>
					    <?php endwhile; ?>
					    	</ul>
						<?php endif; ?>
						<a href="#"><div class="yellow button mfifteen full">Get started today</div></a>
					</div>
				</div>

				<?php // Copyright & Business Links (Terms & Conditions etc.) ?>
				<div id="footer-toolbar" class="full">
					<div class="inner-footer-toolbar semi">
						<p class="source-org copyright tiny-twelvecol small-twelvecol medium-fourcol large-fourcol first">Copyright <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> | <a href="http://www.getaha.com" target="_blank">Site By Aha!</a></p>
						<div id="footer-toolbar-links" class="tiny-twelvecol small-twelvecol medium-eightcol large-eightcol"><?php bones_footer_toolbar_links(); ?></div>
					</div>
				</div>

			</footer>

		</div>
		<?php // End of #content ?>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html>
