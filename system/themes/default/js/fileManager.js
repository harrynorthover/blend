BLEND.FileManager = function(isDebug) {

	var debug = isDebug;

	/**
	 * This is the JS overlay for the media manager. It is included in the header because there link to open it
	 * is in the menu and needs to be present on all pages for the overlay/popup to work.
	 */
	this.enable = function() {
		if(debug)
			console.log('[ fileManager.enable() ]');

		 $('#mediamanagerIcon').qtip(
		 		   {
		 		      content: {
		 		         title: {
		 		            text: 'File Manager', button: 'X'
		 		         }, text: '<iframe src="admin/fileManager" width="820" height="550" style="border:none; overflow:auto;"></iframe>'
		 		      },
		 		      position: {
		 		         target: $(document.body), // Position it via the document body...
		 		         corner: 'center' // ...at the center of the viewport
		 		      },
		 		      show: {
		 		         when: 'click', // Show it on click
		 		         solo: true // And hide all other tooltips
		 		      },
		 		      hide: false,
		 		      style: {
		 		         width: { min:804 },
		 		         padding: '5px',
		 		         border: {
		 		            width: 9,
		 		            radius: 5,
		 		            color: '#666666'
		 		         }, name: 'light'
		 		      },
		 		      api: {
		 		         beforeShow: function()  { $('#qtip-blanket').fadeIn(this.options.show.effect.length); },
		 		         beforeHide: function()  {  $('#qtip-blanket').fadeOut(this.options.hide.effect.length); }
		 		      }
		 	});

		// Create the modal backdrop on document load so all modal tooltips can use it
		    $('<div id="qtip-blanket">').css({
		          position: 'absolute',
		          top: $(document).scrollTop(), // Use document scrollTop so it's on-screen even if the window is scrolled
		          left: 0,
		          height: $(document).height() + 300, // Span the full document height...
		          width: '100%', // ...and full width

		          opacity: 0.8, // Make it slightly transparent
		          backgroundColor: 'black',
		          zIndex: 5000  // Make sure the zIndex is below 6000 to keep it below tooltips!
		       })
		       .appendTo(document.body) // Append to the document body
		       .hide(); // Hide it initially
	};
};