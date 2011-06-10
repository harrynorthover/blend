<?php
/**
 * File: Insert.php
 * Created: 10:14:11 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This call is used to insert data into the database.
 */

 class Insert
 {
 	/*
 	 * The registry object.
 	 */
	private $registry;

 	private $newData;

 	/**
 	 * Inserts data into the relevant data.
 	 *
 	 * @param $section the section to insert to, $type the type of vo required, $data in the form of a vo.
 	 */

	function __construct($registry)
	{
		$this->registry = $registry;
	}

	private function setupConnection()
	{
		$this->registry->db->setDetails(Types::DATABASE_USERNAME, Types::DATABASE_PASSWORD, Types::DATABASE_HOST);
		$this->registry->db->connect();
	}

	/**
	 * Insert data into the database.
	 *
	 * @param $table the selected table for the data to go into. See Types.php for a full list of available options
	 * @param $data the data to be inserted, should be a vo from the vo/ directory
	 */
 	public function insertData($table, $data)
 	{
 		include_once('proxy/databaseProxy.php');

 		$proxy = new databaseProxy($this->registry);
 		$this->newData = $data;
 		$this->setupConnection();
 		$proxy->setTable($table);
 		$proxy->insertRow($this->newData);
 	}
 }
?>
