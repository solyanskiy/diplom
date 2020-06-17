<?php


namespace Cms\Controller;

use Engine\Core\Auth\Auth;
use Engine\Helper\DatabaseQuery;

class ReviewController extends HomeController
{
    /* Main functions */
    public function loadReviews() {
        $DatabaseQuery = new DatabaseQuery($this->di);
        $PageSettings = ['name' => 'Отзывы'];
        $GeneralSettings = $DatabaseQuery -> getGeneralSettings();
        $CategoryServices = $DatabaseQuery -> getCategoryServices();

        $Reviews = $this -> getReviews();

        $this -> auth = new Auth();
        if ($this -> auth -> hashUser() !== null) {
            $PageSettings['authUser'] = True;
            $PageSettings['params'] = $DatabaseQuery ->getParams($this-> auth ->hashUser());
        } else {
            $PageSettings['authUser'] = False;
        }

        $data = ['PageSettings' => $PageSettings,
            'GeneralSettings' => $GeneralSettings,
            'CategoryServices' => $CategoryServices,
            'Reviews' => $Reviews];

        $this -> view -> render('header', $data);
        $this -> view -> render('/review/body', $data);
        $this -> view -> render('footer');
    }

    public function addNewReview() {
        $params = $this -> request -> post;

        if(empty($params)){
            echo 'Не заполнены данные формы';
            exit();
        }

        $query = 'INSERT INTO reviews VALUES (NULL, :fromWhom, :description, :feedback, NULL, NULL)';

        $values = [':fromWhom' => $params['itemfromWhom'],
            ':description' => $params['itemdescription'],
            ':feedback' => $params['itemfeedback']];

        $this -> db -> query($query, $values);

        header('Location: /review');
    }

    /* Helpers */

    public function getReviews() {
        $query = 'SELECT * FROM `reviews` WHERE addToView = :item';

        $values = [':item' => 1];

        $resultQuery = $this -> db -> query($query, $values);

        return $resultQuery;
    }


}