<?php

namespace Application;

use Application\Controller\GitConsoleController;
use Application\Factory\GitConsoleControllerFactory;

return [
    'controllers' => [
        'factories' => [
            GitConsoleController::class => GitConsoleControllerFactory::class
        ]
    ],
    'console' => [
        'router' => [
            'routes' => [
                'git-api' => [
                    'options' => [
                        'route'    => 'git [<repository>] [<branch>] [--service=]',
                        'defaults' => [
                            'controller' => GitConsoleController::class,
                            'action'     => 'api',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
