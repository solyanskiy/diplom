<?php


namespace Admin\Controller;


use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

/**
 * Class LoginController
 * @package Admin\Controller
 */
class LoginController extends Controller
{
    protected $auth;

    /**
     * @return mixed
     */
    public function __construct(DI $di)
    {
        parent ::__construct($di);

        $this -> auth = new Auth();

        if($this -> auth -> hashUser() !== null) {
            header('Location: /admin/', true, 301);
            exit;
        }
    }

    /**
     *
     */
    public function form()
    {
        $this->view->render('/login/header');
        $this->view->render('/login/body');
        $this->view->render('/login/footer');
    }

    /**
     * @return mixed
     */
    public function authAdmin()
    {
        $params = $this -> request -> post;

        $value = [':email' => $params['email'],
            ':password' => md5($params['password'])];

        $query = 'SELECT * FROM `user` WHERE email = :email AND password = :password LIMIT 1 ';
        $resultQuery = $this -> db -> query($query , $value);

        if(!empty($resultQuery)) {
            $user = $resultQuery[0];

            if($user['role'] == 'admin') {
                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this -> auth -> salt());

                $query = 'UPDATE user SET hash = :hash WHERE id = :userId';

                $value = [':hash' => $hash,
                    ':userId' => $user['id']];

                $this -> db -> query($query, $value);

                $this -> auth -> authorize($hash);

                header('Location: /admin/login/', true, 301);
                exit;
            }
        }

        exit;
    }

}