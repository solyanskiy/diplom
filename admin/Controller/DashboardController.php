<?php


namespace Admin\Controller;

class DashboardController extends AdminController
{
    public function index(){

        $this->view->render('/dashboard/header');
        $this->view->render('/dashboard/body');
        $this->view->render('/dashboard/footer');
    }


}