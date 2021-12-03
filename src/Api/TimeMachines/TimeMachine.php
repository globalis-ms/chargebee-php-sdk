<?php

namespace Globalis\Chargebee\Api\TimeMachines;

use Http\Client\Exception;
use Globalis\Chargebee\Api\AbstractApi;

class TimeMachine extends AbstractApi
{
    /**
     * Retrieves a specified time machine.
     *
     * @param string $id
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function find(string $id, array $headers = [])
    {
        $url = $this->url('time_machines/%s', $id);

        return $this->get($url, [], $headers);
    }

    /**
     * Restart the time machine.
     *
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function startAfresh(string $id, array $data, array $headers = [])
    {
        $url = $this->url('time_machines/%s/start_afresh', $id);

        return $this->post($url, $data, $headers);
    }

    /**
     * Travel forward in time.
     *
     * @param string $id
     * @param array  $data
     * @param array  $headers
     *
     * @throws Exception
     *
     * @return array|string
     */
    public function travelForward(string $id, array $data, array $headers = [])
    {
        $url = $this->url('time_machines/%s/travel_forward', $id);

        return $this->post($url, $data, $headers);
    }
}
