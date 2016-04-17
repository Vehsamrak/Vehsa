<?php

namespace Vehsamrak\Vehsa;

/**
 * Template view renderer
 * @author Vehsamrak
 */
class Renderer
{

    const VIEW_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'View';

    /**
     * Render view template.
     * Parameters are extracted for usage inside template.
     * @param string $template
     * @param array  $parameters
     */
    public function render($template, array $parameters = [])
    {
        if (is_array($template)) {
            $parameters = $template;
            $template = 'index';
        }

        $templateFileName = $template . '.php';

        $templatePath = join(
            DIRECTORY_SEPARATOR,
            [
                $this->getUserViewDirectory(),
                $templateFileName,
            ]
        );

        extract($parameters);

        require_once($templatePath);
    }

    /**
     * @param \Exception $exception
     * @throws Exception\ConfigParameterNotFound
     */
    public function renderException(\Exception $exception)
    {
        $templatePath = join(
            DIRECTORY_SEPARATOR,
            [
                $this->getUserViewDirectory(),
                'Errors',
                'exception.php',
            ]
        );

        if (!file_exists($templatePath)) {
            $templatePath = join(
                DIRECTORY_SEPARATOR,
                [
                    self::VIEW_PATH,
                    'exception.php',
                ]
            );
        }

        extract(['exception' => $exception]);

        require_once($templatePath);
    }

    /**
     * @return string
     */
    private function getUserViewDirectory()
    {
        return join(
            DIRECTORY_SEPARATOR,
            [
                Config::getUserRootDirectory(),
                'View',
            ]
        );
    }
}
