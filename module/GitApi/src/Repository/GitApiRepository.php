<?php


namespace GitApi\Repository;


use GitApi\Entity\Interfaces\GitApiInterface;
use GuzzleHttp\Client;

class GitApiRepository
{
    /**
     * @var Client
     */
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function sendRequest(GitApiInterface $gitApi)
    {
        $client = $this->client;

        $response = $client->request($gitApi->getRequestType(), $gitApi->getApiUrl(),[
            'headers' => $gitApi->getHeaders(),
            'form_params' => $gitApi->getData()
        ]);

        return json_decode($response->getBody(), true);
    }
}