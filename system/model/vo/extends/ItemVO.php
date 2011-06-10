<?php
/**
 * File: ItemVO.php
 * Created: 6:33:52 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This is the basic VO object that other more specialised objects
 * extends.
 */

class ItemVO
{
	private $_id		= "";
	private $_name 		= "";
	private $_date 		= "";
	private $_author 	= "";
	private $_isPrivate	= null;

	protected function __construct($id)
	{
		$this->_id	= $id;
	}

	/**
	 * Returns the id of the item vo.
	 *
	 * @param none.
	 */

	public function getId()
	{
		return $this->_id;
	}

	/**
	 * Returns/sets the name of the item.
	 *
	 * @param $value:String.
	 */

	public function title($value = null)
	{
		if ($value != null) $this->_name = $value;
		else return $this->_name;
	}

	/**
	 * Returns/sets the publish date of the item.
	 *
	 * @param $value:Date.
	 */

	public function publishDate($value = null)
	{
		if ($value != null) $this->_date = $value;
		else return $this->_date;
	}

	/**
	 * Returns/sets the author of the item.
	 *
	 * @param $value:String.
	 */

	public function author($value = null)
	{
		if ($value != null) $this->_author = $value;
		else return $this->_author;
	}

	/**
	 * Returns/sets the visiblity of the item
	 *
	 * @param $value:boolean true for private false for public
	 */

	public function isPrivate($value = null)
	{
		if ($value != null) $this->_isPrivate = $value;
		else
		{
			if($this->_isPrivate) return $this->_isPrivate;
			else return 'false';
		}
	}

	/**
	 * Returns a URL friendly title.
	 */
	public function urlTitle()
	{
		/**
		 * This uses the str_replace() function to remove all spaces and replace
		 * them with '-' characters. A url friendly string is returned.
		 */
		 if($this->_name != null) return str_replace(" ", "-", $this->_name);
		 else echo'<p>ItemVO.php - Please set title() first before calling urlTitle().</p>';
	}
}
?>
