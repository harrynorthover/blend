<?php
/*
 * File: Types.php
 * Created: 11:22:48 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Descriptions:
 * Contains const that are used globally over the site, containing
 * database names.
 */

class Types
{
	/* (NOT YET IMPLEMENTED)
	 * The default admin theme. To create a new theme, create a folder
	 * in 'system/themes' then insert the name of the folder into here. 
	 */
	const ADMIN_THEME			= 'default';
	
	/*
	 * (NOT YET IMPLEMENTED)
	 * The default theme for the site. See instructions above on how to
	 * create a new one. Place in '/themes' directory.
	 */
	const THEME					= '';
	
	/*
	 * Default controller & function to call when none is specified in the
	 * URL.
	 */
	const INDEX_CONTROLLER		= 'main';
	const INDEX_FUNCTION		= 'index';

	/*
	 * Url key used to get data from the url.
	 * eg index.php?URL_KEY=controller/functions/param/param....
	 */
	const URL_KEY				= 'go';
	
	/*
	 * Enable when in development mode, outputs useful
	 * data (eg query strings, errors, etc...)
	 */
	const DEBUG					= true;

	/*
	 * Database user information.
	 */

	/*const DATABASE_USERNAME 	= "db48734_harry";
	const DATABASE_PASSWORD 	= "eatonsquare";
	const DATABASE_HOST			= "internal-db.s48734.gridserver.com";*/

	const DATABASE_USERNAME 	= "root";
	const DATABASE_PASSWORD 	= "";
	const DATABASE_HOST			= "localhost";

	/*
	 * If you change any of the table names in the database, make
	 * sure you update it here.
	 * -------------------------------------------------------
	 * Use these const when referencing to table names.
	 */

	const DATABASE_NAME			= 'db48734_site';
	const DATABASE_TABLE_PREFIX = "blend_";

	const BLOG_POSTS_TABLE		= 'blogposts';
	const CASE_STUDIES_TABLE	= 'casestudies';
	const CATEGORYS_TABLE		= 'categorys';
	const COMMENTS_TABLE		= 'comments';
	const LINKS_TABLE			= 'links';
	const PORTFOLIO_ITEMS_TABLE	= 'portfolioitems';
	const SETTINGS_TABLE		= 'settings';
	const USERS_TABLE			= 'users';
}
?>