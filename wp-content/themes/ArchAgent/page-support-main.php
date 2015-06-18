<?php
/*
Template Name: Support Main Tempalte
*/
?>

<?php get_header(); ?>

			<main id="content" class="full">

				<?php // Hero Image & Main CTA ?>
				<section id="support-hero" style="background-image: url('<?php the_field('hero_image'); ?>');" class="full">
					<section id="support-hero-cta" class="semi">
						<div id="support-hero-main" class="tiny-twelvecol small-twelvecol medium-eightcol large-eightcol first">
							<h1><?php the_field('hero_main_header'); ?></h1>
							<?php the_field('hero_main_text'); ?>
						</div>
						<div id="support-hero-contact" class="tiny-twelvecol small-twelvecol medium-fourcol large-fourcol last">
							<h2><?php the_field('hero_contact_header'); ?></h2>
							<?php the_field('hero_contact_text'); ?>
						</div>
					</section>
				</section>

				<?php // Products & Links To Individual Pages ?>
				<section id="support-breakdown" class="full">
					<section id="support-group" class="semi">
							<h2><?php the_field('support_group_header'); ?></h2>
							<?php 

							// check for rows (sub repeater)
							if( have_rows('support_group') ): ?>
								<ul>
								<?php 

								// loop through rows (sub repeater)
								while( have_rows('support_group') ): the_row();

								// vars (sub repeater)
								$icon = get_sub_field('icon');
								$name = get_sub_field('product_name');
								$faq = get_sub_field('faq_link');
								$quickstart = get_sub_field('quickstart_link');
								?>
									
									<li class="tiny-twelvecol small-twelvecol medium-fourcol large-fourcol first">
										<div class="support-icon medium-fourcol large-fourcol first">
											<?php if( $icon ): ?>
												<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" />
											<?php endif; ?>
										</div>

										<div class="support-cta medium-eightcol large-eightcol last">
										    <h4><?php echo $name; ?></h4>
										    <?php echo $description; ?>
										    <a href="<?php echo $faq; ?>">FAQs<span class="link-arrow">&#62;</span></a>
										    <a href="<?php echo $quickstart; ?>">Quickstart Guide<span class="link-arrow">&#62;</span></a>
									    </div>
									</li>

								<?php endwhile; ?>	
								</ul>
							<?php endif; //if( get_sub_field('items') ): ?>
					</section>
				</section>

				<?php // Products & Links To Individual Pages ?>
				<section id="support-form" class="full">
					<section id="support-form-container" class="semi">
						<div class="semi">
							<h2><?php the_field('support_form_header'); ?></h2>
							<form class="arch-form">
								<div class="arch-form-section">
									<input class="field-input" required type="text" placeholder="First/Last Name" id="form-name">
								</div>
								<div class="arch-form-section">
									<input class="field-input" required type="text" placeholder="Email Address" id="form-email">
								</div>
								<div class="arch-form-section">
									<ul class="radio-select">
									<div class="radio-header">Select product in question:</div>
										<li class="list__item">
										  <label class="label--radio">
										  	<input type="radio" class="radio" name="product">
										      <span>PowerDialer</span>
										  </label>
										</li>
										<li class="list__item">
										  <label class="label--radio">
										  	<input type="radio" class="radio" name="product">
										      <span>800 Powerline</span>
										  </label>
										</li>
										<li class="list__item">
										  <label class="label--radio">
										  	<input type="radio" class="radio" name="product">
										      <span>FSBO Lead Services</span>
										  </label>
										</li>
										<li class="list__item">
										  <label class="label--radio">
										  	<input type="radio" class="radio" name="product">
										     <span> PowerDialer</span>
										  </label>
										</li>
										<li class="list__item">
										  <label class="label--radio">
										  	<input type="radio" class="radio" name="product">
										      <span>800 Powerline</span>
										  </label>
										</li>
										<li class="list__item">
										  <label class="label--radio">
										  	<input type="radio" class="radio" name="product">
										      <span>FSBO Lead Services</span>
										  </label>
										</li>
									</ul>
								</div>
								<div class="arch-form-section">
									<textarea maxlength="420" name="message" id="message" placeholder="Your Message..."></textarea>
								</div>
								<div class="arch-form-section">
	  								<input type="submit" value="Submit" class="tiny-twelvecol small-twelvecol medium-threecol large-threecol first">
	  							</div>
  							</form>
						</div>
					</section>
				</section>

			</main>

<?php get_footer(); ?>
