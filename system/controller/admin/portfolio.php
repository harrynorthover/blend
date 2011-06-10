<?php
/*
 * File: portfolio.php
 * Created: 3:20:50 PM - Aug 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */

class Portfolio extends baseController
{
	function index($args) {}

	public function items()
	{
		// query the database, return and assign results to relevant view variables.
		$this->registry->template->items 			= $this->registry->retrive->getData(Types::PORTFOLIO_ITEMS_TABLE, 'all');
		$this->registry->template->show('system/themes/default/portfolioItems');
	}

	/**
	 * Shows the add view for a portfolio item.
	 */
	public function add($args)
	{
		$this->registry->filesystem->setCurrentDirectory($this->registry->retrive->getUploadPath());

		$this->registry->template->cs 				= $this->registry->retrive->getData(Types::CASE_STUDIES_TABLE, 'all');
		$this->registry->template->categorys 		= $this->registry->retrive->getData(Types::CATEGORYS_TABLE, 'all');
		$this->registry->template->files			= $this->registry->filesystem->getFiles();
		$this->registry->template->show('system/themes/default/addPortfolioItem');
	}

	public function insert($args)
	{
		$tempVO 									= new PortfolioItemVO(0);
		$tempVO->title								= $_POST['title'];
		$tempVO->publishDate						= date("l d, F Y");
		$tempVO->author								= 'Harry Northover';
		$tempVO->isPrivate							= $_POST['isPrivate'];
		$tempVO->briefDescription					= $_POST['briefDescription'];
		$tempVO->description						= $_POST['description'];
		$tempVO->client								= $_POST['client'];
		$tempVO->workType							= $_POST['categoryID'];
		$tempVO->screenshots						= array($_POST['screenshot1'], $_POST['screenshot2'], $_POST['screenshot3']);
		$tempVO->finalURL							= $_POST['finalLink'];
		$tempVO->prevImageURL						= $_POST['previewImage'];
		$tempVO->caseStudyID						= $_POST['casestudyID'];

		/*
		 * TODO: Implement 'commentsAllowed' instead of just giving it a default value of
		 * true.
		 */
		$tempVO->commentsAllowed					= 'true';

		/*
		 * Insert all the data above into the database.
		 */

		/*echo 'Title: ' . $tempVO->title;
		echo 'Client: ' . $tempVO->client;
		echo 'Brief Description: ' . $tempVO->briefDescription;
		echo 'Work Type: ' . $tempVO->workType;
		echo 'Final URL: ' . $tempVO->finalURL;*/

		$this->registry->insert->insertData(Types::PORTFOLIO_ITEMS_TABLE, $tempVO);
	}

	/**
	 * Shows the editing view for a portfolio item.
	 */
	public function update($args)
	{
		echo 'count($args): ' . count($args);
		echo ' - ID:' . $_POST['categoryID'];

		$vo = new PortfolioItemVO(0);
		$screenshots = $_POST['screenshot1'] . ',' . $_POST['screenshot2'] . ',' . $_POST['screenshot3'];
		$updatedData = array($_POST['title'], 'Harry Northover', $_POST['date'], $_POST['client'], $_POST['categoryID'], $_POST['briefDescription'], $_POST['description'], $_POST['casestudyID'], 'false', 'true', $screenshots, $_POST['previewImage'], $_POST['finalLink'] );

		echo $this->registry->update->updateData(Types::PORTFOLIO_ITEMS_TABLE, $args[0], $vo->getTableRowNames(), $updatedData);
	}

	/**
	 * Deletes a portfolio item from the database.
	 *
	 * @param $id the id of the item that needs to be deleted.
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
			$result = $this->registry->delete->deleteRow(Types::PORTFOLIO_ITEMS_TABLE, $args[0]);
			if($result) echo 'Item ' . $args[0] . ' deleted.';
			else echo 'Item ' . $args[0] . ' not deleted.';
		}
	}

	public function edit($args)
	{
		/*
		 * TODO: Write the portfolio edit function.
		 */
		$this->registry->template->cs 				= $this->registry->retrive->getData(Types::CASE_STUDIES_TABLE, 'all');
		$this->registry->template->categorys 		= $this->registry->retrive->getData(Types::CATEGORYS_TABLE, 'all');

		$this->registry->filesystem->setCurrentDirectory($this->registry->retrive->getUploadPath());
		$this->registry->template->files			= $this->registry->filesystem->getFiles();

		$tempObject 								= $this->registry->retrive->getData(Types::PORTFOLIO_ITEMS_TABLE, 1, $args[0]);
		$this->registry->template->item 			= $tempObject[0];

		$screenshots 								= $tempObject[0]->screenshots();

		$this->registry->template->screenshot1		= $screenshots[0];
		$this->registry->template->screenshot2		= $screenshots[1];
		$this->registry->template->screenshot3		= $screenshots[2];

		$this->registry->template->show('system/themes/default/editPortfolioItem');
	}

	/**
	 * Used to set whether the item is visible or not. Just sets the new value to opposite
	 * what the previous value was.
	 *
	 * @param $id the id of the item being modified.
	 */
	public function changeTitle($args)
	{
		if (!$args[0]) echo 'Error! Required params for changeTitle() [File:portfolio.php, Ln:127] have not been specified.';
		else
		{
			echo 'true';
			$this->registry->update->updateData(Types::PORTFOLIO_ITEMS_TABLE, $args[0], array('title'), array($args[1]));
		}
	}
}
?>