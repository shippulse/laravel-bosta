<?php

namespace Obelaw\Shippulse\Bosta\Entry;

use Obelaw\Shippulse\Bosta\Entry\ReceiverData;
use Obelaw\Shippulse\Shipper\Contracts\ShipmentDataInterface;

class ShipmentData implements ShipmentDataInterface
{
    public function __construct(
        private int $type = 10,
        private float $cod = 0.0,
        private ReceiverData $receiverData,
        private PickupAddressData $pickupAddressData,
        private DropOffAddressData $dropOffAddressData,
        private ?string $notes = null,
        private ?string $webhookUrl = null
    ) {
        // Initialize properties if needed
    }

    public function toArray(): array
    {
        $data = [
            'type' => $this->type,
            'cod' => $this->cod,
            'receiver' => $this->receiverData->toArray(),
            'pickupAddress' => $this->pickupAddressData->toArray(),
            'dropOffAddress' => $this->dropOffAddressData->toArray(),
        ];

        if ($this->notes) {
            $data['notes'] = $this->notes;
        }

        if ($this->webhookUrl) {
            $data['webhookUrl'] = $this->webhookUrl;
        }

        return $data;
    }
}
