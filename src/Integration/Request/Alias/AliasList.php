<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Alias;

use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class AliasList extends Request implements Paginatable
{
    protected $method = 'GET';

    public function __construct(private readonly string $numero) {}

    public function resolveEndpoint(): string
    {
        return '/comptes/'.$this->numero.'/aliases';
    }
}
