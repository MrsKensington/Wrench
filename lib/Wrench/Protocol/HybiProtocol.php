<?php

/**
 * @see http://tools.ietf.org/html/rfc6455#section-5.2
 */
abstract class HybiProtocol extends Protocol
{
    /**
     * @see Protocol::getPayload()
     */
    public function getPayload()
    {
        return new HybiPayload();
    }
}
