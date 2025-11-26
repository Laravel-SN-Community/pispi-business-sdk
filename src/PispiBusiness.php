<?php

namespace PispiBusiness\PispiBusiness;

use PispiBusiness\PispiBusiness\Integration\PiBusnessConnector;
use PispiBusiness\PispiBusiness\Integration\Request\Account\AccountDetail;
use PispiBusiness\PispiBusiness\Integration\Request\Account\AccountList;
use PispiBusiness\PispiBusiness\Integration\Request\Account\IntraAcccountTransfertList;
use PispiBusiness\PispiBusiness\Integration\Request\Account\IntraCompteTransfert;

class PispiBusiness
{
    public function __construct(protected PiBusnessConnector $connector) {}

    public function getAccountList()
    {
        $response = $this->connector->send(new AccountList);

        return $response->json();
    }

    public function getAccountDetail(string $numero)
    {
        $response = $this->connector->send(new AccountDetail($numero));

        return $response->json();
    }

    public function getIntraAccountTransfertList()
    {
        $response = $this->connector->send(new IntraAcccountTransfertList);

        return $response->json();
    }

    public function createIntraAccountTransfert(string $txId, string $montant, ?string $motif, string $payeurNum, string $payeNumero)
    {
        $response = $this->connector->send(new IntraCompteTransfert($txId, $montant, $motif ?? null, $payeurNum, $payeNumero));

        return $response->json();
    }
}
