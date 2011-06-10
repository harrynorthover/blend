<?php
  /**
   * File: retrive.php
   * Created: 6:44:28 PM - Aug 14, 2010
   * Project: blend_v2
   *
   * Author: Harry Northover
   *         harrynorthover.com
   *
   * Description:
   * Connects to the relevant databases, gets the data, then parses it to
   * the relevant parsers.
   *
   *     * Parsers available:
   *      --------------------------
   *     - BlogParser.php
   *     - PortfolioParser.php
   *     - SettingsParser.php
   *     - CategorysParser.php
   *     - UsersParser.php
   */

  class Retrive
  {
      /*
       * Registry object
       */
      private $_registry;

      /*
       * Data variables
       */
      private $_table;
      private $_type;
      private $_amount;
      private $_id;

      /**
       * Create the Retrive() object so data can be returned from the database.
       *
       * @param $registry object.
       */

      function __construct($registry)
      {
          $this->_registry = $registry;
      } //function __construct($registry)

      /**
       * Sets up the connection object used to connect to the database.
       * See Connector.php
       *
       * @param none
       */

      private function setupConnection()
      {
          $this->_registry->db->setDetails(Types::DATABASE_USERNAME, Types::DATABASE_PASSWORD, Types::DATABASE_HOST);
          $this->_registry->db->connect();
      } //private function setupConnection()

      /**
       * Gets data from the database.
       *
       * @param $type the table to get data from. Refer to Types.php for full list.
       * @param $amount the amount of records returned (use 'all' for entire record set)
       * @param $id if only 1 specific row needs to be returned.
       */

      public function getData($table, $amount, $id = null, $order = null)
      {
          $this->_table = $table;
          $this->_amount = $amount = null ? 'all' : $amount;
          if ($id) $this->_id = $id;

          $this->setupConnection();

          include_once('proxy/databaseProxy.php');

          /*
           * Load the proxy and get the data from the database.
           */
          $proxy = new databaseProxy($this->_registry);

          $proxy->setTable($this->_table);

          if ($this->_id != null) $data = $proxy->getRowById($this->_id);
          else $data = $proxy->getRows($this->_amount, $order);

          /*
           * Select the relevant parser if there is one.
           */
          switch ($table) {
              case Types::PORTFOLIO_ITEMS_TABLE:
                  include_once('parser/PortfolioParser.php');
                  $parser = new PortfolioParser();

                  break;

              case Types::BLOG_POSTS_TABLE:
                  include_once('parser/BlogParser.php');
                  $parser = new BlogParser();

                  break;

              case Types::CASE_STUDIES_TABLE:
                  include_once('parser/CasestudyParser.php');
                  $parser = new CasestudyParser();

                  break;

              case Types::CATEGORYS_TABLE:
                  include_once('parser/CategoryParser.php');
                  $parser = new CategoryParser();

                  break;

              case Types::COMMENTS_TABLE:
              	  include_once('parser/CommentParser.php');
              	  $parser = new CommentParser();
                  break;

              case Types::LINKS_TABLE:
                  break;

              case Types::SETTINGS_TABLE:
              	  include_once('parser/SettingsParser.php');
              	  $parser = new SettingsParser();
                  break;

              case Types::USERS_TABLE:
                  break;
          } //switch ($table)

          $parsedData = $parser->parse($data);

          /*
           * Return the parsed data back to the controller calling it.
           */
          return $parsedData;
      } //public function getData($table, $amount, $id = null)

      public function getUploadPath()
      {
			$this->setupConnection();

	        include_once('proxy/databaseProxy.php');

	        /*
	         * Load the proxy and get the data from the database.
	         */
	        $proxy = new databaseProxy($this->_registry);
	        $proxy->setTable(Types::SETTINGS_TABLE);
	        $data = $proxy->getRows();

	        while ($row = mysql_fetch_array($data)) $uploadPath = $row['uploadPath'];

	        return $uploadPath;
      }
  } //class Retrive
?>