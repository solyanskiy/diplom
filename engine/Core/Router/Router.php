<?php


namespace Engine\Core\Router;


/**
 * Class Router
 * @package Engine\Core\Router
 */
class Router
{
    /**
     * @var array
     * Список роутов.
     */
    private $routes = [];
    /**
     * @var
     */
    private $host;

    /**
     * @var
     */
    private $dispatcher;

    /**
     * Router constructor.
     * @param $host
     */
    public function __construct($host)
    {
        $this -> host = $host;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     * Добавляем роуты.
     */
    public function add($key, $pattern, $controller, $method = 'GET')
    {
        $this -> routes[$key] = [
            'pattern' => $pattern,
            'controller' => $controller,
            'method' => $method
        ];
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute
     */
    public function dispatch($method, $uri)
    {
        return $this -> getDispatcher() -> dispatch($method, $uri);
    }

    /**
     * @return UrlDispatcher
     */
    public function getDispatcher()
    {
        if ($this -> dispatcher == null) {
            $this -> dispatcher = new UrlDispatcher();

            foreach ($this -> routes as $route) {
                $this -> dispatcher -> register($route['method'], $route['pattern'], $route['controller']);
            }
        }
        return $this -> dispatcher;
    }
}