<?php


namespace Engine\Service\View;

use Engine\Core\Template\View;
use Engine\Service\AbstractProvider;

class Provider extends AbstractProvider
{
    public $serviceName = 'view';

    /**
     * @return mixed
     * Инициализация нового сервиса.
     */
    public function init()
    {
        $view = new View();

        $this -> di -> set($this -> serviceName, $view);
    }

}