<?php
class RouteHelper
{
    private $routes = [];

    public function addRoute($method, $path, $controllerName, $methodName)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller_name' => $controllerName,
            'method_name' => $methodName
        ];
    }

    public function dispatch($method, $uri)
    {
        foreach ($this->routes as $route) {

            if ($route['method'] == $method && $route['path'] == parse_url($uri, PHP_URL_PATH)) {
                $controllerName = $route['controller_name'];
                $methodName = $route['method_name'];

                $controller = new $controllerName();
                $controller->$methodName();
                return;
            }
        }

        header("HTTP/1.1 404 Not Found");
        echo '404 Not Found';
    }
}
