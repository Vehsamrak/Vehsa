<?php

namespace Vehsamrak\Vehsa;

/**
 * Entity repository with database connection.
 * Extend this class to define entity repositories which maps database queries to domain objects
 * @author Vehsamrak
 */
abstract class AbstractRepository
{

    protected $connection;

    /** @inheritdoc */
    public final function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
}
