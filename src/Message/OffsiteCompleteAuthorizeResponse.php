<?php
namespace Omnipay\Sherlock\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Sherlock\Message\OffsiteNotificationTrait;

/**
 * Complete Authorize Response
 */
class OffsiteCompleteAuthorizeResponse extends AbstractResponse
{
    use OffsiteNotificationTrait;

    public function __construct(\Omnipay\Common\Message\RequestInterface $request, $data)
    {
        parent::__construct($request, $data);
        $this->data = $data;
    }
}
