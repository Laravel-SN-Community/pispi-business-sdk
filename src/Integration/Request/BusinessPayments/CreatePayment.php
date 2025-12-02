<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments;

use Saloon\Http\Request;
use PispiBusiness\PispiBusiness\Enums\RefDocType;

class CreatePayment extends Request
{
    protected $method = 'POST';

    public function __construct(
        private readonly string $txId,
        private readonly string $payeurAlias,
        private readonly string $payeAlias,
        private readonly int $montant,
        private readonly bool $confirmation,
        private readonly ?string $motif = null,
        private readonly ?string $refDocNumero = null,
        private readonly ?RefDocType $refDocType = null,
        private readonly ?bool $programme = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/paiements';
    }

    protected function defaultBody(): array
    {
        $body = [
            'txId' => $this->txId,
            'payeurAlias' => $this->payeurAlias,
            'payeAlias' => $this->payeAlias,
            'montant' => $this->montant,
            'confirmation' => $this->confirmation,
        ];

        if ($this->motif) {
            $body['motif'] = $this->motif;
        }

        if ($this->refDocNumero) {
            $body['refDocNumero'] = $this->refDocNumero;
        }

        if ($this->refDocType) {
            $body['refDocType'] = $this->refDocType->value;
        }

        if ($this->programme) {
            $body['programme'] = $this->programme;
        }

        return $body;
    }
}