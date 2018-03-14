<?php

namespace MyApp;

/**
* Clients class
*/
class Sheet extends App
{

	protected $db;

	function __construct()
	{
		parent::__construct();
	}

	public function get($db, $data, $from)
	{
		// print_r($data);

		$this->db = $db;

		$this->db->where('x', $data->x);
		$this->db->where('y', $data->y);
		$result = $this->db->get('tblsheet')->result();

		if (count($result) < 1) {
			
			$data->text = NULL;
			return array('SUCCESS', 'Data fetched successfully', $data);

		}else{

			$data->text = $result[0]->text;
			return array('SUCCESS', 'Data fetched successfully', $data);

		}
	}

	public function edit($db, $data, $from)
	{
		// print_r($data);

		$this->db = $db;

		$this->db->where('x', $data->x);
		$this->db->where('y', $data->y);
		$result = $this->db->get('tblsheet')->result();

		if (count($result) < 1) {
			$insertArr = array(
				'x' => $data->x,
				'y' => $data->y,
				'text'	=>	$data->text,
				);

			$result = $this->db->insert('tblsheet', $insertArr);
			if ($result == FALSE) {
				return array('ERROR', 'Error saving data', $data);
			}
			return array('SUCCESS', 'Data saved successfully', $data);

		}else{

			$this->db->where('x', $data->x);
			$this->db->where('y', $data->y);
			$updateArr = array('text' => $data->text);
			$result = $this->db->update('tblsheet', $updateArr);

			if ($result == FALSE) {
				return array('ERROR', 'Error saving data', $data);
			}
			return array('SUCCESS', 'Data saved successfully', $data);

		}
	}


}