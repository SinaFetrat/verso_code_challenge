<?php

namespace App\CodeChallenge\Infrastructure;

use Symfony\Component\Console\Application;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ConsoleApplicationFactory
{
    public static function create(ContainerInterface $container): Application
    {
        $application = new Application();

        foreach ($container->findTaggedServiceIds('console.command') as $id => $tags) {
            $application->add($container->get($id));
        }

        return $application;
    }
}
