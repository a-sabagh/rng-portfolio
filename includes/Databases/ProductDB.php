<?php

namespace ODT\Database;

class ProductDB {

    public $wpdb;

    const table = "odt_product";

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        register_activation_hook(ODT_FILE, array($this, "up"));
    }

    public function up() {
        require_once (trailingslashit(ABSPATH) . 'wp-admin/includes/upgrade.php');
        $product = $this->wpdb->prefix . self::table;
        $sql_units = "CREATE TABLE IF NOT EXISTS {$product} ("
                . "id BIGINT(20) NOT NULL AUTO_INCREMENT,"
                . "name VARCHAR(128) NOT NULL,"
                . "slug VARCHAR(128) NOT NULL,"
                . "PRIMARY KEY (id)"
                . ")"
                . "CHARACTER SET utf8 "
                . "COLLATE utf8_general_ci";
        dbDelta($sql_units);
    }

}

new ProductDB;
