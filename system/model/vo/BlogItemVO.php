<?php
/*
 * File: BlogItemVO.php
 * Created: 6:27:06 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This is the VO that will hold all the data for a blog item
 * that is returned from the database via BlogProxy.php.
 */

 include_once('extends/ItemVO.php');

 class BlogItemVO extends ItemVO
 {
 	private $_content			= "";
 	private $_tags				= "";
 	private $_public			= false;
 	private $_commentsAllowed	= "";
 	private $_previewImageURL	= "";
 	private $_lastEdited		= "";

	function __construct($id)
	{
		parent::__construct($id);
	}

	/**
	 * Returns/sets the content of the blog post, generally in HTML format.
	 *
	 * @param $value:String;
	 */

	public function content($value = null)
	{
		if ($value != null) $this->_content = $value;
		else return $this->_content;
	}

	/**
	 * Returns/sets the tags that the blog item is associated.
	 *
	 * @param $value:Array.
	 */

	public function tags($value = null)
	{
		if ($value != null) $this->_tags = $value;
		else return $this->_tags;
	}

	public function commentsAllowed($value = null)
	{
		if ($value != null) $this->_commentsAllowed = $value;
		else return $this->_commentsAllowed;
	}

 	public function previewImageURL($value = null)
	{
		if ($value != null) $this->_previewImageURL = $value;
		else return $this->_previewImageURL;
	}

	public function lastEdited($value = null)
	{
		if ($value != null) $this->_lastEdited = $value;
		else return $this->_lastEdited;
	}

  	/*
 	 * This returns an array of all the database row names used by the insertRow()
 	 * function in databaseProxy.php.
 	 */
 	public function getTableRowNames()
 	{
 		return array('title', 'author', 'date', 'tags', 'content', 'isPrivate', 'commentsAllowed', 'previewImageURL', 'lastEdited');
 	}

 }
?>
