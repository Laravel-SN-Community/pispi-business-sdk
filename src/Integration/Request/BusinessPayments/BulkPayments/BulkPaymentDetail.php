<?php

namespace PispiBusiness\PispiBusiness\Integration\Request\BusinessPayments\BulkPayments;

use PispiBusiness\PispiBusiness\Enums\PaymentRequestStatus;
use Saloon\Http\Request;

class BulkPaymentDetail extends Request
{
    protected $method = 'GET';

    public function __construct(private readonly string $instructionId, private readonly ?PaymentRequestStatus $status = null) {}

    public function resolveEndpoint(): string
    {
        return '/paiements-groupes/'.$this->instructionId;
    }

    protected function defaultQuery(): array
    {
        $query = [];
        if ($this->status) {
            $query['status'] = $this->status->value;
        }

        return $query;
    }
}
