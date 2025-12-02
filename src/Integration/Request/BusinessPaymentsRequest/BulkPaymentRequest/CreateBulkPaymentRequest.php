<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPaymentsRequest\BulkPaymentRequest;

use Saloon\Http\Request;

class CreateBulkPaymentRequest extends Request
{
    protected $method = 'POST';

    public function __construct(
        private readonly string $payeAlias,
        private readonly string $instructionId,
        private readonly array $transactions,
        private readonly bool $confirmation,
        private readonly ?string $motif = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/demandes-paiements-groupes';
    }

    protected function defaultBody(): array
    {
        $body = [
            'payeAlias' => $this->payeAlias,
            'instructionId' => $this->instructionId,
            'transactions' => $this->transactions,
            'confirmation' => $this->confirmation,
        ];

        if ($this->motif) {
            $body['motif'] = $this->motif;
        }

        return $body;
    }
}
