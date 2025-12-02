<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments\BulkPayments;

use Saloon\Http\Request;

class CreateBulkPayment extends Request
{
    protected $method = 'POST';

    public function __construct(
        private readonly string $instructionId,
        private readonly string $payeurAlias,
        private readonly array $transactions,
        private readonly bool $confirmation,
        private readonly ?string $motif = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/paiements-groupes';
    }

    protected function defaultBody(): array
    {
        $body = [
            'payeurAlias' => $this->payeurAlias,
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
