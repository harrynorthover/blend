<?php
/**
 * File: Connector.php
 * Created: 10:46:53 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * Used to connect to the database(s) and run querys.
 */

class Connector
{
	const CONNECTED				= "connector.connected";
	const DISCONNECTED			= "connector.disconnected";

	private $_username 			= "root";
	private $_password 			= "";
	private $_database 			= "";
	private $_host				= "localhost";

	private $_connection		= null;
	private $_result			= "";

	/**
	 * Returns/sets the database currently in use.
	 *
	 * @param $value the database - see Types.php.
	 */

	public function setDatabase($database)
	{
		mysql_select_db($database);
	}

	/**
	 * Set the details used by mysql_connect().
	 *
	 * @param $username the database username, $password the database password, $host the host of the database.
	 */

	public function setDetails($username, $password, $host = "localhost")
	{
		if ($username != null)
		{
			$this->_username 	= $username;
			$this->_password 	= $password;
			$this->_host		= $host;
		}
		else
		{
			echo '<p style="color:#e30c0c">*** Error: setDetails() failed as required data was not present. ***</p>';
			return null;
		}
	}

	/**
	 * Connect to the selected mysql database.
	 *
	 * @param none
	 */

	public function connect()
	{
		// connect to the mysql database.
		$_connection = mysql_connect($this->_host, $this->_username, $this->_password);

		// check that it is connected, if not let the user know.
		if (!$_connection) die('<p style="color:#e30c0c">Could not connect to mysql database. Error:' . mysql_error() . "</p>");

		// select the database, this is redundant as now only one database is used.
		$this->setDatabase(Types::DATABASE_NAME);

		return $_connection ? Connector::CONNECTED : Connector::DISCONNECTED;
	}

	/**
	 * Function used to run a query on the selected database.
	 *
	 * @param $query the query that should be run on the selected database.
	 */

	public function runQuery($query)
	{
		if ($query != null) {
			$v = mysql_query($query);
			echo mysql_error();
			return $v;
		} else
			echo '<p style="color:#e30c0c">No query has been specified. Cannot continue.</p>';
	}
}
?>
