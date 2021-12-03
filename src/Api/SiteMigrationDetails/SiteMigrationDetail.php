<?php

namespace Globalis\Chargebee\Api\SiteMigrationDetails;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class SiteMigrationDetail extends AbstractApi
{
    /**
     * @param array $parameters
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list($parameters = [], array $headers = [])
    {
        $url = $this->url('site_migration_details');

        return $this->get($url, $parameters, $headers);
    }
}
