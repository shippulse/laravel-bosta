<?php

namespace Obelaw\Shippulse\Bosta\Resources;

use Illuminate\Support\Arr;

/**
 * Class CashCycleResource
 */
class CashCycleResource
{
    /**
     * Create a new CashCycleResource instance.
     *
     * @param array $data
     */
    public function __construct(protected array $data) {}

    /**
     * Get the resource data as an array.
     *
     * @param string|null $key
     * @return array
     */
    public function toArray($key = null): array
    {
        if ($key) {
            return Arr::get($this->data, $key, []);
        }

        return $this->data;
    }

    /**
     * Get the deposited date.
     *
     * @return string|null
     */
    public function getDepositedAt(): ?string
    {
        return $this->data['deposited_at'] ?? null;
    }

    /**
     * Get the COD amount.
     *
     * @return float|null
     */
    public function getCod(): ?float
    {
        return $this->data['cod'] ?? null;
    }

    /**
     * Get the Bosta fees.
     *
     * @return float|null
     */
    public function getBostaFees(): ?float
    {
        return $this->data['bosta_fees'] ?? null;
    }
}
