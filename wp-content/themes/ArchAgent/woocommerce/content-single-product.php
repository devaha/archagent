<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

	<section id="product-info" class="semi">
		<div class="summary entry-summary">

			<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>

		</div><!-- .summary -->

		<?php
			/**
			 * woocommerce_after_single_product_summary hook
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_show_product_images - 20
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>
		</div><!-- .product-info -->

			<?php if( have_rows('product_features') ): ?>

				<section id="product-features" class="full">

				<div class="semi">

				<h2>Product Features</h2>

				<ul class="features-list">

				<?php while( have_rows('product_features') ): the_row(); 

					// vars
					$name = get_sub_field('feature_name');
					$description = get_sub_field('feature_description');

					?>

					<li class="tiny-twelvecol small-sixcol medium-fourcol large-fourcol">

					    <h4><?php echo $name; ?></h4>
					    <h6><?php echo $description; ?></h6>

					</li>

				<?php endwhile; ?>

				</ul>
				
				</div>

			</section>

			<?php endif; ?>

			<?php if( have_rows('product_gallery') ): ?>

				<section id="gallery" class="full">

				<div class="semi">
					<h2>Product Images/Videos</h2>
				</div>

				<ul id="product-gallery">

				<?php while( have_rows('product_gallery') ): the_row(); 

					// vars
					$type = get_sub_field('item_type');
					$image = get_sub_field('item_image');
					$video = get_sub_field('item_video_url');
					$description = get_sub_field('item_description');
					$video = substr($video, strrpos($video, "/") + 1);
					if (strpos($video,'=') !== false) {
						$video = substr($video, strrpos($video, "=") +1);
					}
					if (strpos($video,'?') == false) {
						if ((preg_match('/[A-Za-z]/', $video)== FALSE)){
							$video = '<iframe src="http://player.vimeo.com/video/' . $video . '" width="500" height="375" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
						} else {
							$video = '<iframe src="http://www.youtube.com/embed/' . $video . '" width="500" height="375" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
						}
					};
					?>
					<li class="gallery-item">
						<div class="gi-wrapper">
						<?php if ($type == 'Image'):?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php elseif ($type == 'Video'):?>
							<?php echo $video; ?>
						<?php endif; ?>
						</div>
						<?php echo $description; ?>
					</li>

				<?php endwhile; ?>

				</ul>
				<div id="gallery-nav"><div id="gallery-previous" class="gallery-button"></div><div id="gallery-next" class="gallery-button"></div></div>
			</section>

			<?php endif; ?>

						<?php 

			$posts = get_field('product_faqs');

			if( $posts ): ?>
				
				<section id="product-faqs" class="full">

					<div class="semi">
						<h2>Product FAQs</h2>
					</div>

				    <ul class="semi">
				   	
					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>

						<?php $rows = get_field('faq' ); // get all the rows
						$first = $rows[0]; // get the first row
						$second = $rows[1]; // get the first row
						$first_question = $first['question' ];
						$first_answer = $first['answer' ];
						$second_question = $second['question' ];
						$second_answer = $second['answer' ];
						?>

					        <li class="tiny-twelvecol small-twelvecol medium-sixcol large-sixcol first">
					           <h3><?php echo $first_question; ?></h3>
					           <?php echo $first_answer; ?><a href="<?php the_permalink(); ?>"><span class="read-more">Read More</span></a>
					        </li>
					        <li class="tiny-twelvecol small-twelvecol medium-sixcol large-sixcol last">
					           <h3><?php echo $second_question; ?></h3>
					           <?php echo $second_answer; ?><a href="<?php the_permalink(); ?>"><span class="read-more">Read More</span></a>
					        </li>
					        <li class="full">
					        	<div class="tiny-twelvecol small-twelvecol medium-sixcol large-sixol first"><a href="<?php the_permalink(); ?>"><div class="blue button mthirty tiny-twelvecol small-twelvecol medium-eightcol large-eightcol last">View More Product Faqs</div></a></div>
					        	<div class="tiny-twelvecol small-twelvecol medium-sixcol large-sixcol last"><a href="<?php the_permalink(); ?>"><div class="grey button mthirty tiny-twelvecol small-twelvecol medium-eightcol large-eightcol first">View Product Quickstart Guide</div></a></div>
					        </li>

				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				    </ul>

			    </section>

			<?php endif; ?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
