<?php

//exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . '../../vendor/autoload.php';

use jtgraham38\jgwordpresskit\PluginFeature;

class JGWPSiteBoostSettings extends PluginFeature {
    public function add_filters(){
        //todo: add filters here
    }

    public function add_actions(){
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'init_settings'));
    }

    //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\

    //register settings
    public function init_settings(){
        // create section for settings
        add_settings_section(
            'jg_wp_siteboost_settings', // id
            '', // title
            function(){ // callback
                echo 'Manage your WordPress Site Boost settings here.';
            },
            'jg-wp-site-boost-settings'  // page (matches menu slug)
        );

        // create the settings fields
        add_settings_field(
            $this->get_prefix() . "lazy_load_images",    // id of the field
            'Lazy Load Images',   // title
            function(){ // callback
                require_once plugin_dir_path(__FILE__) . 'elements/lazy_load_body_images_input.php';
            },
            'jg-wp-site-boost-settings', // page (matches menu slug)
            'jg_wp_siteboost_settings'  // section
        );

        // create the settings themselves
        register_setting(
            'jg_wp_siteboost_settings', // option group
            $this->get_prefix() . 'lazy_load_images',    // option name
            array(  // args
                'type' => 'boolean',
                'default' => false,
                'sanitize_callback' => function($value){
                    return isset($value) ? true : false;
                }
            )
        );
    }

    // Define the add_settings_page method
    public function add_settings_page() {
        add_menu_page(
            'Site Boost Settings', // Page title
            'Boost Settings',      // Menu title
            'manage_options',      // Capability
            'jg-wp-site-boost-settings', // Menu slug
            array($this, 'settings_page_callback'), // Callback function
            'dashicons-admin-generic', // Icon URL (use a Dashicon)
            20 // Position
        );
    }

    // Callback function to display the content of the settings page
    public function settings_page_callback() {
        require_once plugin_dir_path(__FILE__) . 'elements/siteboost_settings.php';
    }
}