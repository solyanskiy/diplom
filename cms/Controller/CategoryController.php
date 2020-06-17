<?php


namespace Cms\Controller;

use Engine\Core\Auth\Auth;
use Engine\Helper\DatabaseQuery;

class CategoryController extends HomeController
{
    public function renderCategory($id)
    {
        if (isset($id)) {
            $a = 1; //page 404
        }

        $DatabaseQuery = new DatabaseQuery($this->di);

        $ExtraOptions = ['id' => $id];

        $PageSettings = $DatabaseQuery -> getCategoryServices($ExtraOptions);   // getCategoryData
        $ServicesList = $DatabaseQuery -> getDirectoryPath($ExtraOptions); //getDirectoryPathByCategory
        $GeneralSettings = $DatabaseQuery -> getGeneralSettings();
        $CategoryServices = $DatabaseQuery -> getCategoryServices();

        $PageSettings['name'] = 'Категория: ' . $PageSettings['name'];

        $this -> auth = new Auth();
        if ($this -> auth -> hashUser() !== null) {
            $PageSettings['authUser'] = True;
            $PageSettings['params'] = $DatabaseQuery ->getParams($this-> auth ->hashUser());
        } else {
            $PageSettings['authUser'] = False;
        }

        $data = ['ServicesList' => $ServicesList,
            'GeneralSettings' => $GeneralSettings,
            'PageSettings' => $PageSettings,
            'CategoryServices' => $CategoryServices];

        $this -> view -> render('header', $data);
        $this -> view -> render('/category/body', $data);
        $this -> view -> render('footer');
    }
}