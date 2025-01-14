<?php 
	global $product, $woocommerce_loop;

	$timer = basel_get_opt( 'shop_countdown' );
	// Sale countdown
	if ( ! empty( $woocommerce_loop['timer'] ) )
		$timer = true;
?>
<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
	
	<div class="product-list-image">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php
				/**
				 * woocommerce_before_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked basel_template_loop_product_thumbnail - 10
				 */
				do_action( 'woocommerce_before_shop_loop_item_title' );
			?>
		</a>
		<?php basel_hover_image(); ?>
		<?php basel_quick_view_btn( get_the_ID(), $woocommerce_loop['quick_view_loop'] - 1, 'main-loop' ); ?>
	</div>

	<div class="product-list-content">
		<div class="product-list-info">
			<?php
				/**
				 * woocommerce_shop_loop_item_title hook
				 *
				 * @hooked woocommerce_template_loop_product_title - 10
				 */
				do_action( 'woocommerce_shop_loop_item_title' );
			?>
			<?php woocommerce_template_single_rating(); ?>
			<?php woocommerce_template_single_excerpt(); ?>
			<?php basel_swatches_list(); ?>
			<?php if ( $timer ): ?>
				<?php basel_product_sale_countdown(); ?>
			<?php endif ?>
		</div>

		
		<div class="product-list-buttons">
			<?php woocommerce_template_loop_price(); ?>
			<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			<?php if( class_exists('YITH_WCWL_Shortcode')) basel_wishlist_btn(); ?>
			<?php basel_compare_btn(); ?>
		</div>
	</div>