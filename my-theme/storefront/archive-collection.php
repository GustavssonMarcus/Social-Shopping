<?php
get_header(); 
?>

Archive collection
<form method="GET">
	<input type="date" name="startDate">
	<input type="date" name="endDate">
	<select name="filterOccasion" >
		<option>Välj tidspunkt</option>
	</select>
	<input type="submit">
</form>

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();
				?>
				<div>
					<a href="<?php echo get_permalink(get_the_ID());?>"></a>
					<?php
						the_title();
						the_excerpt();
						?>
				</div>
				<?php

			endwhile;

		endif;
		?>
<?php
get_footer();
