<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments\BulkPayments;

use Saloon\Http\Request;

class ConfirmBulkPayment extends Request
{
    protected $method = 'PUT';

    public function __construct(private readonly string $instructionId, private readonly bool $decision) {}

    public function resolveEndpoint(): string
    {
        return '/paiements-groupes/'.$this->instructionId.'/confirmations';
    }

    protected function defaultBody(): array
    {
        return [
            'decision' => $this->decision,
        ];
    }
}
