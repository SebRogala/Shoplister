<?php

namespace App\Application;

class CommandBus
{
    public function handle($command)
    {
        $commandReflection = new \ReflectionClass($command);

        $handlerClassName = sprintf(
            '%sHandler',
            $commandReflection->getName()
        );

        return (new $handlerClassName())->handle($command);
    }
}
