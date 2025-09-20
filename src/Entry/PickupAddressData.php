<?php

namespace Obelaw\Shippulse\Bosta\Entry;

class PickupAddressData
{
    public function __construct(
        private string $city,
        private string $zone,
        private string $districtId,
        private string $firstLine,
        private string $buildingNumber,
        private string $floor,
        private string $apartment
    ) {}

    public function toArray(): array
    {
        return [
            'city' => $this->city,
            'zone' => $this->zone,
            'districtId' => $this->districtId,
            'firstLine' => $this->firstLine,
            'buildingNumber' => $this->buildingNumber,
            'floor' => $this->floor,
            'apartment' => $this->apartment,
        ];
    }
}
