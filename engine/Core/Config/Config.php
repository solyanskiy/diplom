<?php


namespace Engine\Core\Config;


class Config
{
    public static function item($key, $group = 'main')
    {
        $groupItems = static ::file($group);

        return isset($groupItems[$key]) ? $groupItems[$key] : null;
    }

    public static function file($group)
    {
        $path = $_SERVER['DOCUMENT_ROOT'] . '/' . mb_strtolower(ENV) . '/Config/' . $group . '.php';

        if (file_exists($path)) {
            $items = require_once $path;

            if (!empty($items)) {
                return $items;
            } else {
                throw new \Exception(
                    sprintf('Невозможно преобразовать файл в массив %s', $path)
                );
            }
        } else {
            throw  new \Exception(
                sprintf('Файл конфигурации не найден! %s', $path)
            );
        }

        return false;
    }
}