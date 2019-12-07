<?php

namespace ODT\Controllers;

class GalleryMetabox {

    public function __construct() {
        $this->prepare_acf_framework();
        add_action("add_meta_boxes",function(){
            add_meta_box("rng-gallery-shortcode", "Shortcode", array($this,"shortcode_metaboxes"), 'rng-gallery', "side", "low");
        });
    }

    public function shortcode_metaboxes($post){
        $post_id = $post->ID;
        if(!is_numeric($post_id)){
            echo '<p>Please Publish gallery at the first.</p>';
            return;
        }
        echo '<input type="text" name="" value="[rng-gallery id=\'' . $post_id . '\' ]"  style="direction:ltr;text-align:left;width:100%;" onClick="this.select();" readonly />';
    }

    public function prepare_acf_framework() {
        define('THEME_ACF_DIR', trailingslashit(ODT_PDP) . "includes/vendor/");
        define('THEME_ACF_URL', trailingslashit(ODT_PDU) . "includes/vendor/");
        define('THEME_ACF_INT', trailingslashit(ODT_PDP) . "includes/vendor/acf.php");
        require_once wp_normalize_path(THEME_ACF_INT);
        add_filter('acf/settings/url', function ($url) {
            return THEME_ACF_URL;
        });
        $this->register_acf_fields();
    }

    public function register_acf_fields() {
        $arguments = array(
            'key' => 'theme_section_name',
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'rng-gallery',
                    ),
                ),
            ),
            'title' => 'Gallery Images',
            'menu_order' => 0,
            'fields' => array(
                array(
                    'key' => 'rng-gallery',
                    'name' => 'rng_gallery',
                    'label' => 'Gallery',
                    'type' => 'repeater',
                    'layout' => 'block', // block
                    'collapsed' => 'title',
                    'sub_fields' => array(
                        array(
                            'key' => 'image',
                            'label' => 'Image',
                            'name' => 'image',
                            'type' => 'image'
                        ),
                        array(
                            'key' => 'image-title',
                            'label' => 'Image Title',
                            'name' => 'image-title',
                            'type' => 'text',
                        ),
                        array(
                            'key' => 'category',
                            'label' => 'Slug',
                            'name' => 'category',
                            'type' => 'text'
                        ),
                        array(
                            'key' => 'link',
                            'label' => 'Link',
                            'name' => 'link',
                            'type' => 'text'
                        )
                    ),
                    'button_label' => 'Add Image',
                    'min' => '',
                    'max' => '',
                ),
            ),
        );
        acf_add_local_field_group($arguments);
    }

}
