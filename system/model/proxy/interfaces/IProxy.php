<?php
/**
 * File: IProxy.php
 * Created: 11:32:13 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */
 interface IProxy
 {
 	/**
 	 * Set the table that all the actions are going to be perfomed on.
 	 *
 	 * @param $table the table needed.
 	 */
 	 public function setTable($table);

	 /**
	  * Set the data object
	  *
	  * @param data the data object
	  */
	 public function updateRowById($id, $columnsToUpdate, $updatedData);

	 /**
	  * Get and return a number of rows from a database.
	  *
	  * @param $amount amount of rows needed, use 'all' for all records.
	  */
	 public function getRows($amount = 'all');

	 /**
	  * Get a row by its id.
	  *
	  * @param $id the id of the row you want returned.
	  */
	 public function getRowById($id);

	 /**
	  * Delete a row specified by its id
	  *
	  * @param $id the id of the row that should be deleted.
	  */
	 public function deleteRowById($id);

	 /**
	  * Insert a new row
	  *
	  * @param unknown_type $data
	  */
	 public function insertRow($data);
 }
?>
