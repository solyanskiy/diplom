<?php


namespace Cms\Controller;

use Engine\Helper\DatabaseQuery;

class RegisterController extends HomeController
{
    public function render() {
        $DatabaseQuery = new DatabaseQuery($this->di);
        //Вторым параметром можно передать массив данных, и распарсить его на нужной странице
        $ServicesList = $DatabaseQuery -> getDirectoryPath();
        $CategoryServices = $DatabaseQuery -> getCategoryServices();
        $GeneralSettings = $DatabaseQuery -> getGeneralSettings();
        $PageSettings = ['name' => 'Регистрация'];

        $data = ['ServicesList' => $ServicesList,
            'GeneralSettings' => $GeneralSettings,
            'CategoryServices' => $CategoryServices,
            'PageSettings' => $PageSettings];


        $this -> view -> render('header', $data);
        $this -> view -> render('/register/body', $data);
        $this -> view -> render('footer');
    }

    public function adduser() {
        $params = $this -> request -> post;

        $query = 'SELECT * FROM `user` WHERE email = :email';

        $values = [':email' => $params['email']];

        $result = $this -> db -> query($query, $values);

        if (empty($result) == false) {
            print_r("Пользователь с таким Email уже существует!");
            exit();
        }

        $query = 'INSERT INTO user VALUES (NULL, :email, :password, :role, NULL,  NULL, :name, :surname, :phonenumber)';

        $values = [':email' => $params['email'],
            ':password' => md5($params['password']),
            ':role' => 'user',
            ':name' => $params['name'],
            ':surname' => $params['surname'],
            ':phonenumber' => $params['number']];

        $this -> db -> query($query, $values);

        header('Location: /cms/login/', true, 301);
    }
}