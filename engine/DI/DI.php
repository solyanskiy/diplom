<?php


namespace Engine\DI { //Создаем пространство имен, чтобы можно было обращаться к классу напрямую


    /**
     * Class DI
     * @package Engine\DI
     */
    class DI
    {
        /**
         * @var array
         * Контейнер, содержащий зависимости.
         */
        private $container = [];

        /**
         * @param $key
         * @param $value
         * @return $this
         * Устанавливает значения контейнера.
         */
        public function set($key, $value)
        {
            $this -> container[$key] = $value;

            return $this;
        }

        /**
         * @param $key
         * @return mixed
         * Получает значения по ключу.
         */
        public function get($key)
        { //Получаем значение по ключу
            return $this -> has($key);
        }

        /**
         * @param $key
         * @return bool
         * Проверяем, существует ли ключ в контейнере.
         * Если существует, тогда возвращает значение по ключу, иначе null.
         */
        public function has($key)
        {
            return isset($this -> container[$key]) ? $this -> container[$key] : null;
        }
    }
}