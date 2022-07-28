<?php

namespace App\Application;

use Doctrine\DBAL\Connection;

class QueryBus
{
    public function __construct(private Connection $connection, private string $queryDriver)
    {
    }

    public function handle($query, string $queryDriver = null)
    {
        $queryDriver = $queryDriver ?? $this->queryDriver;
        $queryDriver = ucfirst(strtolower($queryDriver));

        $queryReflection = new \ReflectionClass($query);

        $queryName = $queryReflection->getShortName();
        $domainName = array_reverse(explode('\\', $queryReflection->getNamespaceName()))[0];

        $className = sprintf('App\Infrastructure\%s\Query\%s%s', $domainName, $queryDriver, $queryName);

        return new $className($this->connection);
    }
}
