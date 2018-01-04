<?php

namespace NathanDunn\Chargebee\Api\PortalSessions;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class PortalSession extends AbstractApi
{
    /**
     * @param $id
     * @return array|string
     * @throws Exception
     */
    public function find($id)
    {
        $url = $this->url('portal_sessions/%s', $id);

        return $this->get($url);
    }

    /**
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function create(array $data)
    {
        $url = $this->url('portal_sessions');

        return $this->post($url, $data);
    }

    /**
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function logout(string $id)
    {
        $url = $this->url('portal_sessions/%s/logout', $id);

        return $this->post($url, []);
    }

    /**
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function activate(string $id, array $data)
    {
        $url = $this->url('portal_sessions/%s/activate', $id);

        return $this->post($url, $data);
    }
}