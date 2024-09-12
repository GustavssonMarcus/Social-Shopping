<?php
function enqueue_theme_styles() {
    wp_enqueue_style('main-styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
?>
<?php
add_action('form_on_page_template', 'mt_output_form', 10);
function mt_output_form() {
?>
<?php    
    $products = wc_get_products(array()); ?>

    <form method="POST">
        <span>Namnet på din kollektion:</span>
        <input name="title" />
        <br>
        <span>Kort beskrivning:</span>
        <textarea name="content"></textarea>
        <br>
        <span>Produkter till din kollektion:</span>
        <select name="selectedProducts[]" multiple>
<?php
foreach($products as $product) {
    $id = $product->get_id();
    $title = $product->get_name();
    ?>
    <option value="<?php echo($id); ?>"><?php echo(esc_html($title))?>
    <?php
}
?>
</select>
<input type="submit">
<?php
}
add_action('form_on_page_template', 'mt_output_form');

function mt_collection_filter($query) {
    if($query->is_main_query() ) {
        if(isset($_GET['startDate']) && $_GET['startDate']) {
            $date_query = array(
                array(
                    'after'     => $_GET['startDate'],
                    'inclusive' => true,
                ),
            );

            $query->set( 'date_query', $date_query );
        }
    }
    }
    add_action( 'pre_get_posts', 'mt_collection_filter' );
