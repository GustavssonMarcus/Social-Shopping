<?php
/*
*Template Name: Archive Collections
*/
?>

<?php
get_header(); 
?>


<form method="GET" action="">
	<select name="kategori" id="kategori">
		<option value="">Välj Kategori</option>
		<?php
		$categories = get_terms( array(
			'taxonomy'=> 'collection_category',
			'hide_empty' => false,
		));
		foreach ($categories as $category) {
			$selected =(isset($_GET['kategori']) && $_GET['kategori'] == $category->slug) ? 'selected' : '';
			echo '<option value="' . esc_attr($category->slug) . '" >' . esc_html($category->name) . '</option>';
		}
		?>
	</select>
	<input type="date" name="collection-date" value="<?php echo isset($_GET['collection-date']) ? esc_attr($_GET['collection-date']) : ''; ?>">

	<button type="submit">Filtrera</button>
</form>

<div class="archive">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();
				?>
				<div class="archive-container">
				<span>Skapad: <?php echo get_the_date(); ?></span>
					<h1>
						<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a>
					</h1>
					<?php the_excerpt();?>
					<form method="POST">
						<input type="submit" value="Lägg till i varukorg" />
					</form>
						
				</div>
				<?php

endwhile;

endif;
?>
</div>
<?php
get_footer();
