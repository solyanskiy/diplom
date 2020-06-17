<?php

namespace Cms\Controller;

use Engine\Core\Auth\Auth;
use Engine\Helper\DatabaseQuery;

class HomeController extends CmsController
{
    public function index()
    {
        $DatabaseQuery = new DatabaseQuery($this->di);
        //Вторым параметром можно передать массив данных, и распарсить его на нужной странице
        $ServicesList = $DatabaseQuery -> getDirectoryPath();
        $CategoryServices = $DatabaseQuery -> getCategoryServices();
        $GeneralSettings = $DatabaseQuery -> getGeneralSettings();
        $PageSettings = ['name' => 'Сервисы для малого бизнеса'];

        $this -> auth = new Auth();
        if ($this -> auth -> hashUser() !== null) {
            $PageSettings['authUser'] = True;
            $PageSettings['params'] = $DatabaseQuery ->getParams($this-> auth ->hashUser());
        } else {
            $PageSettings['authUser'] = False;
        }

        $data = ['ServicesList' => $ServicesList,
            'GeneralSettings' => $GeneralSettings,
            'CategoryServices' => $CategoryServices,
            'PageSettings' => $PageSettings];


        $this -> view -> render('header', $data);
        $this -> view -> render('index', $data);
        $this -> view -> render('footer');



    }

    public function logout() {
        $this -> auth -> unAuthorized();
        header('Location: /');
    }

}