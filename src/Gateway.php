<?php

namespace Omnipay\Paydash;

use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\NotificationInterface;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\Paydash\Message\PurchaseRequest;
use Omnipay\Paydash\Message\WebhookRequest;

/**
 * @method RequestInterface authorize(array $options = array())
 * @method RequestInterface completeAuthorize(array $options = array())
 * @method RequestInterface capture(array $options = array())
 * @method RequestInterface completePurchase(array $options = array())
 * @method RequestInterface refund(array $options = array())
 * @method RequestInterface void(array $options = array())
 * @method RequestInterface createCard(array $options = array())
 * @method RequestInterface updateCard(array $options = array())
 * @method RequestInterface deleteCard(array $options = array())
 * @method NotificationInterface acceptNotification(array $options = array())
 * @method RequestInterface fetchTransaction(array $options = [])
 */
class Gateway extends AbstractGateway {

	const NAME = 'Paydash';

	/**
	 * {@inheritDoc}
	 */
	public function getName() {
		return self::NAME;
	}

	/**
	 * {@inheritDoc}
	 */
	public function getDefaultParameters() {
		return [
			'apiKey' => '',
		];
	}

	/**
	 * @param $value
	 *
	 * @return Gateway
	 */
	public function setApiKey($value) {
		return $this->setParameter('apiKey', $value);
	}

	/**
	 * @return mixed
	 */
	public function getApiKey() {
		return $this->getParameter('apiKey');
	}

	/**
	 * @param array $parameters
	 *
	 * @return AbstractRequest
	 */
	public function purchase($parameters = []) {
		$parameters['apiKey'] = $this->getApiKey();
		return $this->createRequest(PurchaseRequest::class, $parameters);
	}

	/**
	 * @param array $parameters
	 *
	 * @return AbstractRequest
	 */
	public function webhook($parameters = []) {
		$parameters['apiKey'] = $this->getApiKey();
		return $this->createRequest(WebhookRequest::class, $parameters);
	}
}
