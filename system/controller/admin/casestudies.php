<?php
class Casestudies extends baseController {
	function index($args) {}

	public function delete($args)
	{
		if (!$args[0])
		{
			echo '<p>Item ID not specified. Cannot continue!</p>';
			return ;
		}
		else
		{
			$result = $this->registry->delete->deleteRow(Types::CASE_STUDIES_TABLE, $args[0]);
			if($result) echo 'Item ' . $args[0] . ' deleted.';
			else echo 'Item ' . $args[0] . ' not deleted.';
		}
	}

	public function changeTitle($args)
	{
		if (!$args[0]) echo 'Error! Required params have not been specified.';
		else
		{
			echo 'true';
			$this->registry->update->updateData(Types::CASE_STUDIES_TABLE, $args[0], array('title'), array($args[1]));
		}
	}
}