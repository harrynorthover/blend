<?php
/*
 * Created on 18 Aug 2010
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

 class error404 extends baseController
 {
 	function index($args)
 	{
 		/*echo '<h1>404</h1>';
 		echo '$args: ' . count($args);*/
		$this->registry->template->show('system/themes/default/error404');
 	}
 }
?>
