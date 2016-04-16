<?php

namespace Vehsamrak\Vehsa;

use Vehsamrak\Vehsa\Exception\ActionNotFound;

/**
 * Abstract controller. Extend this class to make your controllers.
 * @author Vehsamrak
 */
abstract class AbstractController
{

    /** @var Renderer */
    private $renderer;

    /** @inheritdoc */
    public function __construct()
    {
        $this->renderer = new Renderer();
    }


    /**
     * Processing controller action
     * @param string|null $actionName
     * @return mixed
     * @throws ActionNotFound
     */
    public final function processAction($actionName)
    {
        $actionName = ($actionName ?? 'index') . 'Action';

        if (method_exists(static::class, $actionName) && is_callable([static::class, $actionName])) {
            return static::$actionName();
        } else {
            throw new ActionNotFound();
        }
    }

    /**
     * Template rendering
     * @param string $template
     * @param array  $parameters
     */
    public function render($template = 'index', array $parameters = [])
    {
        $this->renderer->render($template, $parameters);
    }

    /**
     * @return array Post array
     */
    public function getPost(): array
    {
        return $_POST;
    }
}
