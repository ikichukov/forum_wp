<?php
/**
 * Created by PhpStorm.
 * User: ikicu
 * Date: 26.3.2016
 * Time: 17:48
 */

namespace App\Classes\Socket;
use App\Classes\Socket\Base\BaseSocket;
use Ratchet\ConnectionInterface;

class NotificationSocket extends BaseSocket
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;

        $message = \Auth::user()?\Auth::user()->name:'GUEST';

        echo sprintf('Connection %d sending message "%s" to %d other connection%s' . '\n',
            $from->resourceId, $msg, $numRecv, $numRecv!=1?'s':''
        );

        foreach($this->clients as $client)
        {
            if($from != $client)
            {
                $client->send($message);
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occured: {$e->getMessage()}\n";
        $conn->close();
    }
}