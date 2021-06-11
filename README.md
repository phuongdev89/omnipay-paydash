Omnipay for Paydash
====================
Omnipay for Paydash

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist phuong17889/omnipay-paydash "*"
```

or add

```
"phuong17889/omnipay-paydash": "*"
```

to the require section of your `composer.json` file.


Usage
-----

The following gateways are provided by this package:

* Paydash

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay)
repository.

## Example

### Create payment url

```php
use Omnipay\Paydash\Gateway;
use Omnipay\Omnipay;

$command = Omnipay::create(Gateway::NAME);
$command->initialize([
    'apiKey' => '8kvmsfM92x',
]);
$response = $command->purchase([
    'email'      => 'test@gmail.com',
    'amount'     => 10,
    'webhookURL' => 'https://domain.com/hook',
    'returnURL'  => 'https://domain.com/return?paymentId={paymentID}',
    'metadata'   => [], //your meta data, optional
])->send();
if($response->isSuccessful()){
    $redirectUrl = $response->getRedirectUrl();
    header("Location: $redirectUrl");
}
```

### Webhook payment

```php
use Omnipay\Paydash\Gateway;
use Omnipay\Omnipay;
$data = json_decode(file_get_contents('php://input'));
$command = Omnipay::create(Gateway::NAME);
$command->initialize([
    'apiKey' => '8kvmsfM92x',
]);
$response = $command->webhook($data)->send();
print_r($response->getData());
```
