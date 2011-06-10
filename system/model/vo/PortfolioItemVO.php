<?php
/*
 * File: PortfolioItemVO.php
 * Created: 6:27:17 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */

 include_once('extends/ItemVO.php');

 class PortfolioItemVO extends ItemVO
 {
 	private $_description		= "";
 	private $_briefDescription 	= "";
 	private $_client			= "";
 	private $_workType			= "";
 	private $_finalURL			= "";
 	private $_screenshots		= array();
 	private $_previewImage		= "";
 	private $_caseStudyID		= 0;
 	private $_commentsAllowed	= false;

	/**
	 * Constructor that sets up the PortfolioItemVO.
	 *
	 * @param $id item id, $name item name/title, $author the author/creator of the item, $description description of the item, $client name of client, $workType type of work (eg flash,flex,etc), $screenshots an array of screenshot url, $isPrivate whether the item is visible to the public or not.
	 */

 	function __construct($id)
 	{
 		parent::__construct($id);
 	}

 	/**
 	 * Returns/sets the description of the portfolio item.
 	 *
 	 * @param $value:String the description
 	 */

 	public function description($value = null)
 	{
 		if ($value != null) $this->_description = $value;
 		else return $this->_description;
 	}

 	/**
 	 * Returns/sets the brief description of the portfolio item.
 	 *
 	 * @param $value:String the brief description
 	 */

 	public function briefDescription($value = null)
 	{
 		if ($value != null) $this->_briefDescription = $value;
 		else return $this->_briefDescription;
 	}

 	/**
 	 * Returns/sets the client
 	 *
 	 * @param $value:String the client
 	 */

 	public function client($value = null)
 	{
 		if ($value != null) $this->_client = $value;
 		else return $this->_client;
 	}

 	/**
 	 * Returns/sets the array workType (type of work)
 	 *
 	 * @param $value:Array an array of work types
 	 */

 	public function workType($value = null)
 	{
 		if ($value != null) $this->_workType = $value;
 		else return $this->_workType;
 	}

 	/**
 	 * Returns/sets the array of screenshot urls.
 	 *
 	 * @param $value:Array an array of screenshot urls.
 	 */

 	public function screenshots($value = null)
 	{
 		if ($value != null) $this->_screenshots = $value;
 		else return $this->_screenshots;
 	}

	/*
	 * Used the check whether comments can be left on this item.
	 */
 	public function commentsAllowed($value = null)
 	{
 		if ($value != null) $this->_commentsAllowed = $value;
 		else return $this->_commentsAllowed;
 	}

 	/*
 	 * The ID of the case study associated with this item.
 	 */
 	public function caseStudyID($value = null)
 	{
 		if ($value != null) $this->caseStudyID = $value;
 		else return $this->caseStudyID;
 	}

 	/*
 	 * The final url where the work is at.
 	 */
 	public function finalURL($value = null)
 	{
 		if($value != null) $this->_finalURL = $value;
 		else return $this->_finalURL;
 	}

 	/*
 	 * The preview image used on the homepage and in the portfolio list section.
 	 */
 	public function prevImageURL($value = null)
 	{
		if($value != null) $this->_previewImage = $value;
 		else return $this->_previewImage;
 	}

 	/*
 	 * This returns an array of all the database row names used by the insertRow()
 	 * function in databaseProxy.php.
 	 */
 	public function getTableRowNames()
 	{
 		return array('title', 'author', 'publishDate', 'client', 'workType', 'briefDescription', 'description', 'caseStudyID', 'isPrivate', 'commentsAllowed', 'screenshots', 'prevImageURL', 'finalURL');
 	}
 }
?>
