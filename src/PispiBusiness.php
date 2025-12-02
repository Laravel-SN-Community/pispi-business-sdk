<?php

namespace PispiBusiness\PispiBusiness;

use PispiBusiness\PispiBusiness\Enums\AliasType;
use PispiBusiness\PispiBusiness\Enums\PaymentRequestCategory;
use PispiBusiness\PispiBusiness\Enums\PaymentRequestStatus;
use PispiBusiness\PispiBusiness\Enums\RefDocType;
use PispiBusiness\PispiBusiness\Integration\PiBusnessConnector;
use PispiBusiness\PispiBusiness\Integration\Request\Account\AccountDetail;
use PispiBusiness\PispiBusiness\Integration\Request\Account\AccountList;
use PispiBusiness\PispiBusiness\Integration\Request\Account\IntraAcccountTransfertList;
use PispiBusiness\PispiBusiness\Integration\Request\Account\IntraCompteTransfert;
use PispiBusiness\PispiBusiness\Integration\Request\Alias\AliasList;
use PispiBusiness\PispiBusiness\Integration\Request\Alias\CreateAlias;
use PispiBusiness\PispiBusiness\Integration\Request\Alias\DeleteAlias;
use PispiBusiness\PispiBusiness\Integration\Request\Enrollement\SearchAlias;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\AcceptOrRejectPaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\CheckPaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\ConfirmPaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\PaymentRequestList;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreateBnplEcommercePaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreateBnplPaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreateImmediateEcommercePaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreateImmediateOnSitePaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreateInvoicePaymentWithDiscountRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreateInvoicePaymentWithoutDiscountRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreatePicashPaymentRequest;
use PispiBusiness\PispiBusiness\Integration\Request\PaymentRequest\SendPaymentRequest\CreatePicoPaymentRequest;

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

    public function getAliasList(string $numero)
    {
        $response = $this->connector->send(new AliasList($numero));

        return $response->json();
    }

    public function createAlias(string $numero, AliasType $type)
    {
        $response = $this->connector->send(new CreateAlias($numero, $type));

        return $response->json();
    }

    public function deleteAlias(string $numero, string $cle)
    {
        $response = $this->connector->send(new DeleteAlias($numero, $cle));

        return $response->json();
    }

    public function searchAlias(string $cle)
    {
        $response = $this->connector->send(new SearchAlias($cle));

        return $response->json();
    }

    public function getPaymentRequestList(
        ?string $payeAlias = null,
        ?string $payeCompte = null,
        ?string $dateEnvoi = null,
        ?string $dateLimitePaiement = null,
        ?PaymentRequestStatus $status = null,
        ?PaymentRequestCategory $category = null,
        ?string $payeurAlias = null,
        ?string $payeurCompte = null,
        ?int $montantAchat = null,
        ?int $montantRetrait = null,
        ?bool $debitDiffere = null,
        ?bool $remise = null,
        ?string $motif = null,
        ?string $refDocType = null,
        ?string $instructionId = null,
        ?string $size = null,
        ?string $sort = null,
    ) {
        $response = $this->connector->send(new PaymentRequestList(
            payeAlias: $payeAlias,
            payeCompte: $payeCompte,
            dateEnvoi: $dateEnvoi,
            dateLimitePaiement: $dateLimitePaiement,
            status: $status,
            category: $category,
            payeurAlias: $payeurAlias,
            payeurCompte: $payeurCompte,
            montantAchat: $montantAchat,
            montantRetrait: $montantRetrait,
            debitDiffere: $debitDiffere,
            remise: $remise,
            motif: $motif,
            refDocType: $refDocType,
            instructionId: $instructionId,
            size: $size,
            sort: $sort,
        ));

        return $response->json();
    }

    public function acceptOrRejectPaymentRequest(string $txId, bool $decision = true)
    {
        $response = $this->connector->send(new AcceptOrRejectPaymentRequest($txId, $decision));

        return $response->json();
    }

    public function confirmPaymentRequest(string $txId, bool $decision = true)
    {
        $response = $this->connector->send(new ConfirmPaymentRequest($txId, $decision));

        return $response->json();
    }

    public function checkPaymentRequest(string $txId)
    {
        $response = $this->connector->send(new CheckPaymentRequest($txId));

        return $response->json();
    }

    public function createBnplPaymentRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        bool $debitDiffere,
        array $remise,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreateBnplPaymentRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            debitDiffere: $debitDiffere,
            remise: $remise,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }

    public function createBnplEcommercePaymentRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        bool $debitDiffere,
        array $remise,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreateBnplEcommercePaymentRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            debitDiffere: $debitDiffere,
            remise: $remise,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }

    public function createImmediateEcommercePaymentRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        string $dateLimitePaiement,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreateImmediateEcommercePaymentRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            dateLimitePaiement: $dateLimitePaiement,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }

    public function createImmediateOnSitePaymentRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreateImmediateOnSitePaymentRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }

    public function createInvoicePaymentWithDiscountRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        string $dateLimitePaiement,
        string $dateLimiteReponse,
        array $remise,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreateInvoicePaymentWithDiscountRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            dateLimitePaiement: $dateLimitePaiement,
            dateLimiteReponse: $dateLimiteReponse,
            remise: $remise,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }

    public function createInvoicePaymentWithoutDiscountRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        string $dateLimitePaiement,
        ?string $dateLimiteReponse = null,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreateInvoicePaymentWithoutDiscountRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            dateLimitePaiement: $dateLimitePaiement,
            dateLimiteReponse: $dateLimiteReponse,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }

    public function createPicashPaymentRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        int $montantRetrait,
        int $montantFrais,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreatePicashPaymentRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            montantRetrait: $montantRetrait,
            montantFrais: $montantFrais,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }

    public function createPicoPaymentRequest(
        string $txId,
        bool $confirmation,
        PaymentRequestCategory $category,
        string $payeurAlias,
        string $payeAlias,
        int $montant,
        int $montantAchat,
        int $montantRetrait,
        int $montantFrais,
        ?string $motif = null,
        ?string $logoUrl = null,
        ?string $refDocNumero = null,
        ?RefDocType $refDocType = null,
    ) {
        $response = $this->connector->send(new CreatePicoPaymentRequest(
            txId: $txId,
            confirmation: $confirmation,
            category: $category,
            payeurAlias: $payeurAlias,
            payeAlias: $payeAlias,
            montant: $montant,
            montantAchat: $montantAchat,
            montantRetrait: $montantRetrait,
            montantFrais: $montantFrais,
            motif: $motif,
            logoUrl: $logoUrl,
            refDocNumero: $refDocNumero,
            refDocType: $refDocType,
        ));

        return $response->json();
    }
}
