<?php


namespace Admin\Controller;


use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

/**
 * Class AdminController
 * @package Admin\Controller
 */
class AdminController extends Controller
{
    /**
     * @var Auth
     */
    protected $auth;

    /**
     * AdminController constructor.
     * @param DI $di
     */
    public function __construct(DI $di)
    {
        parent ::__construct($di);

        $this -> auth = new Auth();

        if($this -> auth -> hashUser() == null) {
            header('Location: /admin/login/');
            exit;
        }
    }

    /**
     *
     */
    public function checkAuthorization()
    {
        /*if($this -> auth -> hashUser() !== null) {
            $this -> auth -> authorize($this -> auth -> hashUser());
        }

        if (!$this -> auth -> authorized()) {
            header('Location: /admin/login/');
            exit;
        }*/
    }

    public function logout() {
        $this -> auth -> unAuthorized();
        header('Location: /admin/login/');
    }
}