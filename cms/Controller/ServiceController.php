<?php


namespace Cms\Controller;

use Engine\Core\Auth\Auth;
use Engine\Helper\DatabaseQuery;
use ZipArchive;

class ServiceController extends HomeController
{
    public function render($id) {

        $DatabaseQuery = new DatabaseQuery($this->di);

        $ExtraOptions = ['id' => $id];

        $PageSettings = $DatabaseQuery -> getCategoryServices($ExtraOptions);   // getCategoryData
        $Service = $DatabaseQuery -> getServiceById($ExtraOptions);
        $GeneralSettings = $DatabaseQuery -> getGeneralSettings();
        $CategoryServices = $DatabaseQuery -> getCategoryServices();
        $DescriptionServices = $DatabaseQuery ->getDescriptionService($ExtraOptions);
        $PageSettings['name'] = $Service['name'];

        $this -> auth = new Auth();
        if ($this -> auth -> hashUser() !== null) {
            $PageSettings['authUser'] = True;
            $PageSettings['refactor'] = True;
        } else {
            $PageSettings['authUser'] = False;
            $PageSettings['refactor'] = False;
        }

        $data = [
            //'ServicesList' => $ServicesList,
            'Service' => $Service,
            'GeneralSettings' => $GeneralSettings,
            'PageSettings' => $PageSettings,
            'CategoryServices' => $CategoryServices,
            'DescriptionServices' => $DescriptionServices];

        $this -> view -> render('header', $data);
        $this -> view -> render('/service/body', $data);
        $this -> view -> render('footer');

    }

    public function refactor($id) {

        $DatabaseQuery = new DatabaseQuery($this->di);

        $ExtraOptions = ['id' => $id];

        $PageSettings = $DatabaseQuery -> getCategoryServices($ExtraOptions);   // getCategoryData
        $Service = $DatabaseQuery -> getServiceById($ExtraOptions);
        $GeneralSettings = $DatabaseQuery -> getGeneralSettings();
        $CategoryServices = $DatabaseQuery -> getCategoryServices();
        $DescriptionServices = $DatabaseQuery ->getDescriptionService($ExtraOptions);
        $PageSettings['name'] = 'Редактирование';

        $this -> auth = new Auth();
        if ($this -> auth -> hashUser() !== null) {
            $PageSettings['authUser'] = True;
            $PageSettings['refactor'] = False;
            $PageSettings['params'] = $DatabaseQuery ->getParams($this-> auth ->hashUser());
        } else {
            $PageSettings['authUser'] = False;
            $PageSettings['refactor'] = False;
        }

        $data = [
            //'ServicesList' => $ServicesList,
            'Service' => $Service,
            'GeneralSettings' => $GeneralSettings,
            'PageSettings' => $PageSettings,
            'CategoryServices' => $CategoryServices,
            'DescriptionServices' => $DescriptionServices];

        $this -> view -> render('header', $data);
        $this -> view -> render('/refactor/body', $data);
        $this -> view -> render('footer');
    }

    public function setChanges($name) {
        $params = $this -> request -> post;

        $this -> auth = new Auth();
        $localHash = $this -> auth -> hashUser();

        $userDirPath = $_SERVER['DOCUMENT_ROOT'] . '/tempusers/' . $localHash;

        if (is_dir($userDirPath)) {
            unlink($userDirPath. '/src.zip');
            rmdir($userDirPath);
        }

        mkdir($userDirPath);

        copy($_SERVER['DOCUMENT_ROOT'] . '/'. $params['path'] . '.7z', $userDirPath . '/' . 'src.zip');

        $ZipArch = new ZipArchive;



        if ($ZipArch->open($userDirPath . '/' . 'src.zip') === TRUE) {

            $ZipArch->extractTo($userDirPath . '/' . 'src/');
            $ZipArch->close();

        }

    }

}