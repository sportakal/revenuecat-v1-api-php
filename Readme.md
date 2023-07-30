# PHP library for Revenuecat api v1

[Check official documentation (Revenuecat api v1)](https://www.revenuecat.com/reference/basic)

## Installation
### Composer

Install dependencies with composer:

```bash
composer require sportakal/revenuecat-v1-api-php
```

Use composer autoload to include dependencies

```php
require_once('vendor/autoload.php');
```

## Usage

### Create Options
Set you token to Options object

```php
use Sportakal\RevenuecatV1ApiPhp\Options;

$options = new Options('your_bearer_token');
```

### Make Request
Get or Create subscriber info from Revenuecat

```php
use Sportakal\RevenuecatV1ApiPhp\Requests\GetOrCreateSubscriber;

$request = (new GetOrCreateSubscriber('app_user_id'));

$subscriber = $request->get($options);

return $subscriber;
```

Check for more examples **/samples** directory

## TODOS
- [X] ***Get or Create Subscriber*** Endpoint
- [X] ***Delete Subscriber*** Endpoint
- [ ] ***Add User Attribution Data*** Endpoint
- [X] ***Update Subscriber Attributes*** Endpoint
- [ ] ***Create a Purchase*** Endpoint
- [ ] ***Google Play: Refund and Revoke Subscription*** Endpoint
- [ ] ***Google Play: Defer a Subscription*** Endpoint
- [ ] ***Google Play: Refund and Revoke Purchase*** Endpoint
- [ ] ***Grant a Promotional Entitlement*** Endpoint
- [ ] ***Revoke Promotional Entitlements*** Endpoint
- [ ] ***Override a Customer's Current Offering*** Endpoint
- [ ] ***Remove a Customer's Current Offering Override*** Endpoint
- [ ] ***Get Offerings*** Endpoint


## Contributions are welcome!
