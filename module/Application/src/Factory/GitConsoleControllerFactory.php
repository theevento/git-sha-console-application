<?php

namespace Application\Factory;

use Application\Controller\GitConsoleController;
use GitApi\Service\GitApiService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class GitConsoleControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new GitConsoleController(
            $container->get(GitApiService::class)
        );
    }
}