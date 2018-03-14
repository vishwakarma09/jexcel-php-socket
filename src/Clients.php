<?php

namespace MyApp;

/**
* Clients class
*/
class Clients extends App
{
	function __construct()
	{
		parent::__construct();
	}

	public function create()
	{
		$insertArr = array(
			'Name' => 'AAkash',
			'Age'	 =>	5,
			 );
		$this->db->insert('student', $insertArr);
	}

	public function read()
	{
		
	}

	public function update()
	{
		
	}

	public function delete()
	{
		
	}


}