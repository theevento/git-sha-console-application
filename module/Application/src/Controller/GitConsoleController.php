<?php

namespace Application\Controller;

use GitApi\Entity\GitHubEntity;
use GitApi\Service\GitApiService;
use GuzzleHttp\Exception\ClientException;
use Zend\Console\Adapter\AdapterInterface;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Console\Request as ConsoleRequest;
use RuntimeException;

class GitConsoleController extends AbstractActionController implements ConsoleBannerProviderInterface
{
    /**
     * @var GitApiService
     */
    private $gitApiService;

    public function __construct(GitApiService $gitApiService)
    {
        $this->gitApiService = $gitApiService;
    }

    public function apiAction()
    {
        $request = $this->getRequest();

        if (!$request instanceof ConsoleRequest) {
            throw new RuntimeException('You can only use this method from console');
        }

        $service = $request->getParam('service', GitHubEntity::GITHUB);
        $repository = explode('/', $request->getParam('repository', 'a/a'));
        $owner = $repository[0];
        $repository = $repository[1];
        $branch = $request->getParam('branch', '');

        switch ($service) {
            case GitHubEntity::GITHUB:
                try {
                    $result = $this->gitApiService->sendRequest(new GitHubEntity(
                        $owner, $repository, $branch
                    ));
                    return $result['sha'].PHP_EOL;
                } catch (ClientException $exception) {
                    $responseBody = json_decode($exception->getResponse()->getBody(true));
                    return $responseBody->message.PHP_EOL;
                }
                break;
            default:
                return 'Unknown service '.$service.PHP_EOL;
        }
    }

    /**
     * Returns a string containing a banner text, that describes the module and/or the application.
     * The banner is shown in the console window, when the user supplies invalid command-line parameters or invokes
     * the application with no parameters.
     *
     * The method is called with active Zend\Console\Adapter\AdapterInterface that can be used to directly access
     * Console and send output.
     *
     * @param AdapterInterface $console
     * @return string|null
     */
    public function getConsoleBanner(AdapterInterface $console)
    {
        return 'Git SHA console application';
    }
}