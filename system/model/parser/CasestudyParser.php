<?php
/**
 * File: BlogParser.php
 * Created: 6:42:57 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * The parser for the data returned from the blog database.
 */

include_once ('interfaces/IParser.php');

class CasestudyParser implements IParser
{
	/*
	 * Raw data.
	 */
	private $databaseData;
	private $parsedData 	= array();

	public function parse($data)
	{
		$this->databaseData = $data;
		while($row = mysql_fetch_array($this->databaseData))
		{
			$object = new CasestudyVO($row[0]);
			$object->title($row['title']);
			//$object->publishDate($row['date']);
			$object->client($row['client']);
			$object->description($row['content']);
			//$object->briefDescription($row['briefDescription']);
			$object->finalLink($row['finalLink']);

			if ($row['isPrivate'] == 'true')
			{
				$object->isPrivate(true);
			}
			else if ($row['isPrivate'] == 'false')
			{
				$object->isPrivate(false);
			}
			else
			{
				/* If $row['keep_private'] is neither 'yes' or 'no' then set it to private by default. */
				$object->isPrivate(true);
			}

			array_push($this->parsedData, $object);
		}

		return array_reverse($this->parsedData);
	}
}

?>