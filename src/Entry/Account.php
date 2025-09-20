<?php

namespace Obelaw\Shippulse\Bosta\Entry;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Obelaw\Shippulse\Bosta\Services\BostaShippingService;

class Account
{
    private string $token;

    public function __construct(
        private string $email,
        private string $password,
    ) {
        $bostaShippingService = new BostaShippingService;

        if (Cache::has('token')) {
            $this->token = Cache::get('token');
        }

        if (!Cache::has('token')) {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($bostaShippingService->getBaseUrl() . '/api/v2/users/login', [
                "email" => $this->email,
                "password" => $this->password
            ]);

            $data = $response->json();

            if (!$data['success']) {
                throw new \Exception('Authentication failed: ' . ($data['message'] ?? 'Unknown error'));
            }

            Cache::put('token', $data['data']['token'], now()->addHours(1));

            $this->token = $data['data']['token'];
        }
    }

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
            'token' => $this->token,
        ];
    }
}
