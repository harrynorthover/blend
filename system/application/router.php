<?php
/*
 * File: router.php
 * Created: 12:58:22 AM - Aug 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This file is responsible for rerouting all the urls to the right
 * controllers.
 */

 class Router
 {
 	/**
 	 * Registry object
 	 */

 	private $registry;

 	private $path			= "";
 	public	$args			= array();
 	public  $folder			= "";
 	public 	$file			= "";
 	public 	$controller		= "";
 	public 	$action			= "";

	function __construct($registry)
	{
		$this->registry = $registry;
	}

	/*
	 * Used to set the path of the controller directory. Should only be called once from index.php.
	 */
	public function setPath($file)
	{
		if(!is_dir($file)) throw new Exception('Invalide controller path: ' . $file);
		$this->path = $file;
	}

	/*
	 * This function loads the controller, executes the action and passes in all parameters.
	 */
	public function loader()
	{
		/*
		 * Process URL, get all necessary infomation about controller/action etc.
		 */
		$this->getController();

		/*
		 * Throw 404 if controller cannot be found.
		 */
		if (is_readable($this->file) == false)
		{
			$this->file = $this->path.'/admin/error404.php';
			$this->controller = 'error404';
		}

		/*
		 * Include the controller.
		 */
		include($this->file);

		/*
		 * Create a new instance of the controller and pass in the registry object.
		 */
		$class = $this->controller;
		$controller = new $class($this->registry);

		/*
		 * Check to see if the action is actually callable.
		 */
		if (is_callable(array($controller, $this->action)) == false) $action = 'index';
		else $action = $this->action;

		/*
		 * Execute the action.
		 */
		$controller->$action($this->args);
	}

 	/**
 	 * Gets a controller
 	 *
 	 * @access public.
 	 * @param $name the name of the controller.
 	 */
 	private function getController()
 	{
		$route = $_GET[Types::URL_KEY];

		if (empty($route)) 
			$route = "index";
		else
		{
			/*
			 * Take the url and split it up into parts for processing.
			 */
			$parts = explode('/', $route);

			/*
			 * Loop through the split URL and extract the folder/controller/action/args[...] from it.
			 */
			for($i = 0; $i < count($parts); $i++)
			{
				/*
				 * Check for folder.
				 */
			 	$this->folder 		= is_dir($this->path . '/' . $parts[0]) ? $parts[0] : '';
			 	/*
			 	 * Get controller.
			 	 */
			 	$this->controller 	= ($this->folder == '') ? $parts[0] : $parts[1];

			 	/*
			 	 * Check for/get action.
			 	 */
			 	$this->action 		= ($this->folder == '') ? $parts[1] : $parts[2];

			 	/*
			 	 * Check for/process action arguments.
			 	 */
			 	if($this->folder == '')
			 	{
			 		if(isset($parts[2])) 
			 			for($j=0; $j < count($parts) - 2; $j++) 
			 				array_push($this->args, $parts[$j+2]);
			 	}
			 	else
			 	{
			 		if(isset($parts[3])) 
			 			for($d=0; $d < count($parts) - 3; $d++) 
			 				array_push($this->args, $parts[$d+3]);
			 	}
			 }
		}

		/*
		 * See if any key variables are empty and if so give them default values.
		 */
		if (empty($this->controller)) $this->controller = Types::INDEX_CONTROLLER;
		if (empty($this->action)) $this->action = Types::INDEX_FUNCTION;

		/*
		 * Construct the absolute URL to the file.
		 */
		$this->file = empty($this->folder) ? $this->path . '/' . $this->controller . '.php' : $this->path . '/' . $this->folder . '/' . $this->controller . '.php';
 	}

 }
?>
