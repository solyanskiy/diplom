<?php


namespace Engine\Service\Database;


use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    public $serviceName = 'db';

    /**
     * @return mixed
     * Инициализация нового сервиса.
     */
    public function init()
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}