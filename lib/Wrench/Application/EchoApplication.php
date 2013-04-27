<?php

/**
 * Example application for Wrench: echo server
 */
class EchoApplication extends WrenchApplication
{
    /**
     * @see WrenchApplication::onData()
     */
    public function onData($data, $client)
    {
        $client->send($data);
    }
}
