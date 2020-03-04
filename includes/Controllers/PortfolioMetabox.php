<?php

namespace PCT\Controllers;

class PortfolioMetabox {

    public function __construct() {
        $this->prepare_acf_framework();
        add_action("add_meta_boxes", function() {
            add_meta_box('rng-portfolio-shortcode-selector', 'خروجی شورتکد', array($this, 'shortcode_metaboxes'), 'rng-protfolio', 'side');
        });
    }

    public function shortcode_metaboxes($post) {
        $post_id = $post->ID;
        if (!is_numeric($post_id)) {
            echo '<p>Please Publish portfolio at the first.</p>';
            return;
        }
        echo '<input type="text" name="" value="[rng-portfolio id=\'' . $post_id . '\' ]"  style="direction:ltr;text-align:left;width:100%;" onClick="this.select();" readonly />';
    }

    public function prepare_acf_framework() {
        define('THEME_ACF_DIR', trailingslashit(PCT_PDP) . "includes/vendor/");
        define('THEME_ACF_URL', trailingslashit(PCT_PDU) . "includes/vendor/");
        define('THEME_ACF_INT', trailingslashit(PCT_PDP) . "includes/vendor/acf.php");
        require_once wp_normalize_path(THEME_ACF_INT);
        add_filter('acf/settings/show_admin', '__return_false');
        add_filter('acf/settings/url', function ($url) {
            return THEME_ACF_URL;
        });
        $this->register_acf_fields();
    }

    public function register_acf_fields() {

        acf_add_local_field_group(array(
            'key' => 'group_5e2aff5ce807c',
            'title' => 'تنظیمات تب منوی دسته بندی ها',
            'fields' => array(
                array(
                    'key' => 'field_5e2b032af9f88',
                    'label' => 'دسته بندی و محصولات',
                    'name' => '',
                    'type' => 'tab',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'placement' => 'top',
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_5e2b024733cd1',
                    'label' => 'لیست دسته بندی ها',
                    'name' => 'categories_list',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => 'field_5e2b025733cd2',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'block',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_5e2b025733cd2',
                            'label' => 'دسته بندی',
                            'name' => 'product_cat_id',
                            'type' => 'taxonomy',
                            'instructions' => 'یک دسته بندی را جهت نمایش در تب ها انتخاب کنید',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'taxonomy' => 'product_cat',
                            'field_type' => 'select',
                            'allow_null' => 0,
                            'add_term' => 1,
                            'save_terms' => 0,
                            'load_terms' => 0,
                            'return_format' => 'id',
                            'multiple' => 0,
                        ),
                        array(
                            'key' => 'field_5e2b029933cd3',
                            'label' => 'لیست محصولات دسته بندی',
                            'name' => 'product_ids',
                            'type' => 'post_object',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => array(
                                array(
                                    array(
                                        'field' => 'field_5e2b025733cd2',
                                        'operator' => '!=empty',
                                    ),
                                ),
                            ),
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'post_type' => array(
                                0 => 'product',
                            ),
                            'taxonomy' => '',
                            'allow_null' => 0,
                            'multiple' => 1,
                            'return_format' => 'id',
                            'ui' => 1,
                        ),
                        array(
                            'key' => 'field_5e2b02d133cd4',
                            'label' => 'اسلایدر',
                            'name' => 'slider_ids',
                            'type' => 'gallery',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'id',
                            'preview_size' => 'full',
                            'insert' => 'append',
                            'library' => 'all',
                            'min' => '',
                            'max' => '',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                    ),
                ),
                array(
                    'key' => 'field_5e2b035df9f89',
                    'label' => 'تنظیمات دیگر',
                    'name' => '',
                    'type' => 'tab',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'placement' => 'top',
                    'endpoint' => 0,
                ),
                array(
                    'key' => 'field_5e2b0375f9f8a',
                    'label' => 'تصویر سمت راست تب',
                    'name' => 'single_image',
                    'type' => 'image',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5e2b0391f9f8b',
                                'operator' => '==empty',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                array(
                    'key' => 'field_5e2b0391f9f8b',
                    'label' => 'رنگ جایگزین تصویر',
                    'name' => 'color_pallet',
                    'type' => 'color_picker',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_5e2b0375f9f8a',
                                'operator' => '==empty',
                            ),
                        ),
                    ),
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'rng-protfolio',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
    }

}
