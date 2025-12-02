<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPaymentsRequest\PaymentRequest;

use Saloon\Http\Request;

class CheckPaymentRequest extends Request
{
    protected $method = 'GET';

    public function __construct(private readonly string $txId) {}

    public function resolveEndpoint(): string
    {
        return '/demandes-paiements/'.$this->txId;
    }
}
