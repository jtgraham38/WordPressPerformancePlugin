<?php

//exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

//get option value
$lazy_load_images = get_option($this->get_prefix() . 'lazy_load_images');
var_dump($lazy_load_images);

?>

<div>
    <input 
        type="checkbox"
        name="<?php echo $this->get_prefix() ?>lazy_load_images"
        value="1"
        <?php checked($lazy_load_images) ?>
    >
</div>