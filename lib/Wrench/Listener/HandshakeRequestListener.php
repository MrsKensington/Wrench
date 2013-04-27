<?php

interface HandshakeRequestListener
{
    /**
     * Handshake request listener
     *
     * @param WrenchConnection $connection
     * @param string $path
     * @param string $origin
     * @param string $key
     * @param array $extensions
     */
    public function onHandshakeRequest(WrenchConnection $connection, $path, $origin, $key, $extensions);
}
