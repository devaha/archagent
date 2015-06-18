<?php
/**
 * Single Product Meta
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php _e( 'SKU:', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span>.</span>

	<?php endif; ?>

	<ul id="single_product_subnav">

	<?php if( have_rows('product_features') ): ?>
		<li>
			<a href="#product-features"><h6>Features</h6></a>
		</li>
	<?php endif; ?>

	<?php if( have_rows('product_gallery') ): ?>
		<li>
			<a href="#product-gallery"><h6>Images/Videos</h6></a>
		</li>
	<?php endif; ?>

	<?php $faqs = get_field('product_faqs'); if( $faqs ): ?>
		<li>
			<a href="#product-faqs"><h6>FAQs</h6></a>
		</li>
	<?php endif; ?>

		<li>
			<a href="#product-pricing"><h6>Pricing</h6></a>
		</li>

	</ul>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
