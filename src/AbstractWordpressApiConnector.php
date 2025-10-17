<?php

namespace Francoisvaillant\WordpressApiBundle;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class AbstractWordpressApiConnector
{

    protected HttpClientInterface $client;

    public function __construct(protected string $baseUrl)
    {
        $this->baseUrl = $baseUrl . WordpressApiRoute::SUFFIX;
        $this->client = HttpClient::create();
    }

    abstract public function get();


}
