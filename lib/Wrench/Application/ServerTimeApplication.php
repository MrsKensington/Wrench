<?php

/**
 * Example application demonstrating how to use WrenchApplication::onUpdate
 *
 * Pushes the server time to all clients every update tick.
 */
class ServerTimeApplication extends WrenchApplication
{
    protected $clients = array();
    protected $lastTimestamp = null;

    /**
     * @see WrenchApplication::onConnect()
     */
    public function onConnect($client)
    {
        $this->clients[] = $client;
    }

    /**
     * @see WrenchApplication::onUpdate()
     */
    public function onUpdate()
    {
        // limit updates to once per second
        if(time() > $this->lastTimestamp) {
            $this->lastTimestamp = time();

            foreach ($this->clients as $sendto) {
                $sendto->send(date('d-m-Y H:i:s'));
            }
        }
    }

    public function onData($payload, $connection)
    {
    }
}
