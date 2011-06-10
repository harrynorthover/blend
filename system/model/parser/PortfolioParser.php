<?php
/**
 * File: PortfolioParser.php
 * Created: 6:43:08 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * The parsed used to take the raw data returned from PortfolioProxy and parse
 * it into usable PortfolioItemVO.php objects.
 */

include_once('interfaces/IParser.php');

class PortfolioParser implements IParser
{
	private $databaseData;
	private $parsedData		= array();

	public function parse($data)
	{
		/*
		 * Assign the data returned from the PortfolioProxy.php to $this->databaseData.
		 */
		$this->databaseData = $data;
		//echo '<p>PortfolioParser.php - Database Length: ' . $this->databaseData . '</p>';
		/*
		 * Process through the data returned from the proxy.
		 */
		while($row = mysql_fetch_array($this->databaseData))
		{
			//echo 'processing...';
			$object = new PortfolioItemVO($row['id']);
			$object->title($row['title']);
			$object->author('Harry Northover');
			$object->client($row['client']);
			$object->publishDate($row['publishDate']);
			$object->briefDescription(substr(strip_tags($row['description'],"<br>, <b>, <i>, <li>"), 0, 80) . '...');
			$object->description($row['description']);
			$object->prevImageURL($row['prevImageURL']);
			$object->caseStudyID($row['caseStudyID']);
			$object->workType($row['workType']);
			$object->finalURL($row['finalURL']);

			$screenshots = $row['screenshots'];
			$screenSArrays = explode(',', $screenshots);

			$object->screenshots($screenSArrays);

			if ($row['isPrivate'] == 'true') $object->isPrivate(true);
			else if($row['isPrivate'] == 'false') $object->isPrivate(false);
			else
			{
				/* If $row['keep_private'] is neither 'yes' or 'no' then set it to private by default. */
				$object->isPrivate(true);
			}

			/*
			 * Push the new object to the array containing the parsed objects.
			 */
			array_push($this->parsedData, $object);
		}

		//echo '<p>PortfolioParser.php - Array length: ' . count($this->parsedData) . '</p>';
		/*
		 * Reverse the array so the oldest items are at
		 * the start of the array, then return it.
		 */
		return array_reverse($this->parsedData);
	}
}
?>
