<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Enrollement;

use Saloon\Http\Request;

class SearchAlias extends Request
{
    protected $method = 'GET';

    public function __construct(private readonly string $cle) {}

    public function resolveEndpoint(): string
    {
        return '/aliases/'.$this->cle;
    }
}
