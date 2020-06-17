<?php


namespace Engine\Service\Request;


use Engine\Core\Database\Request;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'request';

    /**
     * @return mixed
     * Инициализация нового сервиса.
     */
    public function init()
    {
        $request = new Request();

        $this -> di -> set($this -> serviceName, $request);
    }
}