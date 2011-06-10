<?php
class Blog extends baseController {
	function index($args)
	{
		$this->registry->template->show('themes/default/post_list');
	}
}
?>