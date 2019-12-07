<?php

namespace ODT\Controllers;

class GalleryController {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'public_register_scripts'));
        add_shortcode('rng-gallery', array($this, 'rng_gallery_shortcode'));
    }

    public function public_register_scripts() {
        wp_register_style("rng-gallery-plugin", trailingslashit(ODT_PDU) . "public/assets/css/plugins.min.css");
        wp_register_style("rng-gallery-style", trailingslashit(ODT_PDU) . "public/assets/css/style.css");
        wp_register_script("rng-gallery-plugin", trailingslashit(ODT_PDU) . "public/assets/js/plugins.min.js", array('jquery'));
        wp_register_script("rng-gallery-scripts", trailingslashit(ODT_PDU) . "public/assets/js/script.js", array('jquery', 'rng-gallery-plugin'));
    }

    public function public_enqueue_scripts() {
        wp_enqueue_style("rng-gallery-plugin");
        wp_enqueue_style("rng-gallery-style");
        wp_enqueue_script("rng-gallery-plugin");
        wp_enqueue_script("rng-gallery-scripts");
    }

    public function rng_gallery_shortcode($atts) {
        $array_atts = shortcode_atts(
                array(
                    'id' => false,
                ), $atts, 'rng-gallery'
        );
        $id = $array_atts['id'];
        if (empty($id)) {
            return;
        }
        $gallery_info = get_field("rng_gallery", $id);
        $this->public_enqueue_scripts();
        ob_start();
        require_once trailingslashit(ODT_TMP) . "gallery-content.php";
        $outpout = ob_get_clean();
        return $outpout;
    }

}
