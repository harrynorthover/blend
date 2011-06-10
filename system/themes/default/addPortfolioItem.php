<!DOCTYPE html>
<html>
<head>

<?php include('includes/header.php'); ?>

<title>Add Portfolio Item</title>

<!-- Include form validation. -->
<script type="text/javascript" src="system/themes/default/js/formValidate.js"></script>
<script type="text/javascript">
function setCasestudy(id)
{
	var newV = id;
	var oldV = $('input[id=casestudyID]').val();

	$("#casestudyID").html("value: '" + id + "'");
	$('input[id=casestudyID]').val(id);

	if(oldV != null || oldV != "" || oldV != 'undefined') {
		visual.changeBackgroundImage("cs" + oldV, 'rollout_alreadySelected');
	}
	visual.changeBackgroundImage("cs" + id, "selected");
}

function setCategory(id)
{
	var newV = id;
	var oldV = $('input[id=categoryID]').val();

	$("#categoryID").html("value: '" + id + "'");
	$('input[id=categoryID]').val(id);

	if(oldV != null || oldV != "" || oldV != 'undefined') {
		visual.changeBackgroundImage("cat" + oldV, 'rollout_alreadySelected');
	}
	visual.changeBackgroundImage("cat" + id, "selected");
}

$(document).ready(function () {

    // Add event handlers here.
    $('#finalLink').bind('keyup', function(e) {
    	$('#urlCheckerLoadingImage').show();
        e.preventDefault();
    	switch(e.keyCode) {
	        default:
	        	var r = validateURL($('#finalLink').val());

		    	if(r) {
					$('#fileCheckerImage').attr('src', 'system/themes/default/images/urlChecker/available.png');
		    	} else {
		    		$('#fileCheckerImage').attr('src', 'system/themes/default/images/urlChecker/notAvailable.png');
		    	};
    	break;
    	$('#urlCheckerLoadingImage').hide();
    	}
    });

    $('#finalLink').focusout(function() {
    	$('#urlCheckerLoadingImage').hide();
    });

    // add tool tips
    $('#titleHelp').qtip( { content: 'The title of the project/work piece. <b>Never put fullstops at the end of the title. The CMS does this for you!</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#clientHelp').qtip( { content: 'The client the work was for.', position: { corner: { tooltip: 'topRight' } } });
    $('#typeHelp').qtip( { content: 'The type of work. Click on the category you would like to select. <b>To add one click the + icon.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#finalURLHelp').qtip( { content: 'The final URL where the work is at.', position: { corner: { tooltip: 'topRight' } } });
    $('#fileAlert').qtip( { content: 'The preview image using on the site. <b>Remember to add files using the file manager above.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#fileAlert2').qtip( { content: '<b>Remember to add files using the file manager above.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#fileAlert3').qtip( { content: '<b>Remember to add files using the file manager above.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#fileAlert4').qtip( { content: '<b>Remember to add files using the file manager above.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#briefDescHelp').qtip( { content: 'A brief description of the work carried out and what the result consisted of.', position: { corner: { tooltip: 'topRight' } } });
    $('#contentHelp').qtip( { content: 'An in-depth review of the challenges faced, technologies used and how the final work turned out.', position: { corner: { tooltip: 'topRight' } } });
    $('#csAlert').qtip( { content: 'If there is a case study associated with this portfolio item, then select it here. <b>Click on the case study you would like to select.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#addCat').qtip(
    		   {
    		      content: {
    		         title: {
    		            text: 'Add a Category',
    		            button: 'X'
    		         }, text: '<iframe src="admin/categorys/add" width="530" height="338" style="border:none; overflow:hidden"></iframe>'
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
    		         width: { min:550 },
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
});
</script>

</head>
<body>

<?php include('includes/menu.php'); ?>

<div class="contentHolder" id="content">

<div class="sectionTitle">
	<h2>add portfolio item</h2>
	<?php include('includes/notifications.php'); ?>
</div>

<p><a href="admin/portfolio/items" class="button"><img src="system/themes/default/images/buttonIcons/blog.png" style="margin-bottom:-4px;" /> View all items</a> <a href="admin/portfolio/add" class="button"><img src="system/themes/default/images/buttonIcons/attention.png" style="margin-bottom:-4px;" /> Reset Form</a></p>

<!-- TINY MCE INIT -->
<script type="text/javascript" src="system/themes/default/js/external/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
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
<!-- END TINYMCE INIT -->

<!-- FORM STARTS HERE. -->
<form action="" method="post" id="addNewPortfolioItemForm" enctype="multipart/form-data">

	<div class="formHeader" style="width: 870px;">Title <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="titleDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="title" class="inputDiv"/>
	</div>

	<div class="formHeader" style="width: 870px;">Client <div class="alert" id="clientHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="clientDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="client" class="inputDiv"/>
	</div>

	<div class="formHeader" style="width: 870px;">Type<div class="alert" id="typeHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div><div id="addCat" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/add.png" /></div></div>
	<div class="formItem" id="categoryDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#ECECEC")'>

     <div style="height:190px; overflow:scroll; padding-bottom:3px; background:#FFFFFF; padding:2px; border:1px solid #CCCCCC">

	  <?php $i = 0; ?>
      <?php foreach($categorys as $cat):?>
		<div class="post" <?php if ($i == 0) echo 'style="border-top:thin solid #CCCCCC"'; ?> id="cat<?php echo $cat->getId(); ?>" onMouseOver="visual.changeBackgroundImage(this.id, 'rollover');" onMouseOut="visual.changeBackgroundImage(this.id, 'rollout');" onClick='setCategory(<?php echo $cat->getId(); ?>);'>
		<div class="title" id="catTitle<?php echo $cat->getId(); ?>">
		<div id='catTitleText<?php echo $cat->getId(); ?>' style="color:#345775" onClick="visual.editTitle(this.id, this.parentNode.id, <?php echo $cat->getId(); ?>, '<?php echo $cat->title(); ?>', 'categorys', 'categorys');"><?php echo $cat->title(); ?></div></div>
		<div id="brief_desc"><?php echo $cat->description(); ?></div>
		<div id="functions" style="padding-top:0px;">
		<img src="system/themes/default/images/lock.png" alt="Toggle Visibility" name="Toggle_Visibility" border="0" id="Toggle_Visibility" onClick="visual.toggleState(this.parentNode.parentNode.parentNode.id, this.parentNode.parentNode.id, 'categorys')"/>
		<img src="system/themes/default/images/delete.png" alt="Delete" name="Delete" border="0" id="Delete" onClick="visual.removeItem(this.parentNode.parentNode.id, this.parentNode.parentNode.id, this.parentNode.parentNode.parentNode.id, 'categorys');"/>
		</div>
		</div>

		<script type="text/javascript">
		if(<?php echo $cat->isPrivate(); ?> == 1) utils.dimElement('cat' + <?php echo $cat->getId(); ?>);
		</script>

	  <?php $i++ ?>
	  <?php endforeach; ?>
  	</div>

  </div>

	<div class="formHeader" style="width: 870px;">Final URL<div class="alert" id="finalURLHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="finalURLDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<!-- <div id="urlCheckerloader"><img src="system/themes/default/images/loader.gif" id="urlCheckerLoadingImage" style="margin-left:410px; margin-top:10px; float:left; display:none"/></div><img src="system/themes/default/images/urlChecker/checking.png" style="float:right; margin-top:6px;" id="fileCheckerImage"/>  -->
		<input type="text" id="finalLink" class="inputDiv" value="http://"/>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Preview Image</div><div class="alert" id="fileAlert" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="previewImageDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="previewImage">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>"><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Screenshot 1</div><div class="alert" id="fileAlert2" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="screenshot1Div" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="screenshot1">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>"><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Screenshot 2</div><div class="alert" id="fileAlert3" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="screenshot2Div" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="screenshot2">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>"><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Screenshot 3</div><div class="alert" id="fileAlert4" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="screenshot3Div" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="screenshot3">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>"><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;">Brief Description<div class="alert" id="briefDescHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="briefDescDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<textarea name="briefDescription" id="briefDescription"></textarea>
  	</div>

	<div class="formHeader" style="width: 870px;">Content<div class="alert" id="contentHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="descDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<textarea name="description" id="description"></textarea>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Case Study</div><div class="alert" id="csAlert" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="caseStudyDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>

		 <div style='height:200px; overflow:scroll; background:#FFFFFF; padding:2px; border:1px solid #CCCCCC'>
		<?php $i = 0; ?>
        <?php foreach($cs as $casestudy):?>

		<div class="post" <?php if ($i == 0) echo 'style="border-top:thin solid #CCCCCC"'; ?> id="cs<?php echo $casestudy->getId(); ?>" onMouseOver="visual.changeBackgroundImage(this.id, 'rollover');" onMouseOut="visual.changeBackgroundImage(this.id, 'rollout');" onClick='setCasestudy(<?php echo $casestudy->getId(); ?>);'>
		<div class="title" id="csTitle<?php echo $casestudy->getId(); ?>">
		<div id='csTitleText<?php echo $casestudy->getId(); ?>' style="color:#345775" onClick="visual.editTitle(this.id, this.parentNode.id, <?php echo $casestudy->getId(); ?>, '<?php echo $casestudy->title(); ?>', 'casestudies', 'casestudies');"><?php echo $casestudy->title(); ?></div></div>
		<div id="brief_desc"><?php echo $casestudy->description(); ?></div><div id="functions" style="padding-top:0px;">
		<img src="system/themes/default/images/lock.png" alt="Toggle Visibility" name="Toggle_Visibility" border="0" id="Toggle_Visibility" onClick="visual.toggleState(this.parentNode.parentNode.id, this.parentNode.parentNode.id, 'casestudies')"/>
		<img src="system/themes/default/images/delete.png" alt="Delete" name="Delete" border="0" id="Delete" onClick="visual.removeItem(this.parentNode.parentNode.id, this.parentNode.parentNode.id, this.parentNode.parentNode.parentNode.id, 'casestudies');"/>

		</div>
		</div>

		<script type="text/javascript">
		if(<?php echo $casestudy->isPrivate(); ?> == 1) utils.dimElement('cs' + <?php echo $casestudy->getId(); ?>);
		</script>
	   <?php $i++ ?>
	 <?php endforeach; ?>

      </div>

  	</div>

  	<input type="hidden" id="casestudyID">
	<input type="hidden" id="categoryID">

	<div id="submitButton" class="submit"
		 onMouseOver="visual.changeBackgroundColour(this.id, 'rollover')"
    	 onMouseOut="visual.changeBackgroundColour(this.id, 'rollout')"
    	 onClick="formData = validateForm('title,client,categoryID,finalLink,previewImage,screenshot1,screenshot2,screenshot3,briefDescription,description,casestudyID'); if(formData) { checkPrivate(); data.addNewPortfolioItem(formData); $('#sucessMessage').fadeIn(); } ">
    	 Submit
    </div>

    <script type='text/javascript'>
    	/*
    	 * TODO: Find a better way to submit form data instead of running it all through
    	 * validateForm() because functions like this (checkPrivate()) are needed for inputs that don't need
    	 * to be validated.
    	 */
    	function checkPrivate()
    	{
			var isPrivate;
			if(document.getElementById('isPrivate').checked)
				isPrivate = true;
			else
				isPrivate = false;

			formData += '&isPrivate=' + isPrivate;
    	}

    	/*
    	 * TODO: Implement the ability to auto-tweet articles.
    	 */
    	function shouldTweet() { }
    </script>

	<input type="hidden" name="isPrivate" value="false" />
    <p class='checkbox'>Keep Private<input type='checkbox' id='isPrivate' value='true' style='border:none; width:auto; padding:0; height:auto;'></p>

    <!-- NOT YET IMPLEMENTED YET. -->
    <p class='checkbox' style='opacity:0.5'>Tweet<input type='checkbox' id='shouldTweet' value='true' style='border:none; width:auto; padding:0; height:auto;' disabled></p>

    <div id='sucessMessage' style="float: left; padding: 7px; background: #ECECEC; margin: 10px; border-radius: 3px; font-weight: bold; width:100px; text-align:center; display:none">
    	Added!
    </div>

</form>
<!-- FORM ENDS HERE. -->

</div>

</body>
</html>