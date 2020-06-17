<?php


namespace Engine\Core\Template;


/**
 * Class Theme
 * @package Engine\Core\Template
 */
class Theme
{
    /**
     * Правила для имени файла. Строго-типизированы.
     */
    const RULES_NAME_FILE = [
        'header' => 'header%s',
        'footer' => 'footer%s',
        'sidebar' => 'sidebar%s'
    ];

    //Ссылка на саму тему.
    /**
     * @var string
     */
    public $url = '';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @param string $name
     */
    public function header($name = null)
    {
        $name = (string)$name;
        $file = 'header';

        if ($name !== null) {
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }

        $this -> loadTemplateFile($file);
    }


    /**
     * @param string $name
     * @throws \Exception
     */
    public function footer($name = '')
    {
        $name = (string)$name;
        $file = 'footer';

        if ($name !== null) {
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }

        $this -> loadTemplateFile($file);
    }


    /**
     * @param string $name
     * @throws \Exception
     */
    public function sidebar($name = '')
    {
        $name = (string)$name;
        $file = 'sidebar';

        if ($name !== null) {
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }

        $this -> loadTemplateFile($file);
    }

    /**
     * @param string $name
     * @param array $data
     * @throws \Exception
     * Подключаем блоки страницы.
     */
    public function block($name = '', $data = [])
    {
        $name = (string)$name;

        if ($name !== null) {
            $this -> loadTemplateFile($name, $data);
        }
    }

    /**
     * @param $nameFile
     * @param array $data
     * @throws \Exception
     */
    private function loadTemplateFile($nameFile, $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';
        if (is_file($templateFile)) {
            extract($data);

            require_once $templateFile;
        } else {
            throw new \Exception(sprintf('Указанный файл %s не существует или не найден!', $templateFile));
        }
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this -> data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): void
    {
        $this -> data = $data;
    }
}