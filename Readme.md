# General information
- PHP 7.1 or above
- You need Webpay account mail us on managers@webpay.by
- Set the secretKey in Web ui https://sandbox.webpay.by

# Installation

To use the SDK

    composer require webpayby/wsb_api    

# Usage

Send request on https://sandbox.webpay.by/WSBApi



- RefundRequest
```php
        $response = (new RefundRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->setReason('by client request')
            ->send();
```
 
- CancelRequest
```php
        $response = (new CancelRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->setReason('by client request')
            ->send();
```

- CompleteRequest
```php
        $response = (new CompleteRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->send();
```

- CompleteWithSouRequest
```php   
        $response = (new CompleteWithSouRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setAmount('5.00')
            ->setCurrency(Currency::BYN)
            ->setTransactionId('956424424')
            ->setServiceNumber('391871')
            ->setServiceAccount('11111111111111')
            ->send();       
```

- GetTransactionStatusRequest
```php
        $response = (new GetTransactionStatusRequest(self::HOST, self::LOGIN, self::PASSWORD, self::BILLING_ID))
            ->setStartYear('2019')
            ->setStartMonth('01')
            ->send();
```

# Test data

- SecretKey – set in web ui https://sandbox.webpay.by
- login - sent in mail
- password - sent in mail
- wsb_storeid:	sent in mail 
- Test card
type: VISA
434179xxxxxx0051
CVV/CVC2: any 
Exp: MM/YY (any) – common cases
Exp: 12/YY – error cases

