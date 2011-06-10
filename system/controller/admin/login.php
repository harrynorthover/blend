<?php
/*
 * File: portfolio.php
 * Created: 12:14:06 AM - Aug 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * The controller used to manage the portfolio.
 */

// include('../model/Insert.php');
// include('../model/Update.php');

 class Login extends baseController
 {
	public function index()
	{
		$this->registry->template->page_title = "harrynorthover.com Login";
		$this->registry->template->show('login');
	}
 }
?>
