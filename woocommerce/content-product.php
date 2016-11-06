<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

?>

	<?php  //echo "=".$i; print_r($product);?>

	<li <?php post_class("col-md-3 col-sm-4 col-xs-6"); ?>>
		<?php
		/**
		 * woocommerce_before_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );

		/**
		 * woocommerce_before_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		// do_action( 'woocommerce_before_shop_loop_item_title' );
		echo woocommerce_get_product_thumbnail('shop_catalog');

		/**
		 * woocommerce_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );

		/**
		 * woocommerce_after_shop_loop_item_title hook.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		// do_action( 'woocommerce_after_shop_loop_item_title' );
		
		add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 6 );

		/**
		 * woocommerce_after_shop_loop_item hook.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		// echo wc_price($product->get_price());
		remove_action('woocommerce_after_shop_loop_item',"woocommerce_template_loop_add_to_cart");

		do_action( 'woocommerce_after_shop_loop_item' );
		?>

		<?php 
			// $price = $product->get_price_html();
			// $a = '<ins><span class="woocommerce-Price-amount amount">1.690&nbsp;<span class="woocommerce-Price-currencySymbol">р.</span></span></ins>';
			// $pattern = '/<ins><span class="woocommerce-Price-amount amount">[0-9\.]+/i';
			// preg_match($pattern, $price, $matches);
			// print_r($matches);
			$price_no_format = $product->get_price();
		?>

		<a id="show_fast_buy" rel="nofollow" href="#fast_buy" data-quantity="1" data-price="<?php echo $price_no_format;?>" data-title="<?php echo get_the_title();?>" class="popup-modal_buy button add_to_cart_button">Купить</a>

	</li>
	<?php // if( $i%4 == 0 && !is_product() ):?>
		<!-- <div class="clearfix"></div> -->
	<?php // endif;?>

