<?php


namespace Engine;

use Engine\DI\DI;

/**
 * Class Controller
 * @package Engine
 * Принимает DI, остальные классы его наследуют и принимают себе зависимости.
 */
abstract class Controller
{
    protected $di;

    protected $db;

    protected $view;

    protected $config;

    protected $request;

    /**
     * Controller constructor.
     * @param $di
     */
    public function __construct(DI $di)
    {
        $this -> di = $di;
        $this -> db = $this -> di -> get('db');
        $this -> view = $this -> di -> get('view');
        $this -> config = $this -> di -> get('config');
        $this -> request = $this -> di -> get('request');
    }
}