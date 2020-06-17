<?php


namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;


/**
 * Class Provider
 * @package Engine\Service\Router
 */
class Provider extends AbstractProvider
{
    /**
     * @var string
     */
    public $serviceName = 'router';

    /**
     * @return mixed
     * Инициализация нового сервиса.
     */
    public function init()
    {
        $router = new Router('http://cms.loc/');

        $this -> di -> set($this -> serviceName, $router);
    }
}