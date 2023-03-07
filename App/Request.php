<?php

namespace App;

class Request
{
    private array $queries;

    public function __construct(array $server)
    {
        $rawQueries = explode('&', $server['QUERY_STRING']);

        foreach ($rawQueries as $query) {
            $queryParts = explode('=', $query);
            $this->queries[$queryParts[0]] = $queryParts[1] ?? '';
        }
    }

    public function getQuery(string $name): null|string
    {
        return $this->queries[$name] ?? null;
    }
}