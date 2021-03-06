<?php

class OriginPolicy implements Listener, HandshakeRequestListener
{
    protected $allowed = array();

    public function __construct(array $allowed)
    {
        $this->allowed = $allowed;
    }

    /**
     * Handshake request listener
     *
     * Closes the connection on handshake from an origin that isn't allowed
     *
     * @param WrenchConnection $connection
     * @param string $path
     * @param string $origin
     * @param string $key
     * @param array $extensions
     */
    public function onHandshakeRequest(WrenchConnection $connection, $path, $origin, $key, $extensions)
    {
        if (!$this->isAllowed($origin)) {
            $connection->close(new InvalidOriginException('Origin not allowed'));
        }
    }

    /**
     * Whether the specified origin is allowed under this policy
     *
     * @param string $origin
     * @return boolean
     */
    public function isAllowed($origin)
    {
        $scheme = parse_url($origin, PHP_URL_SCHEME);
        $host = parse_url($origin, PHP_URL_HOST) ?: $origin;

        foreach ($this->allowed as $allowed) {
            $allowed_scheme = parse_url($allowed, PHP_URL_SCHEME);

            if ($allowed_scheme && $scheme != $allowed_scheme) {
                continue;
            }

            $allowed_host = parse_url($allowed, PHP_URL_HOST) ?: $allowed;

            if ($host != $allowed_host) {
                continue;
            }

            return true;
        }

        return false;
    }

    /**
     * @param WrenchServer $server
     */
    public function listen(WrenchServer $server)
    {
        $server->addListener(
            WrenchServer::EVENT_HANDSHAKE_REQUEST,
            array($this, 'onHandshakeRequest')
        );
    }
}
