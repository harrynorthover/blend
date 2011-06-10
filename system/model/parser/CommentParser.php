<?php
/**
 * File: CategoryParser.php
 * Created: 2:06 Saturday 23 April 2011
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Used to parse comments from the database.
 */

include_once ('interfaces/IParser.php');

class CommentParser implements IParser {

	private $databaseData;
	private $parsedData	= array();

	public function parse($data) {
		$this->databaseData = $data;

		while($row = mysql_fetch_array($this->databaseData))
		{
			$object = new CommentVO($row[0]);
			$object->title($row['title']);
			$object->author($row['author']);
			$object->publishDate($row['date']);
			$object->userEmail($row['email']);
			$object->userSite($row['website']);
			$object->comment($row['comment']);
			$object->isPrivate($row['isPrivate']);
			$object->isApproved($row['isApproved']);
			$object->section($row['relevantSection']);
			$object->itemID($row['relevantItemId']);
			$object->isAdminComment($row['isAdminComment']);

			array_push($this->parsedData, $object);
		}
		return array_reverse($this->parsedData);
	}
}
?>