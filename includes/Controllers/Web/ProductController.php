<?php

namespace ODT\Controllers\Web;

use ODT\Controllers\Web\ProductLogic;

defined('ABSPATH') || exit;

class ProductController {
    
    public $product_logic;
    
    public function __construct($service_provider) {
        $this->product_logic = $service_provider->get(ProductLogic::class);
        
    }
}
