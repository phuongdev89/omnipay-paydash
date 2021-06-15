<?php
/**
 * Created by FES VPN.
 * @project omnipay-paydash
 * @author  Le Phuong
 * @email   phuong17889[at]gmail.com
 * @date    6/15/2021
 * @time    9:24 AM
 */

namespace Omnipay\Paydash\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\AbstractRequest;

class StatusRequest extends AbstractRequest {

	/**
	 * @param $value
	 *
	 * @return StatusRequest
	 */
	public function setId($value) {
		return $this->setParameter('id', $value);
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->getParameter('id');
	}

	/**
	 * @return array
	 * @throws InvalidRequestException
	 */
	public function getData() {
		$this->validate('id');
		return ['id' => $this->getId()];
	}

	/**
	 * @param mixed $data
	 *
	 * @return StatusResponse
	 */
	public function sendData($data) {
		return new StatusResponse($this, $data);
	}
}
