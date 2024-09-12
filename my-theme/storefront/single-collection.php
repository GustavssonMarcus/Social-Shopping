<?php
/**
 * The template for displaying all single posts.
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();
			the_title();
			the_content();

		endwhile; 

		if($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$product_ids = get_post_meta(get_the_ID(), 'products', true);
			foreach($product_ids as $product_id) {
				WC()->cart->add_to_cart($product_id, 1, 0, array(), array('collection' => get_the_ID() ));
			}
		}

		$products_ids = get_post_meta(get_the_ID(), 'products', true);
		

		foreach($products_ids as $product_id) {
			$product = wc_get_product($product_id);

			?>
			<div class="collection">
				<a href="<?php echo get_permalink($product->get_id()); ?>">
					<?php echo $product->get_name() ?>
				</a>
			</div>
			<?php
		}
		?>
		<form method="POST">
			<input type="submit" value="Lägg till i varukorg" />
		</form>
		

<?php
do_action( 'storefront_sidebar' );
get_footer();
