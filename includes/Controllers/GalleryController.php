<?php

namespace ODT\Controllers;

class GalleryController {

    public function __construct() {
        add_action('wp_enqueue_scripts', array($this, 'public_enqueue_scripts'));
    }

    public function public_enqueue_scripts(){
        
    }
    
}
