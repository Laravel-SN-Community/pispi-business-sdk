<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Alias;

use PispiBusiness\PispiBusiness\Enums\AliasType;
use Saloon\Http\Request;

class CreateAlias extends Request
{
    protected $method = 'POST';

    public function __construct(
        private readonly string $numero,
        private readonly AliasType $type
    ) {}

    public function resolveEndpoint(): string
    {
        return '/comptes/' . $this->numero . '/aliases';
    }

    protected function defaultBody(): array
    {
        return [
            'type' => $this->type->value,
        ];
    }
}