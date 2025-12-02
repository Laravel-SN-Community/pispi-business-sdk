<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessRefund\CancellationRequest;

use Saloon\Http\Request;

class RespondToCancellationRequest extends Request
{
    protected $method = 'PUT';

    public function __construct(private readonly string $end2endId, private readonly bool $decision) {}

    public function resolveEndpoint(): string
    {
        return '/paiements/'.$this->end2endId.'/annulations/responses';
    }

    protected function defaultBody(): array
    {
        return [
            'decision' => $this->decision,
        ];
    }
}
