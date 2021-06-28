<?php

namespace app;

class Router
{

    public array $getRoutes = [];
    public array $postRoutes = [];
    public Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function get($url, $fun)
    {

        $this->getRoutes[$url] = $fun;
    }

    public function post($url, $fun)
    {

        $this->postRoutes[$url] = $fun;
    }

    public function resolve()
    {


        $currentUrl = $_SERVER['REQUEST_URI'] ?? '/';
        if(strpos($currentUrl, '?') != false){
            $currentUrl = substr($currentUrl, 0, strpos($currentUrl, '?'));
        }


        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET') {
            $fun = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fun = $this->postRoutes[$currentUrl] ?? null;
        }

        if ($fun) {

            call_user_func($fun, $this);
        } else {
            echo "Page Not Found";
        }
    }


    public function renderView($view, $params = [])
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include_once __DIR__ . "/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__ . "/views/_layout.php";
    }

    // echo '<pre>';
    // var_dump($fun);
    // echo '</pre>';

}
