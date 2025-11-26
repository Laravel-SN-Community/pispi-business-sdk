<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Account;

use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class IntraAcccountTransfertList extends Request implements Paginatable
{
    protected $method = 'GET';

    public function resolveEndpoint(): string
    {
        return '/comptes/transactions';
    }
}
