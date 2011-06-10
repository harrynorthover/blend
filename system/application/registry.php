<?php
/*
 * File: registry.php
 * Created: 9:48:12 AM - Aug 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Stores all site wide variables without the use of global.
 */

 class Registry
 {
 	private $vars = array();

 	public function __get($index)
 	{
		return $this->vars[$index];
 	}

 	public function __set($index, $data)
 	{
 		if ($data != null)
 		{
 			$this->vars[$index] = $data;
 		}
 		else
 		{
 			echo "ERROR: " . $index . " cannot be set.";
 		}
 	}
 }
?>
