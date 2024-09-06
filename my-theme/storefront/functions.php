<?php
function mitt_tema_setup() {

    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mitt-tema'),
        'footer' => __('Footer Menu', 'mitt-tema'),
    ));


    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'mitt_tema_setup');
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
