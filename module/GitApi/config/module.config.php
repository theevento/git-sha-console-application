<?php

namespace GitApi;

use GitApi\Factory\GitApiRepositoryFactory;
use GitApi\Factory\GitApiServiceFactory;
use GitApi\Repository\GitApiRepository;
use GitApi\Service\GitApiService;

return [
    'service_manager' => [
        'factories' => [
            GitApiRepository::class => GitApiRepositoryFactory::class,
            GitApiService::class => GitApiServiceFactory::class
        ]
    ],
];
