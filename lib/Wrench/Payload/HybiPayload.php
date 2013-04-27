<?php

/**
 * Gets a HyBi payload
 * @author Dominic
 *
 */
class HybiPayload extends Payload
{
    /**
     * @see Payload::getFrame()
     */
    protected function getFrame()
    {
        return new HybiFrame();
    }
}
