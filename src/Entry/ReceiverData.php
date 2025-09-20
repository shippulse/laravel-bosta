<?php

namespace Obelaw\Shippulse\Bosta\Entry;

class ReceiverData
{
    public function __construct(
        private string $firstName,
        private string $lastName,
        private string $phone,
        private string $email
    ) {}

    public function toArray(): array
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'phone' => $this->phone,
            'email' => $this->email,
        ];
    }
}
