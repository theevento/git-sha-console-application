<?php


namespace GitApi\Factory;


use GitApi\Repository\GitApiRepository;
use GitApi\Service\GitApiService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class GitApiServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new GitApiService(
          $container->get(GitApiRepository::class)
        );
    }
}