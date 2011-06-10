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

 class CommentVO extends ItemVO
 {
 	private $_section		= '';
 	private $_itemID		= '';
 	private $_isApproved 	= "";
 	private $_comment		= '';
 	private $_userEmail		= '';
 	private $_userSite		= '';
 	private $_isAdminComment = '';

	function __construct($id)
	{
		parent::__construct($id);
	}

 	/**
	 * Returns/sets the ID of the item that the comment is made on.
	 *
	 * @param $value:String.
	 */

	public function itemID($value = null)
	{
		if ($value != null)
		{
			$this->_itemID = $value;
		}
		else
		{
			return $this->_itemID;
		}
	}

 	/**
	 * Returns/sets the section the comment is it (Portfolio or Blog)
	 *
	 * @param $value:String.
	 */

	public function section($value = null)
	{
		if ($value != null)
		{
			$this->_section = $value;
		}
		else
		{
			return $this->_section;
		}
	}

	/**
	 * Returns/sets the description of the TagVO
	 *
	 * @param $value:String.
	 */

	public function comment($value = null)
	{
		if ($value != null)
		{
			$this->_comment = $value;
		}
		else
		{
			return $this->_comment;
		}
	}

	 /**
	 * Returns/sets the description of the userEmail
	 *
	 * @param $value:String.
	 */

	public function userEmail($value = null)
	{
		if ($value != null)
		{
			$this->_userEmail = $value;
		}
		else
		{
			return $this->_userEmail;
		}
	}

   /**
	 * Returns/sets the whether the comment has been approved my the user.
	 *
	 * @param $value:String.
	 */

	public function isApproved($value = null)
	{
		if ($value != null)
		{
			$this->_isApproved = $value;
		}
		else
		{
			return $this->_isApproved;
		}
	}

   /**
	 * Returns/sets the whether the comment has been approved my the user.
	 *
	 * @param $value:String.
	 */

	public function userSite($value = null)
	{
		if ($value != null)
		{
			$this->_userSite = $value;
		}
		else
		{
			return $this->_userSite;
		}
	}

   /**
	 * Returns/sets the whether the comment has been approved my the user.
	 *
	 * @param $value:String.
	 */

	public function isAdminComment($value = null)
	{
		if ($value != null)
		{
			$this->_isAdminComment = $value;
		}
		else
		{
			return $this->_isAdminComment;
		}
	}

 	/*
 	 * This returns an array of all the database row names used by the insertRow()
 	 * function in databaseProxy.php.
 	 */
 	public function getTableRowNames()
 	{
 		return array('title', 'author', 'date', 'email', 'website', 'comment', 'relevantSection', 'relevantItemId', 'isApproved', 'isPrivate', 'isAdminComment');
 	}
 }
?>
