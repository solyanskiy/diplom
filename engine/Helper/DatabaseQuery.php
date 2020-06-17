<?php

namespace Engine\Helper;

use Engine\Controller;
use Engine\DI\DI;
// Общие функции, которые используются в разных контроллерах, в ExtraOptions можно добавлять ключи для более гибкого изменения кода
class DatabaseQuery extends Controller
{
    public function __construct(DI $di)
    {
       parent::__construct($di);
    }

    public function getGeneralSettings($ExtraOptions = [])
    {
        $query = 'SELECT * FROM `generalsettings`';

        $resultQuery = $this -> db -> query($query);

        $sortResult = array();

        foreach ($resultQuery as $Setting) {

            $sortResult[$Setting['keySetting']] = $Setting['value'];

        }

        return $sortResult;
    }

    public function getDirectoryPath($ExtraOptions = [])
    {
        $query = ' SELECT * FROM `directoryservices` WHERE activity = 1';

        if(empty($ExtraOptions) == false){
            if (array_key_exists('id', $ExtraOptions)) {
                $query = $query . ' AND category = ' . $ExtraOptions['id'];
            }
        }

        $resultQuery = $this -> db -> query($query);

        return $resultQuery;
    }

    /**
     * @return mixed
     */
    public function getCategoryServices($ExtraOptions = []) {
        $query = 'SELECT * FROM `directoryservicescategory`';

        $GetWithId = False;

        if(empty($ExtraOptions) == false){
            if (array_key_exists('id', $ExtraOptions)) {
                $query = $query . ' WHERE id = ' . $ExtraOptions['id'];
                $GetWithId = True;
            }
        }

        if(empty($ExtraOptions) == false) {
            if (array_key_exists('name', $ExtraOptions)){
                $query = $query . ' WHERE name = ' . $ExtraOptions['name'];
                $GetWithName = True;
            }
        }

        $resultQuery = $this -> db -> query($query);

        if ($GetWithId) {
            return $resultQuery[0];
        }

        if ($GetWithName) {
            return $resultQuery[0];
        }

        return $resultQuery;
    }

    public function getDirectoryPathByCategory($id, $ExtraOptions = [])
    {
        $query = 'SELECT * FROM `directoryservices` WHERE category = ' . $id ;

        $resultQuery = $this -> db -> query($query);

        return $resultQuery;
    }

    public function getCategoryData($id)
    {
        $query = 'SELECT * FROM `directoryservicescategory` WHERE id = ' . $id;

        $resultQuery = $this -> db -> query($query);

        return $resultQuery[0];
    }

    public function getDescriptionService($ExtraOptions = []) {
        $query = 'SELECT * FROM `services` WHERE directoryservices = ' . $ExtraOptions['id'];

        $resultQuery = $this -> db -> query($query);

        return $resultQuery[0];
    }

    public function getServiceById($ExtraOptions = []) {
        $query = 'SELECT * FROM `directoryservices` WHERE id = ' . $ExtraOptions['id'];

        $resultQuery = $this -> db -> query($query);

        return $resultQuery[0];
    }

    public function getParams($hash) {
        $value = [':hash' => $hash];

        $query = 'SELECT * FROM `user` WHERE hash = :hash ';
        $resultQuery = $this -> db -> query($query , $value);

        if ($resultQuery[0]['email'] == "user@user.com") {
            return true;
        }else {
                return false;
            }

    }
}