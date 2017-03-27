<?php
/**
 * Created by PhpStorm.
 * User: ikicu
 * Date: 26.3.2016
 * Time: 17:49
 */

namespace App\Classes\Socket\Base;

use Ratchet\MessageComponentInterface;
use React\Socket\ConnectionInterface;


class BaseSocket implements MessageComponentInterface
{

    /**
     * When a new connection is opened it will be passed to this method
     * @param  \Ratchet\ConnectionInterface $conn The socket/connection that just connected to your application
     * @throws \Exception
     */
    function onOpen(\Ratchet\ConnectionInterface $conn)
    {
        // TODO: Implement onOpen() method.
    }

    /**
     * This is called before or after a socket is closed (depends on how it's closed).  SendMessage to $conn will not result in an error if it has already been closed.
     * @param  \Ratchet\ConnectionInterface $conn The socket/connection that is closing/closed
     * @throws \Exception
     */
    function onClose(\Ratchet\ConnectionInterface $conn)
    {
        // TODO: Implement onClose() method.
    }

    /**
     * If there is an error with one of the sockets, or somewhere in the application where an Exception is thrown,
     * the Exception is sent back down the stack, handled by the Server and bubbled back up the application through this method
     * @param  \Ratchet\ConnectionInterface $conn
     * @param  \Exception $e
     * @throws \Exception
     */
    function onError(\Ratchet\ConnectionInterface $conn, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    /**
     * Triggered when a client sends data through the socket
     * @param  \Ratchet\ConnectionInterface $from The socket/connection that sent the message to your application
     * @param  string $msg The message received
     * @throws \Exception
     */
    function onMessage(\Ratchet\ConnectionInterface $from, $msg)
    {
        // TODO: Implement onMessage() method.
    }
}