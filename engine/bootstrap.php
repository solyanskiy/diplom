<?php
require_once __DIR__ . '/../vendor/autoload.php'; //Подключаем автозагрузчик модулей.

use Engine\Cms;
use Engine\DI\DI;

try { //Код запуска приложения.

    $di = new DI(); //Создаем экземпляр класса.

    $services = require __DIR__ . '/Config/Service.php';

    foreach ($services as $service) { //Инициализируем сервисы
        $provider = new $service($di);
        $provider->init();
    }
    $cms = new Cms($di);
    $cms -> run();
} catch (\ErrorException $errorException) {
    echo $errorException -> getMessage(); //В случае ошибки - выводим текст ошибки.
}