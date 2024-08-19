<?php

//exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}
?>


<div class="wrap">

    <h1>WordPress Site Boost Settings</h1>

    <form method="post" action="options.php">
        <?php settings_fields('jg_wp_siteboost_settings'); ?>
        <?php do_settings_sections('jg-wp-site-boost-settings'); ?>
        <?php submit_button(); ?>
    </form>
</div>

