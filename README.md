# Laravel Bosta Shipping Integration

This package provides a Laravel integration for the Bosta shipping API, enabling you to easily create, track, label, and cancel shipments programmatically. It is designed for e-commerce platforms and businesses that need to automate shipping workflows with Bosta in Egypt.

## Installation

Install via Composer:

```bash
composer require shippulse/laravel-bosta
```

## ShipmentData Method

```php
use Shippulse\Entry\Account;
use Shippulse\Entry\DropOffAddressData;
use Shippulse\Entry\PickupAddressData;
use Shippulse\Entry\ReceiverData;
use Shippulse\Entry\ShipmentData;
use Shippulse\Facades\Bosta;

$shipment = Bosta::setConfig(new Account('email', 'password'))->createShipment(new ShipmentData(
        type: 10,
        cod: 999,
        receiverData: new ReceiverData(
            firstName: 'Ahmed',
            lastName: 'Ali',
            phone: '01001234567',
            email: 'ahmed.ali@example.com',
        ),
        pickupAddressData: new PickupAddressData(
            city: 'Cairo',
            zone: 'Nasr City',
            districtId: 'aiJudRHeOt',
            firstLine: '50 Abbas El Akkad Street',
            buildingNumber: '50',
            floor: '3',
            apartment: '10',
        ),
        dropOffAddressData: new DropOffAddressData(
            city: 'Giza',
            zone: 'Mohandessin',
            districtId: 'aiJudRHeOt',
            firstLine: '123 Gameat El Dewal Al Arabeya',
        ),

    ));
```

### Methods available on CreateShipmentResource

After calling `createShipment`, you get an instance of `CreateShipmentResource`. You can use the following methods:

- `$shipment->getMessage();` - Get the API message
- `$shipment->getShipmentId();` - Get the shipment ID
- `$shipment->getTrackingNumber();` - Get the tracking number
- `$shipment->getSender();` - Get sender info as array
- `$shipment->getCreationSource();` - Get creation source
- `$shipment->getState();` - Get the shipment state (array)
- `$shipment->toArray();` - Get the full response as array
- `echo $shipment;` - Get the full response as pretty JSON

## labelShipment Method

To print or download the shipment label (AWB PDF), use the `labelShipment` method:

```php
use Shippulse\Entry\Account;
use Shippulse\Facades\Bosta;
$label = Bosta::setConfig(new Account('email', 'password'))->labelShipment($trackingNumber);
```

This returns an array with:

- `url`: Public URL to the PDF label
- `path`: Local storage path to the PDF label
- `trackingNumber`: The shipment tracking number
- `success`: Boolean status
- `message`: API message (if any)

## trackShipment Method

To track a shipment and get its current state and details, use the `trackShipment` method:

```php
use Shippulse\Entry\Account;
use Shippulse\Facades\Bosta;
$tracking = Bosta::setConfig(new Account('email', 'password'))->trackShipment($trackingNumber);
```

This returns an instance of `TrackShipmentResource` with methods:

- `$tracking->getTrackingNumber();` - Get the tracking number
- `$tracking->getState();` - Get the shipment state (array)
- `$tracking->getSender();` - Get sender info
- `$tracking->getReceiver();` - Get receiver info
- `$tracking->getPickupAddress();` - Get pickup address
- `$tracking->getDropOffAddress();` - Get drop-off address
- `$tracking->getNotes();` - Get shipment notes
- `$tracking->getCOD();` - Get cash on delivery amount
- `$tracking->getType();` - Get shipment type
- `$tracking->getSpecs();` - Get shipment specs
- `$tracking->getCreatedAt();` - Get creation date
- `$tracking->getUpdatedAt();` - Get last update date
- `$tracking->getAttemptCount();` - Get number of delivery attempts
- `$tracking->getSLA();` - Get SLA info
- `$tracking->toArray();` - Get the full response as array

## cancelShipment Method

To cancel a shipment, use the `cancelShipment` method:

```php
use Shippulse\Entry\Account;
use Shippulse\Facades\Bosta;
$result = Bosta::setConfig(new Account('email', 'password'))->cancelShipment($trackingNumber);
```

This returns an array with:

- `trackingNumber`: The shipment tracking number
- `success`: Boolean status
- `message`: API message (if any)
- `data`: Additional API data (if any)

## Funding

If you find this package useful and would like to support its development, you can sponsor or contribute to the project.

[Sponsor via GitHub](https://github.com/sponsors/obelaw)
