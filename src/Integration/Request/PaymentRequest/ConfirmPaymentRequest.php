<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest;

use Saloon\Http\Request;

class ConfirmPaymentRequest extends Request
{
    protected $method = 'PUT';

    public function __construct(private readonly string $txId, private readonly bool $decision) {}

    public function resolveEndpoint(): string
    {
        return '/demandes-paiements/'.$this->txId.'/confirmations';
    }

    protected function defaultBody(): array
    {
        return [
            'decision' => $this->decision,
        ];
    }
}
