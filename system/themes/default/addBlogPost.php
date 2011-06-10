<!DOCTYPE html>
<html>
<head>

<?php include('includes/header.php'); ?>

<title>Add Blog Post</title>

<!-- Include form validation. -->
<script type="text/javascript" src="system/themes/default/js/formValidate.js"></script>
<script type="text/javascript">
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
    // add tool tips
    $('#titleHelp').qtip( { content: 'The title of the post. <b>Never put fullstops at the end of the title. The CMS does this for you!</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#typeHelp').qtip( { content: 'The type of content the blog post relates to. Click on the category you would like to select. <b>To add one click the + icon.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#fileAlert').qtip( { content: 'The preview image using on the site. <b>Remember to add files using the file manager above.</b>', position: { corner: { tooltip: 'topRight' } } });
    $('#contentHelp').qtip( { content: 'An in-depth review of the challenges faced, technologies used and how the final work turned out.', position: { corner: { tooltip: 'topRight' } } });
    $('#addCat').qtip(
    		   {
    		      content: {
    		         title: { text: 'Add a Category', button: 'X' },
    		         text: '<iframe src="admin/categorys/add" width="530" height="338" style="border:none; overflow:hidden"></iframe>'
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
</script>

</head>
<body>

<?php include('includes/menu.php'); ?>

<div class="contentHolder" id="content">

<div class="sectionTitle">
	<h2>add blog post</h2>
	<?php include('includes/notifications.php'); ?>
</div>

<p><a href="admin/blog/posts" class="button"><img src="system/themes/default/images/buttonIcons/blog.png" style="margin-bottom:-4px;" /> View all posts</a> <a href="admin/blog/add" class="button"><img src="system/themes/default/images/buttonIcons/attention.png" style="margin-bottom:-4px;" /> Reset Form</a></p>

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

	<div class="formHeader" style="width: 870px;">Author</div>
	<div class="formItem" id="authorDiv" style='opacity:0.7;'>
		<input type="text" id="author" class="inputDiv" value='Harry Northover' readonly/>
	</div>

	<div class="formHeader" style="width: 870px;">Category<font style="opacity:0.5"> (ID)</font><div class="alert" id="typeHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div><div id="addCat" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/add.png" /></div></div>
	<div class="formItem" id="categoryDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#ECECEC")'>

     <div style="height:190px; overflow:scroll; padding-bottom:3px; background:#FFFFFF; padding:2px; border:1px solid #CCCCCC">

	  <?php $i = 0; ?>
      <?php foreach($categorys as $cat):?>
		<div class="post" <?php if ($i == 0) echo 'style="border-top:thin solid #CCCCCC"'; ?> id="cat<?php echo $cat->getId(); ?>" onMouseOver="visual.changeBackgroundImage(this.id, 'rollover');" onMouseOut="visual.changeBackgroundImage(this.id, 'rollout');" onClick='setCategory(<?php echo $cat->getId(); ?>);'>
		<div class="title" id="catTitle<?php echo $cat->getId(); ?>">
		<div id='catTitleText<?php echo $cat->getId(); ?>' style="color:#345775" onClick="visual.editTitle(this.id, this.parentNode.id, <?php echo $cat->getId(); ?>, '<?php echo $cat->title(); ?>', 'categorys', 'categorys');"><?php echo $cat->title() . ' <font style="opacity:0.5">(' . $cat->getId() . ')</font>'; ?></div></div>
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

	<div class="formHeader" style="width: 870px;"><div style="float:left">Preview Image</div><div class="alert" id="fileAlert" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="previewImageDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="previewImage">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>"><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;">Content<div class="alert" id="contentHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="descDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC;'>
		 	<textarea name="description" id="description"></textarea>
  	</div>

  	<input type="hidden" id="casestudyID">
	<input type="hidden" id="categoryID">

	<div id="submitButton" class="submit"
		 onMouseOver="visual.changeBackgroundColour(this.id, 'rollover')"
    	 onMouseOut="visual.changeBackgroundColour(this.id, 'rollout')"
    	 onClick="formData = validateForm('title,author,categoryID,previewImage,description'); if(formData) { checkPrivate(); data.addNewBlogPost(formData); $('#sucessMessage').fadeIn(); } ">
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

    	function encodeContent()
    	{
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