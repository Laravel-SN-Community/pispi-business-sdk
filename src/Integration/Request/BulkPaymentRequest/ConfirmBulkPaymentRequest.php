<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BulkPaymentRequest;

use Saloon\Http\Request;

class ConfirmBulkPaymentRequest extends Request
{
    protected $method = 'PUT';

    public function __construct(private readonly string $instructionId, private readonly bool $decision) {}

    public function resolveEndpoint(): string
    {
        return '/demandes-paiements-groupes/'.$this->instructionId.'/confirmations';
    }

    protected function defaultBody(): array
    {
        return [
            'decision' => $this->decision,
        ];
    }
}
