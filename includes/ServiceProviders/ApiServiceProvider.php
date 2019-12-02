<?php

namespace ODT\ServiceProviders;

class ApiServiceProvider extends WebServiceProvider {

    public $api_mapper;

    public function __construct($services, $api_mapper) {
        parent::__construct($services);
        $this->api_mapper = $api_mapper;
        add_action("template_redirect", array($this, "template_redirect"));
    }

    public function template_redirect() {
        $module = get_query_var("odt_module");
        if (empty($module)) {
            return;
        }
        $action = get_query_var("odt_action");
        $params = get_query_var("odt_params");
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        $class = $this->api_mapper[$module];
        $object = $this->get($class);
        if (!is_object($object)) {
            wp_send_json(['error' => "Class {$module} not exist"]);
            return;
        }
        if (!isset($action)) {
            $object->index();
            return;
        }
        $object->{$action}($params);
    }

}
