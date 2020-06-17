<?php


namespace Engine\Core\Router;


/**
 * Class DispatchedRoute
 * @package Engine\Core\Router
 */
class DispatchedRoute
{
    /**
     * @var
     */
    private $controller;
    /**
     * @var array
     */
    private $parameters;

    /**
     * DispatchedRoute constructor.
     * @param $controller
     * @param array $parameters
     */
    public function __construct($controller, $parameters = [])
    {
        $this -> controller = $controller;
        $this -> parameters = $parameters;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this -> controller;
    }

    /**
     * @param mixed $controller
     */
    public function setController($controller): void
    {
        $this -> controller = $controller;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this -> parameters;
    }

    /**
     * @param array $parameters
     */
    public function setParameters(array $parameters): void
    {
        $this -> parameters = $parameters;
    }
}