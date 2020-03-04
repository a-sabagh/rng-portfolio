<?php

/*
 * Plugin Name: تب دسته بندی ها
 * Description: پلاگین نمایش دسته بندی محصولات و محصولات آن ها به صورت تب به همراه اسلایدر و بنر
 * Version: 1.0
 * Author: توسعه گران آریاز
 * Author URI: http://ariazdevs.com
 * Text Domain: pct
 */

if (!defined('ABSPATH')) {
    exit;
}

define("PCT_FILE", __FILE__);
define("PCT_PRU", plugin_basename(__FILE__));
define("PCT_PDU", plugin_dir_url(__FILE__));
define("PCT_PRT", basename(__DIR__));
define("PCT_PDP", plugin_dir_path(__FILE__));
define("PCT_TMP", PCT_PDP . "public/");
define("PCT_ADM", PCT_PDP . "admin/");

require_once trailingslashit(__DIR__) . "includes/Init.php";
$init = new PCT\Init(1.0, 'pct-plugin', 'PCTApi');