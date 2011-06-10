<?php
/*
 * File: index.php
 * Created: 10:03:45 AM - Aug 15, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * The main entry point for the CMS.
 */

ini_set( 'display_errors', 1 );
error_reporting(E_ALL);

/**
 *  Define the site path constant
 */

$site_path = dirname( __FILE__ );
define( '__SITE_PATH', $site_path );

/*
 * Include the init.php file
 */
include( 'system/application/includes/init.php' );

 // create connection object.
 $con 					= new Connector();
 $registry->db 			= $con;

/*
 * Create the router object then set the default controller path.
 */
$registry->router 		= new Router( $registry );
$registry->router->setPath( __SITE_PATH . '/system/controller' );
$registry->template 	= new template( $registry );

/*
 * If you want the change the theme set this value to the name
 * of the folder the theme resides in with the 'themes' directory.
 *
 * NOTE: This is currently redundant as the location of the views is
 * specified completly within the controllers.
 */
$registry->themeName 	= "default";

/*
 * Create the retrive object so data can be retrived from the
 * database.
 */
$registry->retrive 		= new Retrive( $registry );
$registry->delete		= new Delete( $registry );
$registry->update		= new Update( $registry );
$registry->insert		= new Insert( $registry );

/*
 * Create the file system object so files can be viewed/deleted etc...
 */
$registry->filesystem	= new FileSystem( $registry );

/*
 * Load the controller.
 */
$registry->router->loader();
?>
