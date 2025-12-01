<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest;

use PispiBusiness\PispiBusiness\Enums\PaymentRequestCategory;
use PispiBusiness\PispiBusiness\Enums\RefDocType;
use Saloon\Http\Request;

class CreatePicashPaymentRequest extends Request
{
    protected $method = 'POST';

    public function __construct(
        private readonly string $txId,
        private readonly bool $confirmation,
        private readonly PaymentRequestCategory $category,
        private readonly string $payeurAlias,
        private readonly string $payeAlias,
        private readonly int $montant,
        private readonly int $montantRetrait,
        private readonly int $montantFrais,
        private readonly ?string $motif = null,
        private readonly ?string $logoUrl = null,
        private readonly ?string $refDocNumero = null,
        private readonly ?RefDocType $refDocType = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/demandes-paiements';
    }

    protected function defaultBody(): array
    {
        $body = [
            'txId' => $this->txId,
            'confirmation' => $this->confirmation,
            'category' => $this->category->value,
            'payeurAlias' => $this->payeurAlias,
            'payeAlias' => $this->payeAlias,
            'montant' => $this->montant,
            'montantRetrait' => $this->montantRetrait,
            'montantFrais' => $this->montantFrais,
        ];

        if ($this->motif) {
            $body['motif'] = $this->motif;
        }

        if ($this->logoUrl) {
            $body['logoUrl'] = $this->logoUrl;
        }

        if ($this->refDocNumero) {
            $body['refDocNumero'] = $this->refDocNumero;
        }

        if ($this->refDocType) {
            $body['refDocType'] = $this->refDocType->value;
        }

        return $body;
    }
}
