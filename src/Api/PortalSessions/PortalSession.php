<?php

namespace Globalis\Chargebee\Api\PortalSessions;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class PortalSession extends AbstractApi
{
    /**
     * @param $id
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find($id, array $headers = [])
    {
        $url = $this->url('portal_sessions/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * @param array $data
     * @param array $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function create(array $data, array $headers = [])
    {
        $url = $this->url('portal_sessions');

        return $this->post($url, $data, $headers);
    }

    /**
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function logout(string $id, array $headers = [])
    {
        $url = $this->url('portal_sessions/%s/logout', $id);

        return $this->post($url, [], $headers);
    }

    /**
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function activate(string $id, array $data, array $headers = [])
    {
        $url = $this->url('portal_sessions/%s/activate', $id);

        return $this->post($url, $data, $headers);
    }
}
