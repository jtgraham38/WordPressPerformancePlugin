<?php
/**
 * Plugin Name:       JG Site Performance
 * Plugin URI:        https://github.com/jtgraham38/WordPressPerformancePlugin
 * Description:       A plugin to boost the performance of WordPress sites!
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jacob Graham
 * Author URI:        https://jacob-t-graham.com
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:       site-boost
 */

//exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Require Composer's autoload file
require_once plugin_dir_path(__FILE__) . '/vendor/autoload.php';

// Use statements for namespaced classes
use jtgraham38\jgwordpresskit\Plugin;
use jtgraham38\jgwordpresskit\PluginFeature;

//create a new plugin manager
$plugin = new Plugin("jg_wp_siteboost_", plugin_dir_path( __FILE__ ), plugin_dir_url( __FILE__ ));


//register features with the plugin manager here...
require_once plugin_dir_path(__FILE__) . 'features/settings/settings.php';
$feature = new JGWPSiteBoostSettings($plugin);
$plugin->register_feature($feature);

require_once plugin_dir_path(__FILE__) . 'features/lazy_load_images/lazy_load_images.php';
$feature = new JGWPLazyLoadImages($plugin);
$plugin->register_feature($feature);

//init the plugin
$plugin->init();
