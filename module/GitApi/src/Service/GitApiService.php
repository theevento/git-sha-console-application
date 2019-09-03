<?php

namespace GitApi\Service;

use GitApi\Entity\Interfaces\GitApiInterface;
use GitApi\Repository\GitApiRepository;

class GitApiService
{
    /**
     * @var GitApiRepository
     */
    private $gitApiRepository;

    public function __construct(GitApiRepository $gitApiRepository)
    {
        $this->gitApiRepository = $gitApiRepository;
    }

    public function sendRequest(GitApiInterface $gitApi)
    {
        return $this->gitApiRepository->sendRequest($gitApi);
    }
}