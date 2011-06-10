<?php
/**
 * File: databaseProxy.php
 * Created: 10:46:53 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Used to get data to & from the database.
 */

include_once('interfaces/IProxy.php');

class databaseProxy implements IProxy
{
	private $_registry;

	private $selectedTable;

	function __construct($registry)
	{
		$this->_registry = $registry;
	}

	public function setTable($table)
	{
		$this->selectedTable = Types::DATABASE_TABLE_PREFIX . $table;
	}

	public function getRowById($id)
	{
		if($id == null) echo '<p>databaseProxy.php getRowById() - Please specifiy an id!</p>';
		else
		{
			$result = $this->_registry->db->runQuery("SELECT * FROM " . $this->selectedTable . " WHERE id='" . $id . "'");
			return $result;
		}
	}

	public function getRows($amount = 'all', $order = '')
	{
		if ($amount == 'all')
			$result = $this->_registry->db->runQuery('SELECT * FROM ' . $this->selectedTable . $order);
		else
			$result = $this->_registry->db->runQuery('SELECT * FROM ' . $this->selectedTable . ' ' . $order .  ' LIMIT ' . $amount);

		return $result;
	}

	public function deleteRowById($id)
	{
		 return $this->_registry->db->runQuery('DELETE FROM ' . $this->selectedTable . ' WHERE id=' . $id);
	}

	public function updateRowById($id, $columnsToUpdate, $updatedData)
	{
		$updateQuery = "";

		for($i = 0; $i < count($columnsToUpdate); $i++) {
			$updateQuery .= $columnsToUpdate[$i] . "='" . rawurlencode($updatedData[$i]) . "'";
			if($i != count($columnsToUpdate)-1)
				$updateQuery .= ', ';
		}

		$query = "UPDATE " . $this->selectedTable . " SET " . $updateQuery . " WHERE id='" . $id . "'";
		//echo $query;

		return $this->_registry->db->runQuery($query);
	}

	/*
	 * TODO: Finish insertRow function.
	 */
	public function insertRow($data)
	{
		$vo 				= $data;
		$rowNames			= $vo->getTableRowNames();
		$insertNames		= "";
		$insertValues		= "";

		// Loop through a list of row names that need data inserted into them.
		for($i = 0; $i < count($rowNames); $i++)
		{
			$insertNames       .= $i == 0 ? $rowNames[$i] : ', ' . $rowNames[$i] ;

			// Check if the data to be inserted is in an array.
			if(is_array($vo->$rowNames[$i]))
			{
				$tempArray 		= $vo->$rowNames[$i];
				$insertValues  .= ", '";

				// Loop through array and get all data.
				for($j = 0; $j < count($tempArray); $j++)
				{
					if($j == 0) $insertValues 	.= $tempArray[$j];
					else 		$insertValues 	.= ', ' . $tempArray[$j];
				}
				$insertValues .= "'";
			}

			// If not the just insert the data straight into the $insertValues var.
			else $insertValues .= $i == 0 ? "'" . $vo->$rowNames[$i] . "'" : ", '" . $vo->$rowNames[$i] . "'";
		}

		// Construct the query into one single var.
		$insertQuery = "INSERT INTO " . $this->selectedTable . " (" . $insertNames . ") VALUES (" . $insertValues . ")";

		// echo $insertQuery;

		// Run it.
		$result = $this->_registry->db->runQuery($insertQuery);

		if(!$result)
			echo mysql_error();

		// echo ($result ? 'true' : 'false');
	}
}

?>