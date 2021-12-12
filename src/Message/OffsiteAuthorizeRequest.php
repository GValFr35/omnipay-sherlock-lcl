<?php
namespace Omnipay\Sherlock\Message;

use Omnipay\Sherlock\Message\AbstractRequest;

/**
 * Sherlock Authorize Request
 */
class OffsiteAuthorizeRequest extends OffsiteAbstractRequest
{

    /**
     * Endpoint is the remote url.
     *
     * @var string
     */
    public $testEndpoint = 'https://sherlocks-payment-webinit-simu.secure.lcl.fr/paymentInit';

    public $liveEndpoint = 'https://sherlocks-payment-webinit.secure.lcl.fr/paymentInit';

    /**
     * sendData function. In this case, where the browser is to be directly it constructs and returns a response object
     * @param mixed $data
     * @return \Omnipay\Common\Message\ResponseInterface|OffsiteAuthorizeResponse
     */
    public function sendData($data)
    {
        return $this->response = new OffsiteAuthorizeResponse($this, $data, $this->getEndpoint());
    }

    /**
     * Get an array of the required fields for the core gateway
     * @return array
     */
    public function getRequiredCoreFields()
    {
        return array
        (
            'amount',
            'currency',
        );
    }

    /**
     * get an array of the required 'card' fields (personal information fields)
     * @return array
     */
    public function getRequiredCardFields()
    {
        return array
        (
            'email',
        );
    }

    /**
     * Map Omnipay normalised fields to gateway defined fields. If the order the fields are
     * passed to the gateway matters you should order them correctly here
     *
     * @return array
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getTransactionData()
    {
        $params = array(
            'amount' => $this->getAmountInteger(),
            'currencyCode' => $this->getCurrencyNumeric(),
            'keyVersion' => $this->getKeyVersion(),
            'merchantId' => $this->getMerchantID(),
            'automaticResponseUrl' => $this->getNotifyUrl(),
            'normalReturnUrl'=> $this->getReturnUrl(),
            'transactionReference' => $this->getTransactionId(),
        );
        

        if ($this->getS10TransactionRef()) {
            $params['s10TransactionReference.s10TransactionId'] = $params['transactionReference'];
            $params['s10TransactionReference.s10transactionIdDate'] = date('Ymd');
            unset($params['transactionReference']);
        }
            
        return array(
            'data' => $params
        );
    }

    /**
     * @return array
     * Get data that is common to all requests - generally aut
     */
    public function getBaseData()
    {
        return array(
            'type' => $this->getTransactionType(),
            'merchant_id' => $this->getMerchantID(),
            'secret_key' => $this->getSecretKey(),
        );
    }

    /**
     * this is the url provided by your payment processor. Github is standing in for the real url here
    * @return string
    */
    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    public function getTransactionType()
    {
        return 'Authorize';
    }
}
