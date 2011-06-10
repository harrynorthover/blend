<?php
/**
 * File: UserVO.php
 * Created: 6:44:11 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */

 include('extends/ItemVO.php');

 class UserVO extends ItemVO
 {
 	private $_username 			= "";
 	private $_password 			= "";
 	private $_privLevel 		= "";
 	private $_dateRegistered 	= "";
 	private $_userEmail			= "";

	function init($id, $name = "", $username = "", $password = "", $level = "", $dateRegistered = "", $email = "")
	{
		parent::init($id, $name, $dateRegistered);

		$this->_username 			= $username;
		$this->_password 			= $password;
		$this->_privLevel 		= $level;
		$this->_dateRegistered 	= $dateRegistered;
		$this->_userEmail			= $email;
	}

	/**
	 * Returns/sets the username of the current user.
	 *
	 * @param $value:String.
	 */

	function username($value = null)
	{
		if ($value != null)
		{
			$this->_username = $value;
		}
		else
		{
			return $this->_username;
		}
	}

	/**
	 * Returns/sets the password of the current user.
	 *
	 * @param	$value:String.
	 */

	function password($value = null)
	{
		if ($value != null)
		{
			$this->_password = $value;
		}
		else
		{
			return $this->_password;
		}
	}

	/**
	 * Sets the privlige level of the current user.
	 * 1 => Read only.
	 * 2 => Only edit post/portfolio items.
	 * 3 => Edit all.
	 *
	 * @param $string:Number.
	 */

	function privLevel($value = null)
	{
		if ($value != null)
		{
			$this->_privLevel = $value;
		}
		else
		{
			return $this->_privLevel;
		}
	}

	/**
	 * Returns the date the user registered.
	 *
	 * @param none.
	 */

	function dateRegistered($value = null)
	{
		return $this->_dateRegistered;
	}

	/**
	 * Returns/sets the email of the user.
	 *
	 * @param $value:String.
	 */

	function email($value = null)
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
 }
?>
