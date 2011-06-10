<?php

Class Template {

	/*
	 * @the registry
	 * @access private
	 */
	private $registry;

	/*
	 * @Variables array
	 * @access private
	 */
	private $vars = array();

	/**
	 *
	 * @constructor
	 *
	 * @access public
	 *
	 * @return void
	 *
	 */
	function __construct($registry)
	{
		$this->registry = $registry;
	}


	/**
	 *
	 * @set undefined vars
	 *
	 * @param string $index
	 *
	 * @param mixed $value
	 *
	 * @return void
	 *
	 */
	public function __set($index, $value)
	{
		$this->vars[$index] = $value;
	}


	function show($name) {
		$path = __SITE_PATH . '/' . $name . '.php';

		if (file_exists($path) == false)
		{
			throw new Exception('Template not found in '. $path);
			return false;
		}

		/*
		 * Pass the root site url into all templates so it is available for use.
		 */
		$this->vars['site_url'] = __SITE_PATH;

		// Load variables
		foreach ($this->vars as $key => $value)
		{
			$$key = $value;
		}

		include ($path);
	}

}

?>
