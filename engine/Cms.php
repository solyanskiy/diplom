<?php

namespace Engine {

    use Engine\Core\Router\DispatchedRoute;
    use Engine\Helper\Common;

    /**
     * Class cms
     * @package Engine
     * Точка запуска приложения. Загружает требуемые модули.
     */
    class Cms
    {
        /**
         * @var
         * Содержит все зависимости.
         */
        private $di;

        /**
         * @var
         */
        public $router;

        /**
         * cms constructor.
         * @param $di
         */
        public function __construct($di)
        {
            $this -> di = $di;
            $this -> router = $this -> di -> get('router');
        }

        /**
         *
         */
        public function run()
        {
            try {
                require_once __DIR__ . '/../' . mb_strtolower(ENV) . '/Route.php';

                $routerDispatch = $this -> router -> dispatch(Common ::getMethod(), Common ::getPathUri());

                if ($routerDispatch == null) {
                    $routerDispatch = new DispatchedRoute('ErrorController:page404');
                }

                list($class, $action) = explode(':', $routerDispatch -> getController(), 2);

                $controller = '\\' . ENV . '\\Controller\\' . $class;

                $parameters = $routerDispatch -> getParameters();

                call_user_func_array([new $controller($this -> di), $action], $parameters);
            } catch (\Exception $exception) {
                $exception -> getMessage();
                exit;
            }
        }
    }
}