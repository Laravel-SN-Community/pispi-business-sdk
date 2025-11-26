<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\Account;

use Saloon\Http\Request;

class IntraCompteTransfert extends Request
{
    protected $method = 'POST';

    public function __construct(
        private readonly string $txId,
        private readonly string $montant,
        private readonly ?string $motif,
        private readonly string $payeurNum,
        private readonly string $payeNumero,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/comptes/transactions';
    }

    protected function defaultBody(): array
    {
        $body = [
            'txId' => $this->txId,
            'montant' => $this->montant,
            'payeurNum' => $this->payeurNum,
            'payeNumero' => $this->payeNumero,
        ];

        if ($this->motif) {
            $body['motif'] = $this->motif;
        }

        return $body;
    }
}
