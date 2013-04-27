<?php

/**
 * Example application for Wrench: echo server
 */
class EchoApplication extends Application
{
    /**
     * @see Application::onData()
     */
    public function onData($data, $client)
    {
        $client->send($data);
    }
}
