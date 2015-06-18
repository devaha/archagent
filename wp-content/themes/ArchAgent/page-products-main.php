<?php
/*
Template Name: Products Main Tempalte
*/
?>

<?php get_header(); ?>

			<main id="content" class="full">

				<?php // Hero Image & Main CTA ?>
				<section id="products-hero" style="background-image: url('<?php the_field('hero_image'); ?>');" class="full">
					<section id="products-hero-cta" class="semi">
						<div class="tiny-twelvecol small-twelvecol medium-eightcol large-eightcol first">
							<h1><?php the_field('hero_main_header'); ?></h1>
							<?php the_field('hero_text'); ?>
						</div>
					</section>
				</section>

				<?php // Products & Links To Individual Pages ?>
				<section id="products-breakdown" class="full">
					<section id="products-group-cta" class="semi">
						<?php if( have_rows('product_group') ): ?>

							<?php while( have_rows('product_group') ): the_row(); 

								// vars
								$groupheader = get_sub_field('product_group_header');
								?>


								<div class="product-group-list full">
									<h2><?php echo $groupheader; ?></h2>
									<?php 

									// check for rows (sub repeater)
									if( have_rows('product_group_ctas') ): ?>
										<ul>
										<?php 

										// loop through rows (sub repeater)
										while( have_rows('product_group_ctas') ): the_row();

										// vars (sub repeater)
										$icon = get_sub_field('icon');
										$name = get_sub_field('product_name');
										$description = get_sub_field('product_text');
										$link = get_sub_field('product_link');
										?>
											
											<li class="tiny-twelvecol small-twelvecol medium-fourcol large-fourcol first">
												<div class="product-icon medium-fourcol large-fourcol first">
													<?php if( $icon ): ?>
														<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" />
													<?php endif; ?>
												</div>

												<div class="product-cta medium-eightcol large-eightcol last">
												    <h4><?php echo $name; ?></h4>
												    <?php echo $description; ?>
												    <a href="<?php echo $link; ?>">View Details<span class="link-arrow">&#62;</span></a>
											    </div>
											</li>

										<?php endwhile; ?>
										</ul>
									<?php endif; //if( get_sub_field('items') ): ?>
								</div>
							<?php endwhile; ?>

						<?php endif; ?>
					</section>
				</section>

			</main>

<?php get_footer(); ?>
