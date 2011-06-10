/**
 * File: visual.js
 * Created: 10:01:11 PM - Aug 17, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This file contains methods that are used to manage and enhance
 * the visual elements of pages in the cms.
 */

BLEND.Visual = function(isDebug) {

	var debug = isDebug,
		_this = this;

	/**
	 * Changes the background colour of an element.
	 * Used for rollovers on items containing data in list pages.
	 *
	 * @param elementId the id that is going to be animated
	 * @param the colour to animate to.
	 */

	this.changeBackgroundImage = function(elementId, newColour, alpha) {
		/*
		 * Get the element that needs to have its background image change.
		 */
	    element = document.getElementById(elementId);

	    /*
	     * This is here so that elements that have the geenbg.jpg can be changed back to a non selected bg, as the if statement below blocks
	     * divs with the greenbg.jpg from being changed.
	     */
	    if(newColour == 'rollout_alreadySelected' && element != null)
	    	element.style.background = 'url(system/themes/default/images/tableItemBG.jpg) repeat-x';

	    switch(newColour)
	    {
		    case 'rollover':
		    	element.style.background = 'url(system/themes/default/images/tableItemBGRollover.jpg) repeat-x';
		    	break;
		    case 'rollout':
		    	element.style.background = 'url(system/themes/default/images/tableItemBG.jpg) repeat-x';
		    	break;
		    case 'selected':
		    	element.style.background = 'url(system/themes/default/images/greenbg.jpg) repeat-x';
		    	break;
	    }
	};

	/**
	 * Changes the background colour of an element, if you want a background image to be
	 * changed use changeBackgroundImage().
	 *
	 * @param elementId
	 * @param newColour
	 * @param alpha
	 */

	this.changeBackgroundColour = function(elementId, newColour, alpha) {
	    element = document.getElementById(elementId);
	    if (element != null) element.style.background = newColour;
	};

	/**
	 * Used to delete an item from the database and then animate
	 * out the row in the page.
	 *
	 * @param 's div refrences.
	 */

	this.removeItem = function(divID, parentDivID, parent2DivID, section) {
	    var id = utils.getId(divID);
	    console.log(id);
	    data.deleteItem(section, id);

	    // Animate and remove the element from the page.
	    var newid = '#' + divID;

	    $(newid).animate({ background: "red", opacity: '0.9' });
	    $(newid).hide('blind', function () { utils.removeElement(parent2DivID, parentDivID); });
	};

	/**
	 * Toggle whether the item/row is visible or not.
	 *
	 * @param parentDivID the parent of the div that contains the information of the item needed to have its state toggled.
	 * @param the id of the 'post' div.
	 */

	this.toggleState = function(parentDivID, elementDiv, tableParam) {
		var id = utils.getId(elementDiv);

	    // update to database.
		var visible = data.toggleVisibility(tableParam, id);

		// assign data to relevant vars.
		table 		= tableParam;
		currID 		= id;
		currDiv 	= elementDiv;

		utils.sleep(150);
		_this.updateVisibleState(table, currID, currDiv, visible);
	};

	this.updateVisibleState = function(table, id, div, isVisible)
	{
		// ?
		if(isVisible == true)
			utils.dimElement(div);
		else if(isVisible == false)
			utils.brightenElement(div);
	};

	/**
	 * Replaces the item title text with a text box and saves the value.
	 *
	 * @param textDivID - the div with the text box in.
	 * @param parentDiv - the div containing the text to be replaced with t/b.
	 * @param id - the id of the row containing the title to edit.
	 * @param currentTitleText - the current title text before editing.
	 * @param controllerToCall - the controller to call which contains the functionality to update the db.
	 */

	this.editTitle = function(textDivID, parentDiv, id, currentTitleText, table, controllerToCall) {

		if(debug)
			console.log('[ visual.editTitle() ] - id:' + id);

		/*
		 * Remove the text already being displayed.
		 */
	    utils.removeElement(parentDiv, textDivID, false);

	    /*
	     * Create the text box that is going to have the new title inputted into it.
	     */
	    var textBox 					= document.createElement('input');

	    textBox.setAttribute('id', 'newTitleTextBox' + id);
	    textBox.setAttribute('type', 'text');
	    textBox.setAttribute('value', currentTitleText);

	    textBox.style.width 			= "275px";
	    textBox.style.border 			= '1px solid #CCCCCC';
	    textBox.style.height 			= '16px';
	    textBox.style.fontSize 			= "11px";
	    textBox.style.marginTop 		= '-5px';
	    textBox.style.marginLeft 		= '-4px';
	    textBox.style.marginRight 		= '10px';

	  /*
	   * Add it to the document html.
	   */
	    document.getElementById(parentDiv).appendChild(textBox);

	  /*
	   * List for keypress events.
	   */
	    runValidation = true;


	    $(textBox).keydown(function (event) {

	        var newTitleText = $(textBox).val();
	        var newOnClickFunction = 'visual.editTitle(this.id, this.parentNode.id, ' + id + ', "' + newTitleText + '", "' + table + '", "' + controllerToCall + '");';

	        switch (event.keyCode) {
	        case 13:
	        	// enter key
	            event.preventDefault();
	            $(textBox).serialize();
	            /*
	             * If the title is not already taken then it is ok to go ahead
	             * and change it.
	             */
	            if (!data.validateData(table, 'title', id, newTitleText))
	            {
	            	console.log('New value OK.');
	                utils.removeElement(parentDiv, textBox.id);
	                textBox.style.background = '#FFFFFF no-repeat right';
	                data.modifyTitle(controllerToCall, id, newTitleText);
	                utils.createNewTitleTextField(parentDiv, newTitleText, ['id', 'onClick'], ['titleText' + id, newOnClickFunction]);
	            }
	            /*
	             * If the title is taken, change the background colour to red.
	             */
	            else textBox.style.backgroundColor = '#bf4c4c';

	            break;

	        case 27:
	            // escape key
	            event.preventDefault();
	            utils.removeElement(parentDiv, textBox.id);
	            utils.createNewTitleTextField(parentDiv, currentTitleText, ['id', 'onClick'], ['titleText' + id, newOnClickFunction]);
	            break;

	       /*
	        * Run the validation every time a key is pressed.
	        */
	        default:
	        	/*
	        	 * Delay the validation.
	        	 * This is because we don't want to have to many API calls made.
	        	 */
	            setTimeout(function () { runValidation = true; }, 2000);

	        	/*
	        	 * If validation should be run, run the validation.
	        	 */
	            if (runValidation) {
	                textBox.style.background = 'url(system/themes/default/images/loader.gif) no-repeat right';

	                if (data.validateData(table, 'title', id, newTitleText))
	                	textBox.style.backgroundColor = '#bf4c4c';
	                else
	                	textBox.style.backgroundColor = '#ffffff';

	                newTitleText = $(textBox).val();
	            }
	            else textBox.style.background = '#FFFFFF no-repeat right';

	            break;
	        }
	    });
	};

};