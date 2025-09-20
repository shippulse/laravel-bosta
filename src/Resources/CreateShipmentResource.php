<?php

namespace Obelaw\Shippulse\Bosta\Resources;

class CreateShipmentResource
{
    public function __construct(
        protected array $data
    ) {}


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


    /**
     * Get the shipment ID.
     */
    public function getShipmentId(): ?string
    {
        return $this->data['data']['_id'] ?? null;
    }


    /**
     * Get the tracking number.
     */
    public function getTrackingNumber(): ?string
    {
        return $this->data['data']['trackingNumber'] ?? null;
    }
    /**
     * Get sender info as array.
     */
    public function getSender(): ?array
    {
        return $this->data['data']['sender'] ?? null;
    }

    /**
     * Get creation source.
     */
    public function getCreationSource(): ?string
    {
        return $this->data['data']['creationSrc'] ?? null;
    }

    /**
     * Get the shipment state.
     *
     * @return array|null
     */
    public function getState(): ?array
    {
        return $this->data['data']['state'] ?? null;
    }
}
