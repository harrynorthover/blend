/*
 * @function swap(image element, new img.source)
 * @description Used to change an image source (rollovers, etc...)
 */
function swap(imgId, n_source)
{
	var element = imgId != undefined ? document.getElementById(imgId) : element;
	element.src = n_source;
}

function slideshow()
{
	var flashvars = {};
	var params = { wmode: "transparent" };
	var attributes = {};

	swfobject.embedSWF("themes/default/slideshow/loader.swf", "slideshow", "900", "450", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
}