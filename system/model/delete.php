<?php
/*
 * File: delete.php
 * Created: 10:40:15 AM - Aug 18, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Used to delete records in the database's.
 */
 class Delete
 {
	/*
	 * Registry object.
	 */
	private $registry;

	/*
	 * Data objects
	 */
	private $_table;
	private $_id;

	public function __construct($registry)
	{
		$this->registry = $registry;
	}

	/** Sets up the connection object used to connect to the database.
	 * See Connector.php
	 *
	 * @param none
	 */
	private function setupConnection()
	{
		$this->registry->db->setDetails(Types::DATABASE_USERNAME, Types::DATABASE_PASSWORD, Types::DATABASE_HOST);
		$this->registry->db->connect();
	}

	/**
	 * The function deletes a row from a table in a selected database.
	 *
	 * @param $database the database the table is in with the row you want to delete.
	 * @param $section the table to row is in you want deleted.
	 * @param $id the id of the row you want deleted.
	 */
 	public function deleteRow($table, $id)
 	{
 		$this->_table = $table;
 		$this->_id = $id;

 		$this->setupConnection();

		include_once('proxy/databaseProxy.php');

		/*
		 * Load the proxy and get the data from the database.
		 */
		$proxy = new databaseProxy($this->registry);

		/*
		 * Set the table. See Types.php Line 38 onwards for full list.
		 */
		$proxy->setTable($this->_table);

		if($this->_id != null)
		{
			$data = $proxy->deleteRowById($this->_id);
		}
		else
		{
			echo 'delete.php deleteRow() - Please specifiy an id!';
		}

		return $data;
 	}
 }
?>
