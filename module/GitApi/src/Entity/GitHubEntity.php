<?php


namespace GitApi\Entity;


use GitApi\Entity\Interfaces\GitApiInterface;

class GitHubEntity implements GitApiInterface
{
    const GITHUB = 'github';

    /**
     * @var string
     */
    private $owner;

    /**
     * @var string
     */
    private $repo;

    /**
     * @var string
     */
    private $branch;

    /**
     * GitHubEntity constructor.
     * @param string $owner
     * @param string $repo
     * @param string $branch
     */
    public function __construct(string $owner, string $repo, string $branch)
    {
        $this->setOwner($owner);
        $this->setRepo($repo);
        $this->setBranch($branch);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getApiUrl(): string
    {
        $owner = $this->getOwner();
        $repo = $this->getRepo();
        $branch = $this->getBranch();

        return sprintf('https://api.github.com/repos/%s/%s/commits/%s', $owner, $repo, $branch);
    }

    /**
     * @return string
     */
    public function getRequestType(): string
    {
        return GitApiInterface::TYPE_GET;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getRepo(): string
    {
        return $this->repo;
    }

    /**
     * @param string $repo
     */
    public function setRepo(string $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner(string $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getBranch(): string
    {
        return $this->branch;
    }

    /**
     * @param string $branch
     */
    public function setBranch(string $branch)
    {
        $this->branch = $branch;
    }
}