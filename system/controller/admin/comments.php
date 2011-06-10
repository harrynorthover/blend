<?php
class Comments extends baseController {
	function index($args) { Comments::view($args); }

	public function view($args)
	{
		$c = $this->registry->retrive->getData(Types::COMMENTS_TABLE, 'all');
		// echo $c[1]->comment();
		$this->registry->template->comments = $c;
		$this->registry->template->show('system/themes/default/comments');
	}

	public function edit($args)
	{
		$id = $args[0];
		$c = $this->registry->retrive->getData(Types::COMMENTS_TABLE, 'all', $id);
		$this->registry->template->comment = $c[0];
		$this->registry->template->show('system/themes/default/editComment');
	}

	public function update($args)
	{
		$id = $args[0];
		$vo = new CommentVO(0);

		$updatedData = array($_POST['title'], $_POST['author'], $_POST['date'], $_POST['email'], $_POST['website'], $_POST['comment'], $_POST['section'], $_POST['itemId'], $_POST['isApproved'], 'false', 'false');

		$this->registry->update->updateData(Types::COMMENTS_TABLE, $id, $vo->getTableRowNames(), $updatedData);
	}

	public function handleForm($args)
	{
		$array = $_POST['approve'];
		$act = ($_POST['act'] == 'unapprove') ? 'false' : 'true';

		for($i = 0; $i < count($array); $i++)
			$this->registry->update->updateData(Types::COMMENTS_TABLE, $array[$i], array('isApproved'), array($act));

		header( 'Location: /blend_v2/admin/comments' ) ;
	}

	public function approve($args)
	{
		$id = $args[0];
		$this->registry->update->updateData(Types::COMMENTS_TABLE, $id, array('isApproved'), array('true'));
		header( 'Location: /blend_v2/admin/comments' ) ;
	}

	public function unapprove($args)
	{
		$id = $args[0];
		$this->registry->update->updateData(Types::COMMENTS_TABLE, $id, array('isApproved'), array('false'));

		header( 'Location: /blend_v2/admin/comments' ) ;
	}

	public function delete($args)
	{
		$id = $args[0];
		$this->registry->delete->deleteRow(Types::COMMENTS_TABLE, $id);
	}

	/**
	 * Used to change the title of a comment.
	 *
	 * @param $id the id of the item being modified.
	 */
	public function changeTitle($args)
	{
		if (!$args[0]) echo 'Error! Required params for changeTitle() [File:comments.php, Ln:18] have not been specified.';
		else
		{
			echo 'true';
			$this->registry->update->updateData(Types::COMMENTS_TABLE, $args[0], array('title'), array($args[1]));
		}
	}
}
?>