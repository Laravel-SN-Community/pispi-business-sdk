<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments;

use Saloon\Http\Request;

class PaymentDetail extends Request
{
    protected $method = 'GET';

    public function __construct(private readonly string $txId) {}

    public function resolveEndpoint(): string
    {
        return '/paiements/'.$this->txId;
    }
}