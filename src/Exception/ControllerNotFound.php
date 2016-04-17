<?php

namespace Vehsamrak\Vehsa\Exception;

/**
 * Exception: Controller not found
 * @author Vehsamrak
 */
class ControllerNotFound extends \Exception
{

    /** @inheritdoc */
    public function __construct()
    {
        parent::__construct('', 404);
    }

}
