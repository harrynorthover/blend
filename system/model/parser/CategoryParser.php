<?php
/**
 * File: CategoryParser.php
 * Created: 6:43:15 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Used to parse category information from the database.
 */

include_once ('interfaces/IParser.php');

class CategoryParser implements IParser
{
	private $databaseData;
	private $parsedData			= array();

	public function parse($data)
	{
		$this->databaseData 	= $data;
		while($row = mysql_fetch_array($this->databaseData))
		{
			$object 			= new CategoryVO($row[0]);
			$object->title($row['title']);
			$object->description($row['description']);

			if ($row['isPrivate'] == 'true')
					$object->isPrivate(true);
			else if ($row['isPrivate'] == 'false')
					$object->isPrivate(false);
			/* If $row['keep_private'] is neither 'yes' or 'no' then set it to private by default. */
			else 	$object->isPrivate(true);

			array_push($this->parsedData, $object);
		}
		return array_reverse($this->parsedData);
	}
}
?>
