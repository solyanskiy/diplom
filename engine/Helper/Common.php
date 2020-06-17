<?php


namespace Engine\Helper;


/**
 * Class Common
 * @package Engine\Helper
 */
class Common
{
    /**
     * @return bool
     * Проверяем метод передачи.
     */
    public function isPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public static function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return bool|mixed|string
     */
    public static function getPathUri()
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if ($position = strpos($pathUrl, '?')) {
            $pathUrl = substr($pathUrl, 0, $position);
        }

        return $pathUrl;
    }
}