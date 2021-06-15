<?php
/**
 * Created by FES VPN.
 * @project omnipay-paydash
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    6/15/2021
 * @time    9:47 AM
 */

namespace Omnipay\Paydash\Message;

use Omnipay\Common\Message\AbstractResponse;

class StatusResponse extends AbstractResponse {

	/**
	 * @return mixed
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
		return $this->getResponse();
	}

	/**
	 * @return bool
	 */
	public function isSuccessful() {
		return $this->getStatus() == 'success';
	}

	/**
	 * @return bool
	 */
	public function isPaid() {
		return $this->isSuccessful() && $this->getMessage() == 'Paid';
	}

	/**
	 * Does the response require a redirect?
	 *
	 * @return boolean
	 */
	public function isRedirect() {
		return false;
	}
}
