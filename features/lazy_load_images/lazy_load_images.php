<?php

//exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

require_once plugin_dir_path(__FILE__) . '../../vendor/autoload.php';

use jtgraham38\jgwordpresskit\PluginFeature;

class JGWPLazyLoadImages extends PluginFeature {
    public function add_filters(){
        add_filter('the_content', array($this, 'add_lazy_loading'));
    }

    public function add_actions(){
        //todo: add actions here
    }

    //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\  //  \\

    //add lazy loading to images if the setting is set
    public function add_lazy_loading($content){
        //check if lazy loading is enabled
        $lazy_load_images = get_option($this->get_prefix() . 'lazy_load_images');

        //if lazy loading is enabled, add the lazy loading attribute to images
        if ($lazy_load_images){

            $images = new WP_HTML_Tag_Processor($content);

            //add lazy loading to images
            while ($images->next_tag( 'img' )){
                //add the lazy loading attribute
                $images->set_attribute('loading', 'lazy');
            }

            //return the updated content
            return $images->get_updated_html();
        }

        //return the content
        return $content;
    }
}