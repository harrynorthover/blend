/**
 * File: utils.js
 * Created: 06:58:43 PM - Aug 18, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This file contains utility functions. Some functions require jQuery to work.
 */

BLEND.Utilities = function () {

	/**
	 * Utils function used to remove an element from the page.
	 *
	 * @param parentDiv the element that contains the element you want removed.
	 * @param div the div element you want removed.
	 */

	this.removeElement = function(parentDiv, div, debug) {
	    if (debug)
	        console.log('parentDiv: ' + parentDiv + ' - div: ' + div);

	    var d1 = document.getElementById(parentDiv);
	    var d2 = document.getElementById(div);

	    if (debug) {
		    console.log('d1: ' + d1.id);
		    console.log('d2: ' + d2.id);
	    }

	    d1.removeChild(d2);
	    //$('#' + div).hide();
	};

	/**
	 * This creates a new paragraph, then adds it to the parentDiv.
	 *
	 * @param the div the text is going to go into.
	 * @param the new text.
	 */

	this.createNewTitleTextField = function(parentDiv, text, attributes, attributeValues) {
	    var P_Element = document.createElement('div');
	    P_Element.appendChild(document.createTextNode(text));

	    // Set the attributes for the div.
	    if(attributes != 'undefined')
	    	for(var i = 0; i < attributes.length; ++i)
	    		P_Element.setAttribute(attributes[i], attributeValues[i]);

	    document.getElementById(parentDiv).appendChild(P_Element);
	};

	/**
	 * Identical to the function above, but text is in red.
	 *
	 * @param the div the text is going to go into.
	 * @param the new text.
	 */

	this.createNewErrorTextField = function(parentDiv, error, id) {
	    var text = document.createElement('p');
	    text.appendChild(document.createTextNode(error));
	    text.setAttribute('id', 'errorTitleText' + id);
	    text.style.color = '#bf4c4c';
	    document.getElementById(parentDiv).appendChild(text);
	};

	/**
	 * Shows a loading image.
	 *
	 * @param parentDiv the div you want the loader img to reside in.
	 */

	this.showLoader = function(parentDiv) {
		var ldr = document.createElement("img");
	    ldr.setAttribute('src', 'system/themes/default/images/loader.gif');

	    document.getElementById(parentDiv).appendChild(ldr);
	};

	/**
	 * Once the item has been hidden, this function dims the div.
	 *
	 * @param the div to dim.
	 *
	 * ---------------------------------------
	 * jQuery dependent.
	 */

	this.dimElement = function(elementDiv) {
	    element = document.getElementById(elementDiv);
	    $(element).animate({ opacity: 0.5 }, 'fast');
	    $(element).clearQueue();
	};

	/**
	 * Once the item has been made public, this function brightens the div.
	 *
	 * @param the div to dim.
	 *
	 * ---------------------------------------
	 * jQuery dependent.
	 */

	this.brightenElement = function(elementDiv) {
	    element = document.getElementById(elementDiv);
	    $(element).animate({
	        opacity: 1
	    }, 'fast');
	    $(element).clearQueue();
	};

	/**
	 * Takes an item div name in the form of postXX and returns
	 * just XX (the id number).
	 *
	 * @param divID the div name.
	 */

	this.getId = function(divID) {
	    if(divID[2] == 't')
			var id 	= divID.replace('cat', '');
		else if(divID[1] == 's')
			var id 	= divID.replace('cs', '');
		else
			var id  = divID.replace('post', "");
	    return id;
	};

	/**
	 * This checks to see if a URL is valid or not.
	 *
	 * @param urlToCheck
	 * @returns {Boolean}
	 */
	this.validateURL = function(urlToCheck) {
		console.log('urlToCheck: ' + urlToCheck);
		var result;

		$.ajax({
			url:urlToCheck,
			type:'HEAD',
			error: function() {
				result = false;
			},
			success: function() {
				result = true;
			}
		});

		sleep(3000);
		console.log('result: ' + result);

		return result;
	};

	this.sleep = function(milliSeconds) {
		var resource;
		var response;

		if(typeof ActiveXObject == 'undefined')
			resource = new XMLHttpRequest();
		else
			resource = new ActiveXObject("Microsoft.XMLHTTP");

		try {
			resource.open('GET', 'admin/utils/sleep/' + milliSeconds, false);
			resource.send(null);
			response = resource.responseText; // JavaScript waits for response
		} catch(e) {
			alert(e);
		}

		return true;
	};
};