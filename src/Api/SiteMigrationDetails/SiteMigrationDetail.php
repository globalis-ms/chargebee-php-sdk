<?php

namespace NathanDunn\Chargebee\Api\SiteMigrationDetails;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class SiteMigrationDetail extends AbstractApi
{
    /**
     * @param array $parameters
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function list($parameters = [])
    {
        $resolver = $this->createOptionsResolver();

        $url = $this->url('site_migration_details');

        return $this->get($url, $resolver->resolve($parameters));
    }
}
