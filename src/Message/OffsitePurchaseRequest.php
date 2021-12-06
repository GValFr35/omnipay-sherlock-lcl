<?php
namespace Omnipay\Sherlock\Message;

/**
 * Purchase Request
 */
class OffsitePurchaseRequest extends OffsiteAuthorizeRequest
{
    public function getTransactionType()
    {
        return 'sale';
    }
}
