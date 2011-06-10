// Creates a pop-up by dynamically creating a div.
var isShowing = false;
var triggerId = "";

function createConfirmDeletePopup(id, trigId) {
	triggerId = trigId;

   /*var backgroundBox = document.createElement('div');
  	backgroundBox.setAttribute('id', 'popupOverlay');

   	backgroundBox.style.width = document.width;
   	backgroundBox.style.height = document.height;
   	backgroundBox.style.background = "#000000";
   	backgroundBox.style.display = "none";*/

   	var popupContentHolder = document.createElement('div');
	var textContent = document.createElement('div');

	popupContentHolder.setAttribute('name', id);
   	popupContentHolder.setAttribute('id', id);
   	popupContentHolder.style.width = "300px";
   	popupContentHolder.style.height = "100px";
	popupContentHolder.style.marginLeft = "auto";
	popupContentHolder.style.marginRight = "auto";
  	popupContentHolder.style.background = "#ffffff";
   	popupContentHolder.style.border = "1px solid #ccc";
   	popupContentHolder.style.padding = "10px";
   	popupContentHolder.align = "center";
   	popupContentHolder.style.fontFamily = "Calibri, Arial, Helvetica, sans-serif";
   	popupContentHolder.style.display = "none";

	textContent.setAttribute('id', id+'text');
	textContent.innerHTML = '<p>Are you sure you want to delete this item?</p><p><div id="deletePopup" style="float:left; margin-left:90px;">Yes</div><div id="closePopup" style="float:right; margin-right:90px;">No</div></p>';

   	document.body.appendChild(popupContentHolder);
	document.getElementById(id).appendChild(textContent);
   	//document.body.appendChild(backgroundBox);

	isShowing = false;
}

function deleteItem(id, database) {
	// Delete the item.
	$.get('admin/' + database + '/delete/' + id, onItemDeletedHandler(data));
	//alert('admin/' + database + '/delete/' + id);
}

function hidePopup(id) {
	$(id).fadeOut("fast", function() {
		isShowing = false;
	});
}

function showPopup(id) {
	$(id).fadeIn("fast", function() {
		isShowing = true;
	});
}

function onItemDeletedHandler(data) {
	alert('Item was deleted');
}