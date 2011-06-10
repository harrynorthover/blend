<?php
/**
 * File: SettingsVO.php
 * Created: 6:27:52 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This file is the VO that will hold all the settings data
 * returned from the database.
 */

 include_once('extends/ItemVO.php');

 class SettingsVO extends ItemVO
 {
	private $_siteTitle			= "";
	private $_siteDescription	= "";

	private $_adminEmail		= "";

	private $_isMaintenanceMode = 'false';

	private $_uploadPath		= "";
	private $_enableUploads		= '';

	private $_twitterUsername	= '';
	private $_twitterPassword	= '';
	private $_enableTwitter		= '';
	private $_autoTweet			= '';

	private $_about 			= '';

	function __construct($id)
	{
		parent::__construct($id);
	}

 	/**
 	 * Returns/sets the site title.
 	 *
 	 * @param $value:String.
 	 */

 	public function siteTitle($value = null)
 	{
 		if ($value != null)
 		{
 			$this->_siteTitle = $value;
 		}
 		else
 		{
			return $this->_siteTitle;
 		}
 	}

 	/**
 	 * Returns/sets the site description.
 	 *
 	 * @param $value:String.
 	 */

 	public function siteDescription($value = null)
 	{
 		if ($value != null)
 		{
 			$this->_siteDescription = $value;
 		}
 		else
 		{
			return $this->_siteDescription;
 		}
 	}

 	/**
 	 * Returns/sites the adminstrators email.
 	 *
 	 * @param $value:String.
 	 */

 	public function adminEmail($value = null)
 	{
 		if ($value != null)
 		{
 			$this->_adminEmail = $value;
 		}
 		else
 		{
			return $this->_adminEmail;
 		}
 	}

 	public function maintenanceMode($value = null)
 	{
		if($value != null)
		{
			$this->_isMaintenanceMode = $value;
		}
		else
		{
			return $this->_isMaintenanceMode;
		}
 	}

 	public function uploadPath($value = null)
 	{
		if($value != null)
		{
			$this->_uploadPath = $value;
		}
		else
		{
			return $this->_uploadPath;
		}
 	}

 	public function enableUploads($value = null)
 	{
		if($value != null)
		{
			$this->_enableUploads = $value;
		}
		else
		{
			return $this->_enableUploads;
		}
 	}

 	public function twitterUsername($value = null)
 	{
		if($value != null)
		{
			$this->_twitterUsername = $value;
		}
		else
		{
			return $this->_twitterUsername;
		}
 	}

  	public function twitterPassword($value = null)
 	{
		if($value != null)
		{
			$this->_twitterPassword = $value;
		}
		else
		{
			return $this->_twitterPassword;
		}
 	}

 	public function enableTwitter($value = null)
 	{
		if($value != null)
		{
			$this->_enableTwitter = $value;
		}
		else
		{
			return $this->_enableTwitter;
		}
 	}

 	public function autoTweet($value = null)
 	{
		if($value != null)
		{
			$this->_autoTweet = $value;
		}
		else
		{
			return $this->_autoTweet;
		}
 	}

	public function about($value = null)
 	{
		if($value != null)
		{
			$this->_about = $value;
		}
		else
		{
			return $this->_about;
		}
 	}


 	public function getTableRowNames()
 	{
 		return array('siteName', 'siteDescription', 'maintenanceMode', 'uploadPath', 'enableUploads', 'twitterUsername', 'twitterPassword', 'enableTwitter', 'autoTweet');
 	}
 }
?>
