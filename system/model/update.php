<?php
/*
 * File: Update.php
 * Created: 12:05:15 AM - Aug 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Used to update records in the database.
 */
 class Update
 {
 	/*
 	 * Registry object
 	 */
 	private $registry;

 	/*
 	 * Update variables
 	 */
 	 private $_table;
 	 private $_id;
 	 private $_paramsToUpdate;
 	 private $_updatedParamData;

	/**
	 * Creates the Update object and assigns the registry object to the local version.
	 *
	 * @param $registry the global registry object.
	 */

 	public function __construct(Registry $registry)
 	{
		$this->registry = $registry;
 	}

 	private function setupConnection()
	{
		$this->registry->db->setDetails(Types::DATABASE_USERNAME, Types::DATABASE_PASSWORD, Types::DATABASE_HOST);
		$this->registry->db->connect();
	}

 	/**
 	 * Updates data in one of the databases.
 	 *
 	 * @param $database the database needed to be updated - Types::PORTFOLIO Types::BLOG Types::SETTINGS
 	 * @param $section the table with the data in that needs to be updated.
 	 * @param $id the id of the row needed to be updated.
 	 */

 	public function updateData($table, $id, $paramsToUpdate, $updatedParamData)
 	{
 		$this->_table 				= $table;
 		$this->_id 					= $id;
 		$this->_paramsToUpdate 		= $paramsToUpdate;
 		$this->_updatedParamData 	= $updatedParamData;

 		$this->setupConnection();

		/*
		 * Load the proxy and get the data from the database.
		 */

		include_once('proxy/databaseProxy.php');
		$proxy = new databaseProxy($this->registry);
		$proxy->setTable($this->_table);

		if($this->_id != null)
		{
			$data = $proxy->updateRowById($this->_id, $this->_paramsToUpdate, $this->_updatedParamData);
		}
		else
		{
			echo '<p>update.php updateData() - Please specify and ID!</p>';
		}

		return $data;
 	}

 }
?>
