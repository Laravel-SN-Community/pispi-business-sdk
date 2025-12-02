<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments;

use Saloon\Http\Request;
use PispiBusiness\PispiBusiness\Enums\PaymentRequestStatus;
use PispiBusiness\PispiBusiness\Enums\PaymentRequestCategory;

class PaymentList extends Request
{
    protected $method = 'GET';

    public function __construct(
        private readonly ?string $payeAlias = null, 
        private readonly ?string $payeCompte = null, 
        private readonly ?string $payeurAlias = null, 
        private readonly ?string $payeurCompte = null,
        private readonly ?string $dateEnvoi = null,
        private readonly ?string $dateIrrevocabilite = null,
        private readonly ?PaymentRequestStatus $status = null,
        private readonly ?PaymentRequestCategory $category = null,
        private readonly ?int $montantAchat = null,
        private readonly ?int $montantRetrait = null,
        private readonly ?string $motif = null,
        private readonly ?string $refDocType = null,
        private readonly ?string $instructionId = null,
        private readonly ?string $txId = null,
        private readonly ?string $annulationStatus = null,
        private readonly ?string $annulationMotif = null,
        private readonly ?string $retourStatus = null,
        private readonly ?string $size = null,
        private readonly ?string $sort = null,
    ){}

    public function resolveEndpoint(): string
    {
        return '/paiements';
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

            if ($this->payeurAlias) {
                $query['payeurAlias'] = $this->payeurAlias;
            }

            if ($this->payeurCompte) {
                $query['payeurCompte'] = $this->payeurCompte;
            }
            
            if ($this->dateEnvoi) {
                $query['dateEnvoi'] = $this->dateEnvoi;
            }

            if ($this->dateIrrevocabilite) {
                $query['dateIrrevocabilite'] = $this->dateIrrevocabilite;
            }
            
            if ($this->status) {
                $query['status'] = $this->status->value;
            }

            if ($this->category) {
                $query['category'] = $this->category->value;
            }
            
            if ($this->montantAchat) {
                $query['montantAchat'] = $this->montantAchat;
            }

            if ($this->montantRetrait) {
                $query['montantRetrait'] = $this->montantRetrait;
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

            if ($this->txId) {
                $query['txId'] = $this->txId;
            }

            if ($this->annulationStatus) {
                $query['annulationStatus'] = $this->annulationStatus;
            }
            
            if ($this->annulationMotif) {
                $query['annulationMotif'] = $this->annulationMotif;
            }

            if ($this->retourStatus) {
                $query['retourStatus'] = $this->retourStatus;
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