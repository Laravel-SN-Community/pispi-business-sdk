<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Account;

use Saloon\Http\Request;

class AccountDetail extends Request
{
    protected $method = 'GET';

    public function __construct(private readonly string $numero) {}

    public function resolveEndpoint(): string
    {
        return '/comptes/' . $this->numero;
    }
}