<?php

namespace Vehsamrak\Vehsa;

/**
 * Template view renderer
 * @author Vehsamrak
 */
class Renderer
{

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

        extract($parameters);

        require_once(Config::get('root_directory') . '/View/' . $templateFileName);
    }
}
