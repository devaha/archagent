<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$description = get_field( "product_description" );

if ( ! $description ) {
	return;
}

?>
<div itemprop="description">
	<?php the_field('product_description'); ?>
</div>
