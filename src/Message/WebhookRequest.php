<?php
/**
 * Created by FES VPN.
 * @project omnipay-paydash
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    6/11/2021
 * @time    11:07 AM
 */

namespace Omnipay\Paydash\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;

class WebhookRequest extends AbstractRequest {

	public function getPaymentId() {
		return $this->getParameter('paymentID');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setPaymentId($value) {
		return $this->setParameter('paymentID', $value);
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->getParameter('email');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setEmail($value) {
		return $this->setParameter('email', $value);
	}

	/**
	 * @return mixed|string
	 */
	public function getAmount() {
		return $this->getParameter('amount');
	}

	/**
	 * @param string|null $value
	 *
	 * @return WebhookRequest
	 */
	public function setAmount($value) {
		return $this->setParameter('amount', $value);
	}

	/**
	 * @return mixed
	 */
	public function getIncome() {
		return $this->getParameter('income');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setIncome($value) {
		return $this->setParameter('income', $value);
	}

	/**
	 * @return mixed
	 */
	public function getFees() {
		return $this->getParameter('fees');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setFees($value) {
		return $this->setParameter('fees', $value);
	}

	/**
	 * @return mixed
	 */
	public function getDateCreated() {
		return $this->getParameter('dateCreated');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setDateCreated($value) {
		return $this->setParameter('dateCreated', $value);
	}

	/**
	 * @return mixed
	 */
	public function getDatePaid() {
		return $this->getParameter('datePaid');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setDatePaid($value) {
		return $this->setParameter('datePaid', $value);
	}

	/**
	 * @return mixed
	 */
	public function getDateAvailable() {
		return $this->getParameter('dateAvailable');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setDateAvailable($value) {
		return $this->setParameter('dateAvailable', $value);
	}

	/**
	 * @return mixed
	 */
	public function getMetadata() {
		return $this->getParameter('metadata');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setMetadata($value) {
		return $this->setParameter('metadata', $value);
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->getParameter('status');
	}

	/**
	 * @param $value
	 *
	 * @return WebhookRequest
	 */
	public function setStatus($value) {
		return $this->setParameter('status', $value);
	}

	/**
	 * @return array
	 * @throws InvalidRequestException
	 */
	public function getData() {
		$this->validate('paymentID', 'email', 'amount', 'income', 'fees', 'dateCreated', 'datePaid', 'dateAvailable', 'status');
		return [
			'paymentID'     => $this->getPaymentId(),
			'email'         => $this->getEmail(),
			'amount'        => $this->getAmount(),
			'income'        => $this->getIncome(),
			'fees'          => $this->getFees(),
			'dateCreated'   => $this->getDateCreated(),
			'datePaid'      => $this->getDatePaid(),
			'dateAvailable' => $this->getDateAvailable(),
			'metadata'      => $this->getMetadata(),
			'status'        => $this->getStatus(),
		];
	}

	/**
	 * @param mixed $data
	 *
	 * @return WebhookResponse
	 */
	public function sendData($data) {
		return new WebhookResponse($this, $data);
	}
}
