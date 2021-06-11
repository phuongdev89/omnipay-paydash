<?php

namespace Omnipay\Paydash\Message;

use Omnipay\Common\Message\AbstractResponse;

/**
 * Response
 */
class PurchaseResponse extends AbstractResponse {

	/**
	 * @return bool
	 */
	public function isSuccessful() {
		return $this->getStatus() == 'success';
	}

	/**
	 * Does the response require a redirect?
	 *
	 * @return boolean
	 */
	public function isRedirect() {
		return true;
	}

	/**
	 * @return mixed|string
	 */
	public function getRedirectUrl() {
		return 'https://paydash.co.uk/checkout/' . $this->getResponse();
	}

	/**
	 * @return string success or fail
	 */
	public function getStatus() {
		return $this->data['status'];
	}

	/**
	 * @return mixed
	 */
	public function getResponse() {
		return $this->data['response'];
	}

	/**
	 * @return mixed|string|null
	 */
	public function getMessage() {
		if (!$this->isSuccessful()) {
			return $this->data['response'];
		}
		return 'OK';
	}

	/**
	 * Get the response data.
	 *
	 * @return mixed
	 */
	public function getData() {
		return $this->data;
	}
}
