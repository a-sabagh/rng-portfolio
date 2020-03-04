<?php

namespace PCT;

use PCT\ServiceProviders\WebServiceProvider;

defined('ABSPATH') || exit;

class Init {

    public $version;
    public $web_slug;

    public function __construct($version, $web_slug) {
        $this->version = $version;
        $this->web_slug = $web_slug;
        add_action('init', array($this, 'register_post_type'));
        $this->boot_service_provider();
    }

    public function register_post_type() {
        $args = array(
            'public' => false,
            'label' => 'تب دسته بندی ها',
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'show_ui' => true,
            'show_in_nav_menus' => false,
            'exclude_from_search' => true,
            'menu_position' => 7,
            'has_archive' => false,
            'supports' => array('title'),
        );
        register_post_type('rng-protfolio', $args);
    }

    public function boot_service_provider() {
        # Web Services
        $web_services = array(
            Controllers\PortfolioController::class => trailingslashit(__DIR__) . "Controllers/PortfolioController.php",
            Controllers\PortfolioMetabox::class => trailingslashit(__DIR__) . "Controllers/PortfolioMetabox.php",
        );
        # BootServices
        $this->app_service_providers($web_services);
    }

    public function app_service_providers($web_services) {
        require_once trailingslashit(__DIR__) . "ServiceProviders/WebServiceProvider.php";
        new WebServiceProvider($web_services);
    }

}
