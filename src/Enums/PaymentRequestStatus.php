<?php

namespace PispiBusiness\PispiBusiness\Enums;

enum PaymentRequestStatus: string
{
    case INITIE = 'INITIE';
    case ANNULE = 'ANNULE';
    case ENVOYE = 'ENVOYE';
    case IRREVOCABLE = 'IRREVOCABLE';
    case REJETE = 'REJETE';
}
