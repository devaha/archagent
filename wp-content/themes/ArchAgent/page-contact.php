<?php
/*
Template Name: Contact Us Tempalte
*/
?>

<?php get_header(); ?>

			<main id="content" class="full">

				<?php // Hero Image & Main CTA ?>
				<section id="contact-hero" style="background-image: url('<?php the_field('contact_us_hero'); ?>');" class="full">
				</section>

				<?php // Products & Links To Individual Pages ?>
				<section id="contact" class="full">
					<section id="contact-container" class="semi">
							<div class="tiny-twelvecol small-twelvecol medium-fourcol large-fourcol first">
								<?php the_field('contact_left'); ?>
							</div>
							<div class="tiny-twelvecol small-twelvecol medium-eightcol large-eightcol last">
								<?php the_field('contact_right'); ?>
							</div>
					</section>
				</section>

			</main>

<?php get_footer(); ?>
