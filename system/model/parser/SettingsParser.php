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
 * The parsed used to take the raw data returned from databaseProxy and parse
 * it into usable SettingsVO objects.
 */

include_once('interfaces/IParser.php');

class SettingsParser implements IParser
{
	private $databaseData;
	private $parsedData		= array();

	public function parse($data)
	{
		/*
		 * Assign the data returned from the PortfolioProxy.php to $this->databaseData.
		 */
		$this->databaseData = $data;

		/*
		 * Process through the data returned from the proxy.
		 */
		while($row = mysql_fetch_array($this->databaseData))
		{
			$vo = new SettingsVO($row['id']);
			$vo->siteTitle($row['siteName']);
			$vo->siteDescription($row['siteDescription']);
			$vo->adminEmail($row['adminEmail']);
			$vo->maintenanceMode($row['maintenanceMode']);
			$vo->uploadPath($row['uploadPath']);
			$vo->enableUploads($row['enableUploads']);
			$vo->twitterUsername($row['twitterUsername']);
			$vo->twitterPassword($row['twitterPassword']);
			$vo->enableTwitter($row['enableTwitter']);
			$vo->autoTweet($row['autoTweet']);
			$vo->about($row['about']);
			/*
			 * Push the new object to the array containing the parsed objects.
			 */
			array_push($this->parsedData, $vo);
		}

		/*
		 * Reverse the array so the oldest items are at
		 * the start of the array, then return it.
		 */
		return array_reverse($this->parsedData);
	}
}
?>
