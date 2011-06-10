<?php
class Categorys extends baseController
{
	function index($args) {}

	public function add($args) {
		/* TODO: Write categorys add() function. */
		$this->registry->template->show('system/themes/default/addCategory');
	}

	public function insert($args) {
		/* TODO: Write categorys insert() function. */
		// echo $_POST['title'];

		$tmp = new CategoryVO(0);
		$tmp->title = $_POST['title'];
		$tmp->description = $_POST['desc'];
		$tmp->isPrivate = 'false';

		$this->registry->insert->insertData(Types::CATEGORYS_TABLE, $tmp);
	}

	public function update($args) { /* TODO: Write categorys update() function. */ }

	/**
	 * Used to set whether the item is visible or not. Just sets the new value to opposite
	 * what the previous value was.
	 *
	 * @param $id the id of the item being modified.
	 */
	public function changeTitle($args)
	{
		if (!$args[0]) echo 'ERROR: Required params for changeTitle() [File:admin/categorys.php, Ln:25] have not been specified.';
		else
		{
			echo 'true';
			$this->registry->update->updateData(Types::CATEGORYS_TABLE, $args[0], array('title'), array($args[1]));
		}
	}

	/**
	 * Deletes a portfolio item from the database.
	 *
	 * @param $id the id of the item that needs to be deleted.
	 */
	public function delete($args)
	{
		if (!$args[0]) echo '<p>Item ID not specified. Cannot continue!</p>';
		else $result = $this->registry->delete->deleteRow(Types::CATEGORYS_TABLE, $args[0]);
	}
}