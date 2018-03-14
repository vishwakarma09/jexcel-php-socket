<?php

namespace MyApp;

/**
* Class Router
*/
class Router
{

	function __construct()
	{

	}

	public function route($db, $controller, $action, $msg, $from, $clients)
	{	
		$class = "MyApp\\" . $controller;
		$_controller = new $class();
		list($status, $message, $data) = $_controller->{$action}($db, $msg->data, $from);

		$response = json_encode(array(
			"status"     =>$status,
			"message"    =>$message, 
			"controller" =>$controller, 
			"action"     =>$action,
			"data"       =>$data
			));

		/**
		 * update operaton is to be sent to all clients
		 */
		if ($controller == "sheet" && $action == "edit") {
			foreach ($clients as $client) {
				if ($from !== $client) {
     			// The sender is not the receiver, send to each client connected
					$client->send($response);
				}
			}			
		}

		$from->send($response);
	}

}