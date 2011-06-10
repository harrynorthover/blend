<?php
/*
 * File: IParser.php
 * Created: 7:54:46 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */
 interface IParser
 {
 	/***
 	 * Parses the data provided
 	 *
 	 * @param data the data object.
 	 */
 	public function parse($data);
 }
?>
