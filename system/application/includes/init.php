<?php
/*
 * File: init.php
 * Created: 10:03:01 AM - Aug 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This file includes all the files that are needed across the site
 * and then creates the registry that is used to store all site data,
 * then creates a Connector() object that is used to connect to the
 * database.
 */

 /** include site wide consts ***/
 require_once(__SITE_PATH . '/system/application/config/config.php');

 /*** include the controller class ***/
 require_once(__SITE_PATH . '/system/application/baseController.php');

 /*** include the registry class ***/
 require_once(__SITE_PATH . '/system/application/registry.php');

 /*** include the router class ***/
 require_once(__SITE_PATH . '/system/application/router.php');

 /*** include the template class ***/
 require_once(__SITE_PATH . '/system/application/template.php');

 /*** include the db connector ***/
 require_once(__SITE_PATH . '/system/model/connector.php');
 require_once(__SITE_PATH . '/system/model/retrive.php');
 require_once(__SITE_PATH . '/system/model/update.php');
 require_once(__SITE_PATH . '/system/model/insert.php');
 require_once(__SITE_PATH . '/system/model/delete.php');

 /*** include the file system utils ***/
 require_once(__SITE_PATH . '/system/model/filesystem.php');

 require_once(__SITE_PATH . '/system/model/vo/PortfolioItemVO.php');
 require_once(__SITE_PATH . '/system/model/vo/BlogItemVO.php');
 require_once(__SITE_PATH . '/system/model/vo/CasestudyVO.php');
 require_once(__SITE_PATH . '/system/model/vo/CategoryVO.php');
 require_once(__SITE_PATH . '/system/model/vo/CommentVO.php');
 require_once(__SITE_PATH . '/system/model/vo/SettingsVO.php');

/**
 * Create a new registry object.
 * This stores all the data that is used site wide.
 *
 * @param none
 */

 $registry = new Registry();

?>
