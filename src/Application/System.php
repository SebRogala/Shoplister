<?php

namespace App\Application;

class System
{
    public function __construct(private CommandBus $commandBus, private QueryBus $queryBus)
    {
    }

    public function handle($command): void
    {
        $this->commandBus->handle($command);
    }

    public function query($query, string $queryDriver = null)
    {
        return $this->queryBus->handle($query, $queryDriver);
    }
}
