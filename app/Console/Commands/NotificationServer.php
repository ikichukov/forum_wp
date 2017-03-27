<?php

namespace App\Console\Commands;

use App\Classes\Socket\Base\BaseSocket;
use App\Classes\Socket\NotificationSocket;
use Illuminate\Console\Command;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

class NotificationServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info("Start server");

        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new NotificationSocket()
                )
            ),
            8080, '127.0.0.1'
        );

        $server->run();
    }
}
