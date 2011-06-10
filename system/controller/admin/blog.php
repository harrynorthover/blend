<?php
/*
 * File: blog.php
 * Created: 1:20:40 PM - Aug 17, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */
 class Blog extends baseController
 {
	function index($args)
	{
	}

	public function posts()
	{
		$this->registry->template->entries = $this->registry->retrive->getData(Types::BLOG_POSTS_TABLE, 'all');
		$this->registry->template->show('system/themes/default/posts');
	}

	public function add()
	{
		$this->registry->filesystem->setCurrentDirectory($this->registry->retrive->getUploadPath());

		$this->registry->template->categorys 		= $this->registry->retrive->getData(Types::CATEGORYS_TABLE, 'all');
		$this->registry->template->files			= $this->registry->filesystem->getFiles();
		$this->registry->template->show('system/themes/default/addBlogPost');
	}

	public function insert($args)
	{
		echo $_POST['description'];

		$vo = new BlogItemVO(0);
		$vo->title = $_POST['title'];
		$vo->author = $_POST['author'];
		$vo->date = date("l d, F Y");
		$vo->tags = $_POST['categoryID'];
		$vo->content = $_POST['description'];
		$vo->isPrivate = $_POST['isPrivate'];
		$vo->commentsAllowed = $_POST['commentsAllowed'];
		$vo->previewImageURL = $_POST['prevImageURL'];

		$this->registry->insert->insertData(Types::BLOG_POSTS_TABLE, $vo);
	}

	public function edit($args)
	{
		$this->registry->filesystem->setCurrentDirectory($this->registry->retrive->getUploadPath());

		$this->registry->template->categorys 		= $this->registry->retrive->getData(Types::CATEGORYS_TABLE, 'all');
		$this->registry->template->files			= $this->registry->filesystem->getFiles();

		$vo											= $this->registry->retrive->getData(Types::BLOG_POSTS_TABLE, 1, $args[0]);
		$this->registry->template->post				= $vo[0];

		$this->registry->template->show('system/themes/default/editBlogPost');
	}

	public function update($args)
	{
		$vo = new BlogItemVO(0);
		$updatedData = array($_POST['title'], $_POST['author'], $_POST['date'], $_POST['categoryID'], $_POST['description'], $_POST['isPrivate'], 'true', $_POST['previewImage'], date('l jS \of F Y h:i:s A'));

		for($i = 0; $i < count($updatedData); $i++)
			$updatedData[$i] = rawurldecode($updatedData[$i]);

		$this->registry->update->updateData(Types::BLOG_POSTS_TABLE, $args[0], $vo->getTableRowNames(), $updatedData);
	}

	/**
	 * Deletes a blog post from the database.
	 *
	 * @param $id the id of the post that needs to be deleted.
	 */
	public function delete($args)
	{
		if (!$args[0])
		{
			echo '<p>Item ID not specified. Cannot continue!</p>';
			return ;
		}
		else
		{
			$result = $this->registry->delete->deleteRow(Types::BLOG_POSTS_TABLE, $args[0]);
			if($result) echo 'Item ' . $args[0] . ' deleted.';
			else echo 'Item ' . $args[0] . ' not deleted.';
		}
	}

	/**
	 * Changes the title of a blog post
	 *
	 * @param $args[0] - id of the post to be updated.
	 * @param $args[1] - the post's new title.
	 */
	public function changeTitle($args)
	{
		if (!$args[0])
		{
			echo 'error';
		}
		else
		{
			echo 'true';
			$this->registry->update->updateData(Types::BLOG_POSTS_TABLE, $args[0], array('title'), array($args[1]));
		}
	}
 }
?>
