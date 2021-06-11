<?php

namespace Omnipay\Paydash\Message;

use GuzzleHttp\Exception\BadResponseException;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\ResponseInterface;

/**
 * Class PurchaseRequest
 * @package Omnipay\Byteseller\Message
 */
class PurchaseRequest extends AbstractRequest {

	protected $liveEndpoint = 'https://paydash.co.uk/api/merchant/create';

	/**
	 * @param $value
	 *
	 * @return PurchaseRequest
	 */
	public function setEmail($value) {
		return $this->setParameter('email', $value);
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->getParameter('email');
	}

	/**
	 * @param string|null $value
	 *
	 * @return PurchaseRequest
	 */
	public function setAmount($value) {
		return $this->setParameter('amount', $value);
	}

	/**
	 * @return mixed|string
	 */
	public function getAmount() {
		return $this->getParameter('amount');
	}

	/**
	 * @param $value
	 *
	 * @return PurchaseRequest
	 */
	public function setWebhookUrl($value) {
		return $this->setParameter('webhookURL', $value);
	}

	/**
	 * @return mixed
	 */
	public function getWebhookUrl() {
		return $this->getParameter('webhookURL');
	}

	/**
	 * @param string $value
	 *
	 * @return PurchaseRequest
	 */
	public function setReturnUrl($value) {
		return $this->setParameter('returnURL', $value);
	}

	/**
	 * @return mixed|string
	 */
	public function getReturnUrl() {
		return $this->getParameter('returnURL');
	}

	/**
	 * @param $value
	 *
	 * @return PurchaseRequest
	 */
	public function setMetadata($value) {
		return $this->setParameter('metadata', $value);
	}

	/**
	 * @return mixed
	 */
	public function getMetadata() {
		return $this->getParameter('metadata');
	}

	/**
	 * Get the raw data array for this message. The format of this varies from gateway to
	 * gateway, but will usually be either an associative array, or a SimpleXMLElement.
	 *
	 * @return mixed
	 * @throws InvalidRequestException
	 */
	public function getData() {
		$this->validate('email', 'amount', 'webhookURL', 'returnURL');
		return [
			'apiKey'     => $this->getParameter('apiKey'),
			'email'      => $this->getEmail(),
			'amount'     => $this->getAmount(),
			'webhookURL' => $this->getWebhookUrl(),
			'returnURL'  => $this->getReturnUrl(),
			'metadata'   => $this->getMetadata(),
		];
	}

	/**
	 * @param mixed $data
	 *
	 * @return PurchaseResponse|ResponseInterface
	 */
	public function sendData($data) {
		try {
			$response = $this->httpClient->request('POST', $this->liveEndpoint, [], json_encode($data));
		} catch (BadResponseException $e) {
			$response = $e->getResponse();
		}
		$result = json_decode($response->getBody()->getContents(), true);
		return new PurchaseResponse($this, $result);
	}
}
