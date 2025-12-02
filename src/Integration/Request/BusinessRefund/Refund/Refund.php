<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessRefund\Refund;

use Saloon\Http\Request;

class Refund extends Request
{
    protected $method = 'PUT';

    public function __construct(private readonly string $end2endId) {}

    public function resolveEndpoint(): string
    {
        return '/paiements/'.$this->end2endId.'/retours';
    }
}
