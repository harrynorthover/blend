/**
 * File: formValidate.js
 * Created: 10:15:37 PM - Aug 27, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * This is used to validate and the submit form data through the use of AJAX &
 * jQuery.
 */

/**
 * This function validates a form by takeing in a list of ids of form items then
 * loops through and validates then submits the data.
 *
 * @param args the list of ids of the form elements, seperate by a ',' - without quotes.
 */

function validateForm(args, action)
{
    // process args
    var splitArgs 	= args.split(",");

    /*
     * The results of the form validation.
     */
    var results		= [];
    var result		= "";

    /*
     * Data to send in the POST request.
     */
    var dataToSend	= "";

    /*
     * Determines whether the form data should be sent or not.
     */
    var shouldProcess = 'true';

	console.log('splitArgs.length: ' + splitArgs.length);

	/*
	 * Loop through all the elements passed in and validate them, then see if they are ready
	 * to be sent to the .php script to add them to the database.
	 */
    for (var i = 0; i < splitArgs.length; i++)
    {
        //process through each form item passed in and verifiy it is valid.
        var temp_Object = document.getElementById(splitArgs[i]);
        console.log('temp_Object: ' + temp_Object.value);
        
        var temp_ObjectType = temp_Object.valueOf().type;

		switch (temp_ObjectType)
        {
            case 'text':
                var result = validateValue(temp_Object);
                break;

            case 'textarea':
            	var result = validateValue(temp_Object);
            	break;

            case 'checkbox':
                var result = validateCheckbox(temp_Object);
                break;

            case 'select-multiple':
                var result = validateValue(temp_Object);
                break;

            case 'file':
            	var result = validateValue(temp_Object);
            	break;

            case 'hidden':
            	var result = temp_Object.value;
            	break;
        }

		console.log('temp_Object:' + temp_Object + ' - temp_ObjectType: ' + temp_ObjectType + ' - result: ' + result);

		/*
		 * Check to see if the item being added is the first piece of data in the string or
		 * if others are already present. If so, add a '&' to seperate the data.
		 */
		if(i != 0) dataToSend += '&';

		/*
		 * If it is just a standard input field then use the standard method.
		 */
        if(!tinyMCE.get(temp_Object.id)) newDataValue = encodeURIComponent(temp_Object.value);
        
        newDataValue = encodeURIComponent(newDataValue);
        
		/*
		 * Add the new data onto the POST query string.
		 */
        dataToSend += temp_Object.id + '=' + newDataValue + '';
        
        console.log(dataToSend);

        results.push(result);
    }

	/*
	 * Process the results.
	 */
    for(var j=0; j<results.length; j++)
    {
    	if(results[j] == 'false') shouldProcess = 'false';
    	//else shouldProcess = 'true';
    }

	/*
	 * See if all data was entered, then if so, submit the form.
	 */
    if(shouldProcess == 'true')
    {
    	/*
    	 * TODO: Make this class not portfolio specific.
    	 */
    	return dataToSend;
    }
}

/**
 * Validates an imput field with the type of textbox or textarea.
 *
 * @param obj the input object.
 */
function validateValue(obj)
{
	var isTinyMCE = tinyMCE != undefined ? tinyMCE.get(obj.id) : false;
	console.log('isTinyMCE: ' + isTinyMCE);

    if (obj.value == '' && !isTinyMCE)
    {
    	r = 'false';
    }
    else if(isTinyMCE)
    {
    	/*
		 * Check to see if the object being passed in is a TinyMCE text area
		 * - http://tinymce.moxiecode.com/
		 */

		/*
		 * If it is a tinyMCE input field the use the specififed method for getting content.
		 */
		newDataValue = tinyMCE.get(obj.id).getContent();
		console.log('validateValue(obj) - newDataValue: ' + newDataValue);
		if(newDataValue) r = 'true';
		else r = 'false';
    }
    else
    {
    	clearError(obj);
    	r = 'true';
    }

    if(r == 'false') showError(obj);

    return r;
}

function validateCheckbox(obj)
{
    if (obj.isChecked == false)
    {
    	showError(obj);
    	return 'false';
    }
    else
    {
    	clearError(obj);
    	return 'false';
    }
}

/**
 * This functions modify the input fields to show errors, modifiy to suit your needs.
 *
 * @param errorElement the input field the modify to show and error.
 */
function showError(errorElement)
{
    switch (errorElement.valueOf().type)
    {
    case 'text':
        var object = $(errorElement).parent().get(0);
        $(object).animate({backgroundColor : '#A4202C'}, 700);
		//$(errorElement).animate({backgroundColor : '#A4202C', border : 'thin solid #A4202C'}, 700);
        break;

    case 'checkbox':
        errorElement.style.color = '#A4202C';
        break;

    case 'select-multiple':
        var object = $(errorElement).parent().get(0);
        $(object).animate({backgroundColor : '#A4202C'}, 700);
		//$(errorElement).animate({backgroundColor : '#A4202C', border : 'thin solid #A4202C'}, 700);
        break;

    case 'file':
    	var object = $(errorElement).parent().get(0);
        $(object).animate({backgroundColor : '#A4202C'}, 700);
		//$(errorElement).animate({backgroundColor : '#A4202C', border : 'thin solid #A4202C'}, 700);
    	break;

    default:
    	var object = $(errorElement).parent().get(0);
        $(object).animate({backgroundColor : '#A4202C'}, 700);
		//$(errorElement).animate({backgroundColor : '#A4202C', border : 'thin solid #A4202C'}, 700);
    	break;
    }
}

/**
 * If an element has been changed to show and error, this function changes it back to normal.
 *
 * @param errorElement the element current showing an error that needs to be cleared.
 */
function clearError(errorElement)
{
    switch (errorElement.valueOf().type)
    {
    case 'text':
        var object = $(errorElement).parent().get(0);
        $(object).animate({backgroundColor : '#ECECEC'}, 1000);
		//$(errorElement).animate({backgroundColor : '#FFFFFF', border : 'thin solid #FFFFFF'}, 700);
        break;

    case 'checkbox':
        errorElement.style.color = '#FFFFFF';
        break;

    case 'select-multiple':
        var object = $(errorElement).parent().get(0);
        $(object).animate({backgroundColor : '#ECECEC'}, 700);
		//$(errorElement).animate({backgroundColor : '#FFFFFF', border : 'thin solid #FFFFFF'}, 700);
        break;

    case 'file':
    	var object = $(errorElement).parent().get(0);
        $(object).animate({backgroundColor : '#ECECEC'}, 700);
		//$(errorElement).animate({backgroundColor : '#FFFFFF', border : 'thin solid #FFFFFF'}, 700);
    	break;

    default:
    	var object = $(errorElement).parent().get(0);
    	$(object).animate({backgroundColor : '#ECECEC'}, 700);
    	//$(errorElement).animate({backgroundColor : '#FFFFFF', border : 'thin solid #FFFFFF'}, 700);
    	break;
    }
}