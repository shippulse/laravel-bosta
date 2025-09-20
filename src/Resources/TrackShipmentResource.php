<?php

namespace Obelaw\Shippulse\Bosta\Resources;

class TrackShipmentResource
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data['data']['deliveries'][0] ?? [];
    }

    /**
     * Get the message from the response.
     */
    public function getMessage(): ?string
    {
        return $this->data['data']['message'] ?? $this->data['message'] ?? null;
    }

    /**
     * String representation of the resource.
     */
    public function __toString(): string
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public function toArray(): array
    {
        return $this->data;
    }

    public function getTrackingNumber(): ?string
    {
        return $this->data['trackingNumber'] ?? null;
    }

    public function getState(): ?array
    {
        return $this->data['state'] ?? null;
    }

    public function getSender(): ?array
    {
        return $this->data['sender'] ?? null;
    }

    public function getReceiver(): ?array
    {
        return $this->data['receiver'] ?? null;
    }

    public function getPickupAddress(): ?array
    {
        return $this->data['pickupAddress'] ?? null;
    }

    public function getDropOffAddress(): ?array
    {
        return $this->data['dropOffAddress'] ?? null;
    }

    public function getNotes(): ?string
    {
        return $this->data['notes'] ?? null;
    }

    public function getCOD(): ?float
    {
        return $this->data['cod'] ?? null;
    }

    public function getType(): ?array
    {
        return $this->data['type'] ?? null;
    }

    public function getSpecs(): ?array
    {
        return $this->data['specs'] ?? null;
    }

    public function getCreatedAt(): ?string
    {
        return $this->data['createdAt'] ?? null;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->data['updatedAt'] ?? null;
    }

    public function getAttemptCount(): ?int
    {
        return $this->data['attemptsCount'] ?? null;
    }

    public function getSLA(): ?array
    {
        return $this->data['sla'] ?? null;
    }
}
