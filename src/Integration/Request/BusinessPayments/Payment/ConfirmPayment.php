<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments\Payment;

use Saloon\Http\Request;

class ConfirmPayment extends Request
{
    protected $method = 'PUT';

    public function __construct(private readonly string $txId, private readonly bool $decision) {}

    public function resolveEndpoint(): string
    {
        return '/paiements/'.$this->txId.'/confirmations';
    }

    protected function defaultBody(): array
    {
        return [
            'decision' => $this->decision,
        ];
    }
}
