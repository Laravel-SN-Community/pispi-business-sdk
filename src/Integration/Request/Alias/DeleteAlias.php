<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Alias;

use Saloon\Http\Request;

class DeleteAlias extends Request
{
    protected $method = 'DELETE';

    public function __construct(
        private readonly string $numero,
        private readonly string $cle
    ) {}

    public function resolveEndpoint(): string
    {
        return '/comptes/' . $this->numero . '/aliases/' . $this->cle;
    }
}