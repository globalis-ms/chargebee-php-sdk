<?php

namespace NathanDunn\Chargebee\Api\TimeMachines;

use Http\Client\Exception;
use NathanDunn\Chargebee\Api\AbstractApi;

class TimeMachine extends AbstractApi
{
    /**
     * Retrieves a specified time machine.
     *
     * @param string $id
     * @return array|string
     * @throws Exception
     */
    public function find(string $id)
    {
        $url = $this->url('time_machines/%s', $id);

        return $this->get($url);
    }

    /**
     * Restart the time machine.
     *
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function startAfresh(string $id, array $data)
    {
        $url = $this->url('time_machines/%s/start_afresh', $id);

        return $this->post($url, $data);
    }

    /**
     * Travel forward in time.
     *
     * @param string $id
     * @param array $data
     * @return array|string
     * @throws Exception
     */
    public function travelForward(string $id, array $data)
    {
        $url = $this->url('time_machines/%s/travel_forward', $id);

        return $this->post($url, $data);
    }
}