<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest;

use PispiBusiness\PispiBusiness\Enums\PaymentRequestCategory;
use PispiBusiness\PispiBusiness\Enums\PaymentRequestStatus;
use Saloon\Http\Request;

class PaymentRequestList extends Request
{
    protected $method = 'GET';

    public function __construct(
        private readonly ?string $payeAlias = null,
        private readonly ?string $payeCompte = null,
        private readonly ?string $dateEnvoi = null,
        private readonly ?string $dateLimitePaiement = null,
        private readonly ?PaymentRequestStatus $status = null,
        private readonly ?PaymentRequestCategory $category = null,
        private readonly ?string $payeurAlias = null,
        private readonly ?string $payeurCompte = null,
        private readonly ?int $montantAchat = null,
        private readonly ?int $montantRetrait = null,
        private readonly ?bool $debitDiffere = null,
        private readonly ?bool $remise = null,
        private readonly ?string $motif = null,
        private readonly ?string $refDocType = null,
        private readonly ?string $instructionId = null,
        private readonly ?string $size = null,
        private readonly ?string $sort = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/demandes-paiements';
    }

    protected function defaultQuery(): array
    {
        $query = [];

        if ($this->payeAlias) {
            $query['payeAlias'] = $this->payeAlias;
        }

        if ($this->payeCompte) {
            $query['payeCompte'] = $this->payeCompte;
        }

        if ($this->dateEnvoi) {
            $query['dateEnvoi'] = $this->dateEnvoi;
        }

        if ($this->dateLimitePaiement) {
            $query['dateLimitePaiement'] = $this->dateLimitePaiement;
        }

        if ($this->status) {
            $query['status'] = $this->status->value;
        }

        if ($this->category) {
            $query['category'] = $this->category->value;
        }

        if ($this->payeurAlias) {
            $query['payeurAlias'] = $this->payeurAlias;
        }

        if ($this->payeurCompte) {
            $query['payeurCompte'] = $this->payeurCompte;
        }

        if ($this->montantAchat) {
            $query['montantAchat'] = $this->montantAchat;
        }

        if ($this->montantRetrait) {
            $query['montantRetrait'] = $this->montantRetrait;
        }

        if ($this->debitDiffere) {
            $query['debitDiffere'] = $this->debitDiffere;
        }

        if ($this->remise) {
            $query['remise'] = $this->remise;
        }

        if ($this->motif) {
            $query['motif'] = $this->motif;
        }

        if ($this->refDocType) {
            $query['refDocType'] = $this->refDocType;
        }

        if ($this->instructionId) {
            $query['instructionId'] = $this->instructionId;
        }

        if ($this->size) {
            $query['size'] = $this->size;
        }

        if ($this->sort) {
            $query['sort'] = $this->sort;
        }

        return $query;
    }
}
