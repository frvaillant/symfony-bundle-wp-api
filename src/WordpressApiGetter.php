<?php

namespace Francoisvaillant\WordpressApiBundle;

class WordpressApiGetter extends AbstractWordpressApiConnector
{

    private string $type = 'posts';
    private array $params = [];
    private string $sortBy = 'title';
    private string $sortOrder = 'asc';

    public function __construct(string $baseUrl)
    {
        parent::__construct($baseUrl);
    }

    public function queryBy(string $postType): static
    {
        $this->type = $postType;
        return $this;
    }

    public function sortBy(string $sortBy, string $sortOrder = 'ASC'): static
    {
        $this->sortBy    = $sortBy;
        $this->sortOrder = $sortOrder;
        return $this;
    }

    public function queryParams(array $params): static
    {
        $this->params = $params;
        return $this;
    }

    public function get()
    {
        $endpoint = $this->baseUrl . $this->type . '?' . http_build_query([
                ...$this->params,
                'orderby' => $this->sortBy,
                'order' => $this->sortOrder,
            ]);
        $response = $this->client->request('GET', $endpoint, []);
        dd(json_decode($response->getContent()));
    }
}
