<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessRefund\CancellationRequest;

use Saloon\Http\Request;

class CreatePaymentCancellationRequest extends Request
{
    protected $method = 'POST';

    public function __construct(private readonly string $end2endId, private readonly string $raison) {}

    public function resolveEndpoint(): string
    {
        return '/paiements/'.$this->end2endId.'/annulations';
    }

    protected function defaultBody(): array
    {
        return [
            'raison' => $this->raison,
        ];
    }
}
