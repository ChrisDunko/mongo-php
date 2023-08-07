<?php declare(strict_types=1);

use Helpers\Response;

class Router
    {
        public function __construct()
        {
            if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
                // cors preflight
                $response = Response::headers(200);
                echo json_encode($response);
                exit();
            }

            $params = [];

            if(!isset($urlSegments[0]) || $urlSegments[0] === '') {
                $controller = '\Controllers\Index_Controller';
                $method = 'show_index';
            } else {
                $controller = '\Controllers\Index_Controller';
                $method = 'show_index';
            }

            call_user_func_array([$controller, $method], $params);
            exit();
        }

        private function getUrl(): array
        {
            if(isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                return explode('/', $url);
            } else {
                return [];
            }
        }
    }
