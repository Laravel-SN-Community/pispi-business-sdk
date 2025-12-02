<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPaymentsRequest\BulkPaymentRequest;

use Saloon\Http\Request;

class BulkPaymentRequestDetail extends Request
{
    protected $method = 'GET';

    public function __construct(private readonly string $instructionId) {}

    public function resolveEndpoint(): string
    {
        return '/demandes-paiements-groupes/'.$this->instructionId;
    }
}
