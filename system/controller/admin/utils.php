<?php
/**
 * File: utils.php
 * Created: 6:31:38 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Used to check data that is in the database against client side generated data.
 */

class utils extends baseController
{
	function index($args) {}

	public function checkdata($args)
	{
		$tableToCheck		= $args[0];
		$columnToCheck 		= $args[1];
		$id					= $args[2];
		$newData			= $args[3];

		$items 				= $this->registry->retrive->getData($tableToCheck, 'all');

		foreach($items as $item):
			if($item->$columnToCheck() == $newData) echo 'true';
		endforeach;
	}

	/**
	 * Used to set whether the item is visible or not. Just sets the new value to opposite
	 * what the previous value was.
	 *
	 * @param $id the id of the item being modified.
	 */
	public function toggleVisibility($args)
	{
		$table 		= $args[0];
		$id			= $args[1];

		if (!$table) echo '*** Error: Please specify a table name! (utils.php - Ln: 44) ***';
		else
		{
			$itemData 		= $this->registry->retrive->getData($table, null, $id);

			$newVisibility 	= ($itemData[0]->isPrivate() == 1) ? 'false' : 'true';
			$jsonData		= ($itemData[0]->isPrivate() == 1) ? 'true' : 'false';

			$this->registry->update->updateData($table, $id, array('isPrivate'), array($newVisibility));

			echo json_encode($jsonData);
		}
	}

	public function getVisibility($args)
	{
		$table 		= $args[0];
		$id			= $args[1];

		$item 		= $this->registry->retrive->getData($table, null, $id);

		if($item[0]->isPrivate() == 1) 	$result = array('isPrivate' => 'true');
		else 							$result = array('isPrivate' => 'false');

		$JSONVars = json_encode($result);
		echo $JSONVars;
	}

	public function sleep($args)
	{
		$milliSeconds = intval($args[0]);

		/*
		 * Limit server abuse by not letting sleep run for more than 60 seconds.
		 */
	    if($milliSeconds > 60*1000) $milliSeconds = 5;

	    // Note: usleep is in micro seconds not milli.
	    usleep($milliSeconds * 1000);
	}
}

?>