<?php

namespace Core;

class Router
{
    public function dispatch()
    {
        $url = $this->getUrl();

        $controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'HomeController';
        $method = $url[1] ?? 'index';
        $params = array_slice($url, 2);

        $controllerPath = '../app/controllers/' . $controllerName . '.php';

        if (file_exists($controllerPath)) {
            require_once $controllerPath;

            $controllerFullName = 'App\\Controllers\\' . $controllerName;
            $controller = new $controllerFullName();

            if (method_exists($controller, $method)) {
                call_user_func_array([$controller, $method], $params);
            } else {
                echo "Method '$method' not found.";
            }
        } else {
            echo "Controller '$controllerName' not found.";
        }
    }

    private function getUrl()
    {
        if (isset($_GET['url'])) {
            // Cleaning all bad parameters in the url
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }

        return [];
    }
}
