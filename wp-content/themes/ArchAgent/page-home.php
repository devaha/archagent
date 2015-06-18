<?php
/*
Template Name: Home Page Tempalte
*/
?>

<?php get_header(); ?>

<svg class="hidden">
	<defs>
		<path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z"/>
	</defs>
</svg>

			<main id="content" class="full">

				<?php // Hero Image & Main CTA ?>
				<section id="home-hero" style="background-image: url('<?php the_field('hero_image'); ?>');" class="full">
					<section id="home-hero-cta" class="semi">
						<h1><?php the_field('hero_main_header'); ?></h1>
						<h6><?php the_field('hero_sub_header'); ?></h6>
						<a href="<?php the_field('hero_cta_button_link'); ?>">
							<div id="home-hero-cta-button" class="yellow tiny-elevencol small-sixcol medium-fivecol large-fourcol">
								<h4><?php the_field('hero_cta_button_text'); ?></h4>
								<h7><?php the_field('hero_cta_button_sub_text'); ?></h7>
							</div>
						</a>
					</section>
				</section>

				<?php // Hero Divider & CTA ?>
				<section id="home-hero-divider" class="full">
					<section class="semi">
						<div id="home-hero-divider-image" class="tiny-twelvecol small-threecol medium-threecol large-threecol first">
								<div class="full">&nbsp;</div>
							<?php 

							$image = get_field('divider_cta_image');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

							<?php endif; ?>
						</div>
						<div id="home-hero-divider-cta" class="tiny-twelvecol small-eightcol small-first medium-sixcol large-sixcol">
							<h3><?php the_field('divider_cta_main_header'); ?></h3>
							<h6><?php the_field('divider_cta_sub_header'); ?></h6>
						</div>
						<div id="home-hero-divider-button" class="tiny-sixcol small-fourcol medium-twocol large-twocol last">
							<a href="<?php the_field('divider_cta_button_link'); ?>"><div class="blue button mfive full"><?php the_field('divider_cta_button_text'); ?></div></a>
						</div>
					</section>
				</section>

				<?php // Products & Links To Individual Pages ?>
				<section id="home-products" class="full tall">
					<section id="home-products-container" class="semi">
						<div id="home-products-description" class="tiny-twelvecol small-twelvecol medium-threecol large-threecol first">
							<h2><?php the_field('products_summary_heading'); ?></h2>
							<div id="home-products-description-text"><?php the_field('products_summary'); ?></div>
							<a href="<?php the_field('products_summary_link'); ?>"><?php the_field('products_summary_link_text'); ?><span class="link-arrow">&#62;</span></a>
						</div>

						<div id="home-products-list" class="tiny-twelvecol small-twelvecol medium-ninecol large-ninecol last">
						<?php if( have_rows('product_links') ): ?>

							<ul>

							<?php while( have_rows('product_links') ): the_row(); 

								// vars
								$icon = get_sub_field('product_icon');
								$header = get_sub_field('product_header');
								$description = get_sub_field('product_description');
								$link = get_sub_field('product_link');

								?>

								<li class="home-product medium-sixcol large-sixcol first">
									<div class="home-product-icon medium-fourcol large-fourcol first">
										<?php if( $icon ): ?>
											<img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt'] ?>" />
										<?php endif; ?>
									</div>

									<div class="home-product-cta medium-eightcol large-eightcol last">
									    <h4><?php echo $header; ?></h4>
									    <p><?php echo $description; ?></p>
									    <a href="<?php echo $description; ?>">View Details<span class="link-arrow">&#62;</span></a>
								    </div>
								</li>

							<?php endwhile; ?>

							</ul>

						<?php endif; ?>
					</section>
				</section>

				<?php // Featured Product Video & Featured Product CTA ?>
				<section id="home-featured" class="full tall">
					<section class="semi">
						<div id="home-featured-container" class="semi">
							<div class="top-tab"><?php the_field('featured_video_label'); ?><svg viewBox="0 0 80 60" preserveAspectRatio="none"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#tabshape"></use></svg></div>
							<div id="home-featured-video" class="full"><iframe width="560" height="315" src="http://www.youtube.com/embed/sKkMIxQ3Zjk" frameborder="0" allowfullscreen></iframe></div>
							<h2 class="tiny-twelvecol small-twelvecol medium-fourcol large-fourcol first">PowerDialer</h2>
							<a href="<?php the_field('featured_product_cta_button_link'); ?>"><div class="blue button mfive tiny-twelvecol small-twelvecol medium-fivecol large-fivecol"><?php the_field('featured_product_cta_button_text'); ?></div></a>
							<a href="<?php the_field('featured_product_page'); ?>"><div class="darkblue button mfive tiny-twelvecol small-twelvecol medium-threecol large-threecol last">View Details</div></a>
						</div>
					</section>
				</section>

				<?php // Resources, FAQs, and News ?>
				<section id="home-resources" class="full" style="background-image: url('<?php the_field('resources_background_image'); ?>');">
					<section class="semi">

					<?php if( have_rows('resource_streams') ): ?>

						<div id="home-resources-container" class="full">

						<?php while( have_rows('resource_streams') ): the_row();

							$name = get_sub_field('resource_name');
							$link = get_sub_field('resource_link');
							$linktext = get_sub_field('resource_link_text');
						?>

							<div class="tiny-twelvecol small-twelvecol medium-fourcol large-fourcol first">
								<h2><?php echo $name; ?></h2>
									
									<?php 

									$posts = get_sub_field('resource_category');

									if( $posts ): ?>
									    <ul>
									    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
									        <?php setup_postdata($post); ?>
									        <li>
									            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									            <?php the_excerpt(); ?>
									        </li>
									    <?php endforeach; ?>
									    </ul>
									    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									<?php endif; ?>

							<a href="<?php echo $link; ?>" class="resource-link"><?php echo $linktext; ?><span class="link-arrow">&#62;</span></a>
							</div>

						<?php endwhile; ?>

						</div>

					<?php endif; ?>

					</section>
				</section>

			</main>

<?php get_footer(); ?>
