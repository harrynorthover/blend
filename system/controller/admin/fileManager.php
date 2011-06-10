<?php
/*
 * File: fileManager.php
 * Created: 5:35:10 PM - Oct 13, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 */

class FileManager extends baseController
{
	function index($args)
	{
		// set the directory.
		$this->registry->filesystem->setCurrentDirectory($this->registry->retrive->getUploadPath());

		// get a list of files from the uploads folder.
		$this->registry->template->files 			= $this->registry->filesystem->getFiles();

		// get the uploads path.
		$this->registry->template->currentDirectory = $this->registry->retrive->getUploadPath();

		// load the view
		$this->registry->template->show('system/themes/default/fileManager');
	}

	/*
	 * Call via jQuery .get().
	 */
	private function renameFile($args)
	{

	}

	public function upload($args)
	{
		$folderName 			= explode('/', $_SERVER["REQUEST_URI"]);
		//$folderName[1]		   .= '/blend';
		$target_path 			= $_SERVER['DOCUMENT_ROOT'] . '/' . $folderName[1] . '/' . $this->registry->retrive->getUploadPath() . '/' . basename( $_FILES['fileName']['name']);

		if(move_uploaded_file($_FILES['fileName']['tmp_name'], $target_path)) header( 'Location: fileManager' ) ;
		else echo "There was an error uploading the file, try again!";
	}

	public function delete($args)
	{
		//$amountOfParams 		= count($args);
		$fileName				= $_POST['fileName'];
		$folderName 			= explode('/', $_SERVER["REQUEST_URI"]);

		echo $fileName;

		// check a file was actually specified.
		// if($args[0] == '' || $args[0] == null) echo 'false';

		/*for($i = 0; $i < $amountOfParams; $i++)
			$fileName .= ($i == 0 || $i == $amountOfParams) ? $args[$i] : '.' . $args[$i];*/

		// mash together an absolute path to the uploads url.
		$uploadsDirectory = $_SERVER['DOCUMENT_ROOT'] . '/' . $folderName[1] . '/' . $this->registry->retrive->getUploadPath() . '/';

		if(Types::DEBUG) {
			echo 'UPLOADS DIR:' . $uploadsDirectory;
			echo '<br> FILE NAME:' . $fileName;
		}

		// actually delete the file and check it was successful.
		if(unlink($uploadsDirectory . $fileName))
			echo 'true';
	}
}
?>