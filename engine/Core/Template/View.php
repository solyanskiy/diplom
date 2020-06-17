<?php


namespace Engine\Core\Template;


use Engine\Core\Template\Theme;

/**
 * Class View
 * @package Engine\Core\Template
 */
class View
{
    protected $theme;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $this -> theme = new Theme();
    }

    /**
     * @param $template
     * @param array $vars
     * @throws \Exception
     */
    public function render($template, $vars = [])
    {
        $templatePath = $this -> getTemplatePath($template, ENV);

        if (!is_file($templatePath)) {
            throw new \InvalidArgumentException(sprintf('Тема не найдена!'));
        }

        $this -> theme -> setData($vars);
        extract($vars);

        ob_start();

        ob_implicit_flush(0);

        try {
            require $templatePath;
        } catch (\Exception $exception) {
            ob_end_clean();
            throw $exception;
        }
        echo ob_get_clean();
    }

    private function getTemplatePath($template, $env = null)
    {
        if ($env == 'Cms') {
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }

        return ROOT_DIR . '/View/' . $template . '.php';
    }
}