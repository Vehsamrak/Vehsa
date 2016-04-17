<?php

namespace Vehsamrak\Vehsa\Exception;

/**
 * Exception: Controller action not found
 * @author Vehsamrak
 */
class ActionNotFound extends \Exception
{

    /** @inheritdoc */
    public function __construct()
    {
        parent::__construct('', 404);
    }
}
