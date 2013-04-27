<?php

/**
 * Wrench Server Application
 */
abstract class WrenchApplication
{
    /**
     * Optional: handle a connection
     */
    // abstract public function onConnect($connection);

    /**
     * Optional: handle a disconnection
     *
     * @param
     */
	// abstract public function onDisconnect($connection);

    /**
     * Optional: allow the application to perform any tasks which will result in a push to clients
     */ 
    // abstract public function onUpdate();

    /**
     * Handle data received from a client
     *
     * @param Payload $payload A payload object, that supports __toString()
     * @param WrenchConnection $connection
     */
	abstract public function onData($payload, $connection);
}
