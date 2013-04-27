<!-- vim: set tw=79 sw=4 ts=4 et ft=markdown : -->
# Wrench
## Simple WebSocket Client/Server for PHP 5.1/5.2
### Formerly known as php-websocket

A simple websocket server and client package for PHP 5.1/5.2, using
streams. This is based off varspool's great work from 
https://github.com/varspool/Wrench. If you need a websocket library 
for php 5.3/5.4, I strongly suggest you use his implementation.
Protocol support is based around [RFC 6455](http://tools.ietf.org/html/rfc6455),
targeting the latest stable versions of Chrome and Firefox. 
(Suggest other clients [here](https://github.com/varspool/Wrench/wiki))

## Usage

This creates a server on 127.0.0.1:8000 with one Application that listens for
WebSocket requests to `ws://localhost:8000/echo` and `ws://localhost:8000/chat`:

```php
$server = new BasicServer('ws://localhost:8000', array(
    'allowed_origins' => array(
        'mysite.com',
        'mysite.dev.localdomain'
    )
));
$server->registerApplication('echo', new EchoApplication());
$server->registerApplication('chat', new MyChatApplication());
$server->run();
```
## Authors

The original maintainer and author was
[@nicokaiser](https://github.com/nicokaiser). Plentiful improvements were
contributed by [@lemmingzshadow](https://github.com/lemmingzshadow) and
[@mazhack](https://github.com/mazhack). Parts of the Socket class were written
by Moritz Wutz. This version was forked from [@varspool](https://github.com/varspool/).
The server is licensed under the WTFPL, a free software compatible
license.

## Examples

- See server.php in the examples directory and EchoApplication
