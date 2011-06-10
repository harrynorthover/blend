<?php
/**
 * File: FileSystem.php
 * Created: 06:25:01 PM - Oct 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This class is used to manage files in the uploads folder.
 */

class FileSystem
{
	private $_registry;

	private $currentDirectory;

	/**
     * Create the Retrive() object so data can be returned from the database.
     *
     * @param $registry object.
     */

    function __construct($registry)
    {
        $this->_registry = $registry;
    } //function __construct($registry)

	public function getFiles($type = null)
	{
		$files = array();

		if($handle = opendir($this->currentDirectory))
		{
			while (false !== ($file = readdir($handle)))
			{
				if($file != '.' && $file != '..')
				{
					array_push($files, $file);
				}
			}
		}

		return $files;
	} // public function getFiles()

	public function deleteFile($file)
	{
		// delete the file and check it was successful.
		if(unlink($currentDirectory . $fileName)) echo 'true';
	}

	public function setCurrentDirectory($newDirectory)
	{
		if($newDirectory != null) $this->currentDirectory = $newDirectory;
	}

	public function getCurrentDirectory()
	{
		return $this->currentDirectory;
	}
}
?>