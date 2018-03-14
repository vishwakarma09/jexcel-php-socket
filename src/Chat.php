<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Evolution\CodeIgniterDB as CI;

class Chat implements MessageComponentInterface {
    protected $clients;
    protected $router;
    protected $db;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
        $this->router = new Router;
        
        $db_data = array(
            'dsn'   => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => 'ratchet',
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => TRUE,
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
            );
        $this->db =& CI\DB($db_data);
        
        
    }

    public function onOpen(ConnectionInterface $conn) {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $numRecv = count($this->clients) - 1;

        // echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n"
        //     , $from->resourceId, $msg, $numRecv, $numRecv == 1 ? '' : 's');

        if (json_decode($msg) == FALSE)
        {
        	$from->send(json_encode(["status"=>1, "message"=>"Improper json format"]));
        }

        $msg = json_decode($msg);

        if ($msg->controller == NULL || $msg->action == NULL) {
        	$from->send(json_encode(["status"=>1, "message"=>"No controller or action specified"]));
        }

        if ($msg->controller == "die") {
        	die('halting...');
        }

        $this->router->route($this->db, $msg->controller, $msg->action, $msg, $from, $this->clients);

        // foreach ($this->clients as $client) {
        //     if ($from !== $client) {
        //         // The sender is not the receiver, send to each client connected
        //         $client->send($msg);
        //     }
        // }
    }

    public function onClose(ConnectionInterface $conn) {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }

}