/**
 * File: data.js
 * Created: 10:14:11 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This is used to insert, update, delete and retrive data from the database
 * through ajax.
 */

BLEND.DataManager = function(isDebug) {

	titleModified = false,
	isVisible = false,
	isDeleted = false,
	validated = false,
	/*_this = this,*/
	debug = isDebug;

	/**
	 * Used to modify the title of a section. The relevant section (eg portfolio) needs to implement
	 * a changeTitle() function.
	 *
	 * @param section
	 * @param id
	 * @param newTitle
	 * @return null
	 */

	this.modifyTitle = function (section, id, newTitle) {
	    $.get('admin/' + section + '/changeTitle/' + id + '/' + newTitle, function (data) {
	        /*if (data == 'true')
	        	titleModified = true;
	        else
	        	titleModified = false;*/
	    });

	    /*if(debug)
	    	console.log('[ data.modifyTitle ] - titleModified: ' + titleModified);

	    return titleModified;*/
	};

	/**
	 * Toggles the visibility of a portfolio/comment/blog item. Needs an 'isPrivate' field.
	 * @param table
	 * @param id
	 * @return null
	 */

	this.toggleVisibility = function(table, id) {
	   $.getJSON('admin/utils/toggleVisibility/' + table + '/' + id, function (data) {
	        if (data == 'false')
	        	isVisible = false;
	        else
	        	isVisible = true;
	    });

	    utils.sleep(150);

	    if (debug)
	    	console.log('[ data.toggleVisibility() ] - isVisible: ' + isVisible);

	    return isVisible;
	};

	/**
	 * Gets the visibility of a portfolio/comment/blog item. Needs an 'isPrivate' field.
	 * @param table
	 * @param id
	 * @return null
	 */

	this.getVisibility = function(table, id) {
	    $.get('admin/utils/getVisibility/' + table + '/' + id, function (data) {
	        isVisible = parseJSONVars(data);
	    });

	    utils.sleep(40);

	    if(debug)
	    	console.log('[ data.getVisibility() ] - isVisible: ' + isVisible);

	    return isVisible;
	};

	/**
	 * Parses a JSON variable, used in getVisiblity & toggleVisibility.
	 *
	 * @param data
	 * @return null
	 */

	this.parseJSONVars = function(data) {
	    eval("result=" + data);

	    if(debug)
	    	console.log('[ data.parseJSONVars() ] - result.isPrivate: ' + result.isPrivate);

	    return result.isPrivate;
	};

	/**
	 * Delete a row.
	 *
	 * @param section
	 * @param id
	 * @return null
	 */

	this.deleteItem = function(section, id) {
	    $.get('admin/' + section + '/delete/' + id, function (data) {});

	    if(debug)
	    	console.log('[ data.deleteItem() ] isDeleted: ' + isDeleted);

	    return isDeleted;
	};

	/**
	 * Used to validate a row in the DB.
	 *
	 * @param table
	 * @param column
	 * @param id
	 * @param newData
	 * @return null
	 */

	this.validateData = function(table, column, id, newData) {
	    $.get('admin/utils/checkdata/' + table + '/' + column + '/' + id + '/' + newData, function (data) {
	        validated = (data != '') ? true : false;
	    });

	    return validated;
	};

	/**
	 * This adds a new portfolio item to the database.
	 *
	 * @param dataToSend
	 * @return null
	 */

	this.addNewPortfolioItem = function(dataToSend) {
		$.post('admin/portfolio/insert', dataToSend);
	};

	/**
	 * This updates a portfolio item in the database, needs all portfolio data
	 * to be submitted, not just updated data.
	 *
	 * @param id
	 * @param dataToSend
	 * @return null
	 */

	this.updatePortfolioItem = function(id, dataToSend) {
		$.post('admin/portfolio/update/' + id, dataToSend);
	};

	/**
	 * This adds a new category.
	 *
	 * @param data
	 */

	this.addCategory = function(data) {
		if(debug)
			console.log('[ data.addCategory() ] data: ' + data);

		$.post('admin/categorys/insert', data);
	};

	this.addNewBlogPost = function(data) {
		if(debug)
			console.log('[ data.addNewBlogPost() ] data: ' + data);

		$.post('admin/blog/insert', data);
	};

	this.updateBlogPost = function(id, data) {
		if(debug) {
			console.log('[ data.addNewBlogPost() ] data: ' + data);
			console.log('[ data.addNewBlogPost() ] id: ' + id);
		}

		$.post('admin/blog/update/' + id, data);
	};

	this.updateComment = function(id, data) {
		if(debug) {
			console.log('[ data.updateComment() ] data: ' + data);
			console.log('[ data.updateComment() ] id: ' + id);
		}

		$.post('admin/comments/update/' + id, data);
	};

	this.updateSettings = function(id, data) {
		if(debug) {
			console.log('[ data.updateSettings() ] data: ' + data);
			console.log('[ data.updateSettings() ] id: ' + id);
		}

		$.post('admin/settings/update/' + id, data);
	};
};