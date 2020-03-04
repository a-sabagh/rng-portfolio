<?php

namespace PCT\Controllers;

class PortfolioController {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'public_register_scripts'));
        add_shortcode('rng-portfolio', array($this, 'rng_portfolio_shortcode'));
    }

    public function public_register_scripts() {
        wp_register_style("rng-portfolio-slick-style", trailingslashit(PCT_PDU) . "public/assets/css/slick.css");
        wp_register_style("rng-portfolio-style", trailingslashit(PCT_PDU) . "public/assets/css/style.css");
        wp_register_script("rng-portfolio-slick-script", trailingslashit(PCT_PDU) . "public/assets/js/slick.js", array("jquery"));
        wp_register_script("rng-portfolio-scripts", trailingslashit(PCT_PDU) . "public/assets/js/script.js", array("jquery","rng-portfolio-slick-script"));
    }

    public function public_enqueue_scripts() {
        wp_enqueue_style("rng-portfolio-slick-style");
        wp_enqueue_style("rng-portfolio-style");
        wp_enqueue_script("rng-portfolio-scripts");
        wp_enqueue_script("rng-portfolio-slick-script");
    }

    public function rng_portfolio_shortcode($atts) {
        $array_atts = shortcode_atts(
                array(
                    'id' => false,
                ), $atts, 'rng-portfolio'
        );
        $id = $array_atts['id'];
        if (empty($id)) {
            return;
        }
        $this->public_enqueue_scripts();
        $category_repeater = get_field("categories_list",$id);
        $single_image = get_field("single_image",$id);
        $background_color = get_field("color_pallet", $id);
        ob_start();
        require_once trailingslashit(PCT_TMP) . "portfolio-content.php";
        $outpout = ob_get_clean();
        return $outpout;
    }

}
