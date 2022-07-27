<?php

namespace App\Application;

class QueryBus
{
    /** @var array */
    private array $queryHandlers = [];

    public function handle($query)
    {
        $className = (new \ReflectionClass($query))->getShortName();
        $className = sprintf('%sHandler', $className);
        $queryHandler = $this->queryHandlers[$className];

        return $queryHandler->handle($query);
    }

    public function register($queryHandler): void
    {
        $className = (new \ReflectionClass($queryHandler))->getShortName();
        $this->queryHandlers[$className] = $queryHandler;
    }
}
