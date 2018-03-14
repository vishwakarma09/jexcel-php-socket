<?php

namespace MyApp;

/**
* App Class
*/
class App
{
	
	public function __construct()
	{
		
	}

	public function execute2()
	{
		$insertArr = array(
			'Name' => 'AAkash',
			'Age'	 =>	5,
			 );
		$this->db->insert('student', $insertArr);
	}

}