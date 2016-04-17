<?php

namespace Vehsamrak\Vehsa;

/**
 * @author Vehsamrak
 */
class ErrorHandler
{
    /** @var Renderer */
    private $renderer;

    /** @inheritdoc */
    public function __construct()
    {
        $this->renderer = new Renderer();
    }

    /**
     * @param \Exception $exception
     */
    public function handle(\Exception $exception)
    {
        $this->renderer->renderException($exception);
    }
}
