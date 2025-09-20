<?php

namespace Obelaw\Shippulse\Bosta\Services;

use Illuminate\Support\Facades\App;
use Obelaw\Shippulse\Bosta\Entry\Account;

class BostaShippingService
{
    protected $clientInfo;

    const API_BASE_URL_TEST = 'https://api.bosta.co';
    const API_BASE_URL_PRODUCTION = 'https://app.bosta.co';

    public function setConfig(Account $configs)
    {
        $this->clientInfo = $configs->toArray();

        return $this;
    }

    public function getBaseUrl()
    {
        return App::environment('local') ? self::API_BASE_URL_TEST : self::API_BASE_URL_PRODUCTION;
    }
}
