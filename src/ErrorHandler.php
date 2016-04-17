<?php

namespace Vehsamrak\Vehsa;

/**
 * @author Vehsamrak
 */
class ErrorHandler
{

    const VIEW_PATH = __DIR__ . DIRECTORY_SEPARATOR . 'View';
    
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

        $this->renderException($exception);
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
                Renderer::getUserViewDirectory(),
                'Errors',
                'error.php',
            ]
        );

        if (!file_exists($templatePath)) {
            $templatePath = join(
                DIRECTORY_SEPARATOR,
                [
                    self::VIEW_PATH,
                    'error.php',
                ]
            );
        }

        extract(['exception' => $exception]);

        $this->sendHeadersWithHttpCode($exception->getCode());

        require_once($templatePath);
    }

    /**
     * @param int $httpCode
     */
    private function sendHeadersWithHttpCode(int $httpCode)
    {
        $message = 'Internal Server Error';

        if ($httpCode === 404) {
            $message = 'Not Found';
        }

        header(sprintf('HTTP/1.1 %d %s', $httpCode, $message));
    }
}
