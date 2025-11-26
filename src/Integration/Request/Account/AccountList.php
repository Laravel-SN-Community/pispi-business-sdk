<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Account;

use Saloon\Http\Request;

class AccountList extends Request
{
    protected $method = 'GET';

    public function resolveEndpoint(): string
    {
        return '/comptes';
    }
}