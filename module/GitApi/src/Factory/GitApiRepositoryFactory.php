<?php

namespace GitApi\Factory;

use GitApi\Repository\GitApiRepository;
use GuzzleHttp\Client;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class GitApiRepositoryFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new GitApiRepository(new Client());
    }
}