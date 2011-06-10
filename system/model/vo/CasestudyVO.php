<?php
/**
 * File: CasestudyVO.php
 * Created: 9:49:52 PM - Aug 23, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This is the basic VO object that other more specialised objects
 * extends.
 */

class CasestudyVO extends ItemVO
{
	private $_description		= "";
 	private $_briefDescription 	= "";
 	private $_client			= "";
 	private $_workType			= "";
 	private $_portfolioId		= "";

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

 	/** Returns/sets the array workType (type of work)
 	 *
 	 * @param $value:Array an array of work types
 	 */

 	public function workType($value = null)
 	{
 		if ($value != null) $this->_workType = $value;
 		else return $this->_workType;
 	}

 	/**
 	 * Returns/sets the link to the work described in the case study
 	 *
 	 * @param the link to be set.
 	 */

 	public function finalLink($value = null)
 	{
 		if ($value != null) $this->_workType = $value;
 		else return $this->_workType;
 	}

 	public function portfolioItemId($value = null)
 	{
 		if ($value != null) $this->_portfolioId = $value;
 		else return $this->_portfolioId;
 	}
}

?>