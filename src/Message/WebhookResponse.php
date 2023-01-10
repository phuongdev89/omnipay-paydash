<?php
/**
 * @project omnipay-paydash
 * @author  Phuong Dev
 * @email   phuongdev89@gmail.com
 * @date    6/11/2021
 * @time    11:50 AM
 */

namespace Omnipay\Paydash\Message;

use Omnipay\Common\Message\AbstractResponse;

class WebhookResponse extends AbstractResponse
{

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * @return false
     */
    public function isRedirect()
    {
        return false;
    }

    /**
     * @return mixed
     */
    public function getPaymentId()
    {
        return $this->data['paymentID'];
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->data['email'];
    }

    /**
     * @return mixed|string
     */
    public function getAmount()
    {
        return $this->data['amount'];
    }

    /**
     * @return mixed
     */
    public function getIncome()
    {
        return $this->data['income'];
    }

    /**
     * @return mixed
     */
    public function getFees()
    {
        return $this->data['fees'];
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->data['dateCreated'];
    }

    /**
     * @return mixed
     */
    public function getDatePaid()
    {
        return $this->data['datePaid'];
    }

    /**
     * @return mixed
     */
    public function getDateAvailable()
    {
        return $this->data['dateAvailable'];
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->data['metadata'];
    }

    /**
     * @return bool
     */
    public function isSuccessful()
    {
        return $this->getStatus() == 'paid';
    }
}
