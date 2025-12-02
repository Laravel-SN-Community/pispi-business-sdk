<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments;

use Saloon\Http\Request;

class VerifiedPayment extends Request
{
    protected $method = 'GET';

    public function __construct(private readonly string $end2endId) {}

    public function resolveEndpoint(): string
    {
        return '/paiements/'.$this->end2endId.'/status';
    }
}