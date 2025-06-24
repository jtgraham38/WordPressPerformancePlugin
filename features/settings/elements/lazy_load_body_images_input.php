<?php

//exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

//get option value
$lazy_load_images = get_option($this->prefixed('lazy_load_images'));

?>

<div>
    <input 
        type="checkbox"
        name="<?php $this->pre('lazy_load_images') ?>"
        value="1"
        <?php checked($lazy_load_images) ?>
        title="Enable lazy loading images in post and page bodies."
    >
</div>