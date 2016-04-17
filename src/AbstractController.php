<?php

namespace Vehsamrak\Vehsa;

use Vehsamrak\Vehsa\Exception\ActionNotFound;

/**
 * Abstract controller. Extend this class to make your controllers.
 * @author Vehsamrak
 */
abstract class AbstractController
{

    const HTTP_METHOD_POST = 'POST';
    const HTTP_METHOD_GET = 'GET';

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

    /**
     * Get POST parameter by name. Returns null if parameter was not received
     * @param string $parameterName
     * @return mixed|null
     */
    public function getParameter(string $parameterName)
    {
        return $this->getPost()[$parameterName] ?? null;
    }

    /**
     * Check request method
     * @param string $method
     * @return bool
     */
    public function isRequestMethod(string $method)
    {
        return $_SERVER['REQUEST_METHOD'] === $method;
    }

    /**
     * @return bool
     */
    public function isPost()
    {
        return $this->isRequestMethod(self::HTTP_METHOD_POST);
    }

    /**
     * @return bool
     */
    public function isGet()
    {
        return $this->isRequestMethod(self::HTTP_METHOD_GET);
    }
}
