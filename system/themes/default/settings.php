<html>
<head>

<?php include('includes/header.php'); ?>

<title>Settings</title>

</head>

<body>
<?php include('includes/menu.php'); ?>

<script type="text/javascript" src="system/themes/default/js/external/tiny_mce/tiny_mce.js"></script>
<script type='text/javascript'>
$(document).ready(function () {
    // add tool tips
   $('#autoTweet').qtip(
    		   {
    		      content: {
    		         title: { text: 'Add a Category', button: 'X' },
    		         text: '<p style="margin:10px;">Are you sure you want to enable/disable auto-tweeting?</p>'
    		      },
    		      position: { target: $(document.body), corner: 'center' },
    		      show: { when: 'click', solo: true },
    		      hide: false,
    		      style: { width: { min:550 }, padding: '5px', border: { width: 9, radius: 5, color: '#666666' }, name: 'light' },
    		      api: {
    		         beforeShow: function()  { $('#qtip-blanket').fadeIn(this.options.show.effect.length); },
    		         beforeHide: function()  {  $('#qtip-blanket').fadeOut(this.options.hide.effect.length); }
    		      }
    	});

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
});

	/*
	 * Used to enable and disable twitter.
	 */
	function twitter()
	{
		if(!document.getElementById('enableTwitter').checked)
		{
			document.getElementById('twitterUsername').disabled = true;
			document.getElementById('twitterPassword').disabled = true;

			$('#twitterUsernameDiv').animate({ opacity:0.3 },'fast');
			$('#tUDh').animate({ opacity:0.3 },'fast');
			$('#twitterPasswordDiv').animate({ opacity:0.3 },'fast');
			$('#tPDh').animate({ opacity:0.3 },'fast');
		}
		else
		{
			document.getElementById('twitterUsername').disabled = false;
			document.getElementById('twitterPassword').disabled = false;

			$('#twitterUsernameDiv').animate({ opacity:1 },'fast');
			$('#tUDh').animate({ opacity:1 },'fast');
			$('#twitterPasswordDiv').animate({ opacity:1 },'fast');
			$('#tPDh').animate({ opacity:1 },'fast');
		}
	}

	function uploads()
	{
		if(!document.getElementById('enableUploads').checked)
		{
			document.getElementById('uploadsPath').disabled = true;
			$('#uploadsPathDiv').animate({ opacity:0.3 },'fast');
			$('#uDh').animate({ opacity:0.3 },'fast');
		}
		else
		{
			document.getElementById('uploadsPath').disabled = false;
			$('#uploadsPathDiv').animate({ opacity:1 },'fast');
			$('#uDh').animate({ opacity:1 },'fast');
		}
	}

	function submitForm() {
		formData = 'siteName=' + encodeURIComponent(document.getElementById('siteName').value)
					+ '&siteDescription=' + encodeURIComponent(document.getElementById('siteDescription').value)
					+ '&adminEmail=' + encodeURIComponent(document.getElementById('adminEmail').value)
					+ '&uploadsPath=' + encodeURIComponent(document.getElementById('uploadsPath').value)
					+ '&twitterUsername=' + encodeURIComponent(document.getElementById('twitterUsername').value)
					+ '&twitterPassword=' + encodeURIComponent(document.getElementById('twitterPassword').value)
					+ '&about=' + encodeURIComponent(document.getElementById('about').value);

		if(formData) {
			if(document.getElementById('enableUploads').checked)
				formData += '&enableUploads=true';
			else
				formData += '&enableUploads=false';

			if(document.getElementById('enableTwitter').checked)
				formData += '&enableTwitter=true';
			else
				formData += '&enableTwitter=false';

			if(document.getElementById('autoTweet').checked)
				formData += '&autoTweet=true';
			else
				formData += '&autoTweet=false';

			if(document.getElementById('maintenanceMode').checked)
				formData += '&maintenanceMode=true';
			else
				formData += '&maintenanceMode=false';

			console.log(formData);

			data.updateSettings(<?php echo $settings->getId(); ?>, formData);
			$('#sucessMessage').fadeIn();
		}
	}

	tinyMCE.init({
		body_id: 'elm1=about',

		// General options
		mode : "textareas",
		height : '500',
		width: '100%',
		theme : "advanced",
		plugins : "safari,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "js/template_list.js",
		external_link_list_url : "js/link_list.js",
		external_image_list_url : "js/image_list.js",
		media_external_list_url : "js/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<div class="contentHolder" id="content">
<h2 align="left">site details</h2>

<!-- FORM STARTS HERE. -->
<form action="" method="post" id="addNewPortfolioItemForm" enctype="multipart/form-data">

	<div class="formHeader" style="width: 870px;">Site Name <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"></div></div>
	<div class="formItem" id="sitenameDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="siteName" class="inputDiv" value='<?php echo $settings->siteTitle(); ?>'/>
	</div>

	<div class="formHeader" style="width: 870px;">Site Description <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"></div></div>
	<div class="formItem" id="sitedescDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC'>
		<textarea id="siteDescription" class="inputDiv" style='width: 851px; height:200px; padding:10px;'><?php echo $settings->siteDescription(); ?></textarea>
	</div>

	<div class="formHeader" style="width: 870px;">Admin E-mail <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"></div></div>
	<div class="formItem" id="adminemailDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC'>
		<input type='text' id="adminEmail" class="inputDiv" value='<?php echo $settings->adminEmail(); ?>'/>
	</div>

	<input type="hidden" name="maintenanceMode" value="false" />
    <p class='checkbox' style='margin-left:0px;'>Maintenance Mode<input type='checkbox' id='maintenanceMode' value='true' style='border:none; width:auto; padding:0; height:auto;' <?php if($settings->maintenanceMode() =='true') echo 'checked="true"'; ?>></p>

	<h2 style='margin-top:70px'>file management</h2>

	<div class="formHeader" id='uDh' style="width: 870px; <?php if($settings->enableUploads() =='false') echo 'opacity:0.5;'?>">Uploads Path <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"></div></div>
	<div class="formItem" id="uploadsPathDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC; <?php if($settings->enableUploads() =='false') echo 'opacity:0.5;'?>'>
		<input type='text' id="uploadsPath" class="inputDiv" value='<?php echo $settings->uploadPath(); ?>'>
	</div>

	<input type="hidden" name="enableUploads" value="false" />
    <p class='checkbox' style='margin-left:0px;'>Enable Uploads<input type='checkbox' onClick='uploads()' id="enableUploads" value='true' style='border:none; width:auto; padding:0; height:auto;' <?php if($settings->enableUploads() =='true') echo 'checked="true"'; ?>></p>

	<h2 style='margin-top:70px'>twitter</h2>

	<div class="formHeader" id='tUDh' style="width: 870px; <?php if($settings->enableTwitter() =='false') echo 'opacity:0.5;'?>">Username <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"></div></div>
	<div class="formItem" id="twitterUsernameDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC;  <?php if($settings->enableTwitter() =='false') echo 'opacity:0.5'?>'>
		<input type='text' id="twitterUsername" class="inputDiv" value='<?php echo $settings->twitterUsername(); ?>'>
	</div>

	<div class="formHeader" id='tPDh' style="width: 870px; <?php if($settings->enableTwitter() =='false') echo 'opacity:0.5;'?>">Password <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"></div></div>
	<div class="formItem" id="twitterPasswordDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC; <?php if($settings->enableTwitter() =='false') echo 'opacity:0.5'?>'>
		<input type='password' id="twitterPassword" class="inputDiv" value='<?php echo $settings->twitterPassword(); ?>'>
	</div>

	<input type="hidden" name="enableTwitter" value="false" />
    <p class='checkbox' style='margin-left:0px;'>Enable Twitter <input type='checkbox' onClick='twitter()' id="enableTwitter" value='true' style='border:none; width:auto; padding:0; height:auto;' <?php if($settings->enableTwitter() =='true') echo 'checked="true"'; ?>></p>

	<input type="hidden" name="autoTweet" value="false" />
    <p class='checkbox' style='opacity:0.5'>Auto-Tweet <input type='checkbox' id="autoTweet" value='true' style='border:none; width:auto; padding:0; height:auto;' <?php if($settings->autoTweet() =='true') echo 'checked="true"'; ?>></p>

	<h2 style='margin-top:70px'>about</h2>

	<div class="formHeader" style="width: 870px;">About <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"></div></div>
	<div class="formItem" id="aboutDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC'>
		<textarea id="about" class="inputDiv" style='width: 851px; height:200px; padding:10px;'><?php echo $settings->about(); ?></textarea>
	</div>

	<div id="submitButton" class="submit"
		 onMouseOver="visual.changeBackgroundColour(this.id, 'rollover')"
    	 onMouseOut="visual.changeBackgroundColour(this.id, 'rollout')"
    	 onClick="submitForm()">
    	 Submit
    </div>

    <div id='sucessMessage' style="float: left; padding: 7px; background: #ECECEC; margin: 10px; border-radius: 3px; font-weight: bold; width:100px; text-align:center; display:none">
    	Updated!
    </div>

</form>
<!-- FORM ENDS HERE. -->

</div>

</body>
</html>