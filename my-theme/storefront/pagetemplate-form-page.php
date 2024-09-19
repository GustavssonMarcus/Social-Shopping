<?php
/*
Template Name: Form page
*/
get_header(); ?>
        <?php
		if ( have_posts() ) :

			while ( have_posts() ) :
				the_post();?> 
                <div class="title">    
                    <h1 class="title-name"><?php the_title();?></h1>
                </div>
                <?php 
				
			endwhile;

		endif;
		?>
			<?php
				if($_SERVER['REQUEST_METHOD'] === 'POST') {

					$new_id = wp_insert_post(array(
                        'post_type' => 'collection',
                        'post_title' => sanitize_text_field($_POST['title']),
                        'post_content' => wp_kses($_POST['content'],array()),
                        'post_status' => 'publish',
                        'post_author' => get_current_user_id()
                    ));

                    $products = array_map('intval', $_POST['selectedProducts'])
                    ?>
                    <?php
                    update_post_meta($new_id, 'products', $products);
                    ?>
                    
                    <a href="<?php echo(get_permalink($new_id)); ?>">
                        Visa din kollektion
                    </a>
                    <?php
				}
			?>
			<?php do_action('form_on_page_template'); ?>
			<?php do_action('after_form_on_page_template'); ?>
            <div>
			    <a href="<?php echo(home_url("/fardiga-mixar/")); ?>">Se färdiga kollektioner</a>
		    </div>
        <?php
get_footer();