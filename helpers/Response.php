<?php declare(strict_types=1);
namespace Helpers;

    use AllowDynamicProperties;

    #[AllowDynamicProperties]
    class Response
    {
        public static function headers(int $response_code): object
        {
            // *** CORS ***
//            if (isset($_SERVER['HTTP_ORIGIN'])) {
//                $http_origin = $_SERVER['HTTP_ORIGIN'];
//            } elseif (isset($_SERVER['HTTP_REFERER'])) {
//                $http_origin = $_SERVER['HTTP_REFERER'];
//            }
//            if(ENVIRONMENT === 'PROD') {
//                if($http_origin === 'https://acda.dragoneyes.solutions') {
//                    header('Access-Control-Allow-Origin: https://acda.dragoneyes.solutions');
//                }
//            } elseif(ENVIRONMENT === 'DEV') {
//                header('Access-Control-Allow-Origin: *');
//            }
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Headers: *");

            http_response_code($response_code);

            $response = new Response();
            $response->payload = [];

            if($response_code < 300) {
                $response->message = 'success';
            }
            if($response_code === 200) {
                $response->reply = 'ok';
            } elseif($response_code === 201) {
                $response->reply = 'created';
            }

            if($response_code > 399) {
                $response->message = 'failed';
            }
            if($response_code === 400) {
                $response->reply = 'bad request';
            } elseif($response_code === 401) {
//                $response->reply = 'unauthorized';
                $response->reply = 'unauthenticated';
            } elseif($response_code === 402) {
                $response->reply = 'payment required';
            } elseif($response_code === 403) {
//                $response->reply = 'forbidden';
                $response->reply = 'unauthorized';
            } elseif($response_code === 404) {
                $response->reply = 'not found';
            } elseif($response_code === 405) {
                $response->reply = 'method not allowed';
            } elseif($response_code === 406) {
                $response->reply = 'not acceptable';
            } elseif($response_code === 418) {
                $response->reply = 'I\'m a teapot';
            } elseif($response_code === 500) {
                $response->reply = 'internal server error';
            } elseif($response_code === 503) {
                $response->reply = 'service unavailable';
            }

            return $response;
        }
    }
