<?php

namespace Obelaw\Shippulse\Bosta\Services;

use Illuminate\Support\Facades\Http;
use Obelaw\Shippulse\Bosta\Entry\Account;
use Obelaw\Shippulse\Bosta\Services\BostaShippingService;
use Obelaw\Shippulse\Shipper\Contracts\ShippingProviderInterface;
use Obelaw\Shippulse\Shipper\Contracts\ShipmentDataInterface;

class BostaService implements ShippingProviderInterface
{
    protected array $configs;

    public function __construct(
        private readonly BostaShippingService $bosta
    ) {
        // Constructor logic if needed
        // $this->bosta->setConfig(new Account(email: '64654'));
    }

    /**
     * Set the configuration for Bosta.
     *
     * @param Account $configs
     * @return $this
     */
    public function setConfig(Account $configs): self
    {
        $this->bosta->setConfig($configs);
        $this->configs = $configs->toArray();
        return $this;
    }

    public function createShipment(ShipmentDataInterface $data)
    {

        $response = Http::withHeaders([
            'Authorization' => $this->configs['token'],
            'Content-Type' => 'application/json',
        ])->post($this->bosta->getBaseUrl() . '/api/v2/deliveries?apiVersion=1', $data->toArray());

        return $response->json();
    }

    public function labelShipment($trackingNumber)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->configs['token'],
        ])->get($this->bosta->getBaseUrl() . '/api/v2/deliveries/mass-awb', [
            'trackingNumbers' => $trackingNumber
        ]);

        $pdf_data = base64_decode($response->json()['data'], true);
        file_put_contents('airway_bill.pdf', $pdf_data);
        dd($response->json());

        return $response->json();
    }

    public function trackShipment($trackingNumber)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->configs['token'],
        ])->post($this->bosta->getBaseUrl() . '/api/v2/deliveries/search', [
            'trackingNumbers' => $trackingNumber
        ]);

        return $response->json('data.deliveries.0.state.value');
    }

    public function cancelShipment($trackingNumber)
    {
        $response = Http::withHeaders([
            'Authorization' => $this->configs['token'],
        ])->delete($this->bosta->getBaseUrl() . '/api/v2/deliveries/business/' . $trackingNumber . '/terminate');

        return $response->json();
    }
}
