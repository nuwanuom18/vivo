<?php
/*
 * Woocommerce compatibility / overrides
 *
 * @package Bravada
 */

/* Override content product - products content on archive pages
    https://github.com/woocommerce/woocommerce/blob/release/3.5/templates/content-product.php
*/


/*
 * Move the Add to Cart button inside the thumbnail,
 * and add a div for the Add to card and View cart buttons
 */
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
add_action('woocommerce_before_shop_loop_item_title', 'bravada_woocommerce_before_buttons', 15);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 16);
add_action('woocommerce_before_shop_loop_item_title', 'bravada_woocommerce_after_buttons', 17);

function bravada_woocommerce_before_buttons() {
    echo "<div class='woocommerce-buttons-container'>";
}

function bravada_woocommerce_after_buttons() {
    echo "</div><!--.woocommerce-buttons-container-->";
}

/*
 * Add a container to the thumbnail
 */
add_action('woocommerce_before_shop_loop_item_title', 'bravada_woocommerce_before_thumbnail', 5);
add_action('woocommerce_before_shop_loop_item_title', 'bravada_woocommerce_after_thumbnail', 20);

function bravada_woocommerce_before_thumbnail() {
    echo "<div class='woocommerce-thumbnail-container'>";
}

function bravada_woocommerce_after_thumbnail() {
    echo "</div><!--.woocommerce-thumbnail-container-->";
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'cryout_woo_loop_columns', 999);
if (!function_exists('cryout_woo_loop_columns')) {
	function cryout_woo_loop_columns() {
		return 3; // 3 products per row
	}
} //cryout_woo_loop_columns

// FIN