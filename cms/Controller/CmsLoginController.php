<?php


namespace Cms\Controller;

use Engine\Controller;
use Engine\DI\DI;
use Engine\Core\Auth\Auth;

use Engine\Helper\DatabaseQuery;

class CmsLoginController extends HomeController
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
            //header('Location: /', true, 301);
            //exit;
        }
    }

    /**
     *
     */
    public function render()
    {
        $DatabaseQuery = new DatabaseQuery($this->di);

        $ServicesList = $DatabaseQuery -> getDirectoryPath();
        $CategoryServices = $DatabaseQuery -> getCategoryServices();
        $GeneralSettings = $DatabaseQuery -> getGeneralSettings();
        $PageSettings = ['name' => 'Авторизация'];

        $data = ['ServicesList' => $ServicesList,
            'GeneralSettings' => $GeneralSettings,
            'CategoryServices' => $CategoryServices,
            'PageSettings' => $PageSettings];

        $this->view->render('header', $data);
        $this->view->render('/login/body');
        $this->view->render('footer');
    }

    public function auth()
    {
        $params = $this -> request -> post;

        $value = [':email' => $params['email'],
            ':password' => md5($params['password'])];

        $query = 'SELECT * FROM `user` WHERE email = :email AND password = :password LIMIT 1 ';
        $resultQuery = $this -> db -> query($query , $value);

        if(!empty($resultQuery)) {
            $user = $resultQuery[0];

            if($user['role'] == 'user') {
                $hash = md5($user['id'] . $user['email'] . $user['password'] . $this -> auth -> salt());

                $query = 'UPDATE user SET hash = :hash WHERE id = :userId';

                $value = [':hash' => $hash,
                    ':userId' => $user['id']];

                $this -> db -> query($query, $value);

                $this -> auth -> authorize($hash);

                header('Location: /', true, 301);
                exit;
            }
        }

        exit;
    }

}