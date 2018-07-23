<?php

namespace Vehsamrak\Vehsa\Exception;

/**
 * Exception: Database error occured
 */
class DatabaseError extends \Exception
{

    /** @inheritdoc */
    public function __construct($errorNumber, $errorString)
    {
        parent::__construct(
            sprintf(
                'Database error: (%s) %s',
                $errorNumber,
                $errorString
            )
        );
    }
}
