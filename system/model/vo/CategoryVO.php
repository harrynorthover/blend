<?php
/**
 * File: TagItemVO.php
 * Created: 6:27:27 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */

 include_once('extends/ItemVO.php');

 class CategoryVO extends ItemVO
 {
 	private $_description 	= "";

	function __construct($id)
	{
		parent::__construct($id);
	}

	/**
	 * Returns/sets the description of the TagVO
	 *
	 * @param $value:String.
	 */

	function description($value = null)
	{
		if ($value != null)
		{
			$this->_description = $value;
		}
		else
		{
			return $this->_description;
		}
	}

 	/*
 	 * This returns an array of all the database row names used by the insertRow()
 	 * function in databaseProxy.php.
 	 */
 	public function getTableRowNames()
 	{
 		return array('title', 'description', 'isPrivate');
 	}
 }
?>
