<?php

namespace Obelaw\Shippulse\Bosta\Entry;

class DropOffAddressData
{
    public function __construct(
        private string $city,
        private string $zone,
        private string $districtId,
        private string $firstLine,
    ) {}

    public function toArray(): array
    {
        return [
            'city' => $this->city,
            'zone' => $this->zone,
            'districtId' => $this->districtId,
            'firstLine' => $this->firstLine,
        ];
    }
}
