<?php
function enqueue_theme_styles() {
    wp_enqueue_style('main-styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
?>
<?php
function mt_output_form() {    
    $products = wc_get_products(array()); ?>
<div class="collections">
    <form method="POST" class="form-collection" onsubmit="dataLayer.push({event: 'createdCollection', products: [].slice.call(document.querySelector('select').selectedOptions).map(function(item) {return item.value}), user: <?php echo(get_current_user_id())?>});">
        <label for="title">Namnet på din kollektion:</label>
        <br>
        <input name="title" id="title" placeholder="Skriv din kollektions namn" />
        <br>
        <label for="content">Kort beskrivning:</label>
        <br>
        <textarea name="content" id="content" placeholder="Beskriv kort din kollektion"></textarea>
        <br>
        <label for="products">Produkter till din kollektion:</label>
        <br>
        <select name="selectedProducts[]" multiple id="products">
    <?php
    foreach($products as $product) {
        $id = $product->get_id();
        $title = $product->get_name();
        ?>
        <option value="<?php echo($id); ?>"><?php echo(esc_html($title))?></option>
        <?php
    }
    ?>
    </select>
    <br>
    <label for="collection_category">Välj en kategori för din kollektion:</label>
        <br>
        <select name="collection_category" id="collection_category">
            <option value="">Välj Kategori</option>
            <?php
            $categories = get_terms(array(
                'taxonomy' => 'collection_category',
                'hide_empty' => false,
            ));

            foreach ($categories as $category) {
                ?>
                <option value="<?php echo esc_attr($category->term_id); ?>">
                    <?php echo esc_html($category->name); ?>
                </option>
                <?php
            }
            ?>
        </select>
        <br>
    <input type="submit">
</div>
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

    function filter_collections_by_category($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (isset($_GET['kategori']) && !empty($_GET['kategori'])) {
            $query->set('tax_query', array(
                array(
                    'taxonomy' => 'collection_category',
                    'field' => 'slug',
                    'terms' => sanitize_text_field($_GET['kategori']),
                ),
            ));
        }
       
       
        if (isset($_GET['collection-date']) && !empty($_GET['collection-date'])) {
            $date_query = [
                [
                    'after' => $_GET['collection-date'] . ' 00:00:00',
                    'before' => $_GET['collection-date'] . '23:59:59',
                    'inclusive' => true
                ],
            ];
           
            $query->set('date_query', $date_query);
           
        }
    }
}
add_filter('pre_get_posts', 'filter_collections_by_category');