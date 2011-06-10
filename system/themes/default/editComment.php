<!DOCTYPE html>
<html>
<head>

<?php include('includes/header.php'); ?>

<title>Editing - <?php echo rawurldecode($comment->title()); ?></title>

<!-- Include form validation. -->
<script type="text/javascript" src="system/themes/default/js/formValidate.js"></script>
<script type="text/javascript">
function setCasestudy(id)
{
	var newV = id;
	var oldV = $('input[id=casestudyID]').val();

	$("#casestudyID").html("value: '" + id + "'");
	$('input[id=casestudyID]').val(id);

	if(oldV != null || oldV != "" || oldV != 'undefined')
		visual.changeBackgroundImage("cs" + oldV, 'rollout_alreadySelected');

	visual.changeBackgroundImage("cs" + id, "selected");
}

function setCategory(id)
{
	var newV = id;
	var oldV = $('input[id=categoryID]').val();

	$("#categoryID").html("value: '" + id + "'");
	$('input[id=categoryID]').val(id);

	if(oldV != null || oldV != "" || oldV != 'undefined')
		visual.changeBackgroundImage("cat" + oldV, 'rollout_alreadySelected');

	visual.changeBackgroundImage("cat" + id, "selected");
}

head(function () {
	$(document).ready(function() {
	    // add tool tips
	    $('#titleHelp').qtip( { content: 'The title of the project/work piece. <b>Never put fullstops at the end of the title. The CMS does this for you!</b>', position: { corner: { tooltip: 'topRight' } } });
	    $('#dateHelp').qtip( { content: 'The original date of publication.', position: { corner: { tooltip: 'topRight' } } });
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
	    		         title: { text: 'Add a Category', button: 'X' },
	    		         text: '<iframe src="admin/categorys/add" width="530" height="338" style="border:none; overflow:hidden"></iframe>'
	    		      },
	    		      position: { target: $(document.body), corner: 'center' },
	    		      show: { when: 'click', solo: true },
	    		      hide: false,
	    		      style: { width: { min:550 }, padding: '5px', border: {  width: 9, radius: 5, color: '#666666' }, name: 'light' },
	    		      api: {
	    		         beforeShow: function() { $('#qtip-blanket').fadeIn(this.options.show.effect.length); },
	    		         beforeHide: function() { $('#qtip-blanket').fadeOut(this.options.hide.effect.length); }
	    		      }
	    		   });

	    $('<div id="qtip-blanket">').css({
	          position: 'absolute', top: $(document).scrollTop(), left: 0, height: $(document).height() + 1000, width: '100%', opacity: 0.8, backgroundColor: 'black', zIndex: 5000
	       })
	       .appendTo(document.body)
	       .hide();
	});
});
</script>

</head>
<body>

<?php include('includes/menu.php'); ?>

<div class="contentHolder" id="content">

<div class="sectionTitle">
	<h2><font color="#CCC"><img src="system/themes/default/images/buttonIcons/options.png" style="margin-bottom:-3px; margin-right:-2px;" width="16" height="16" /> editing</font> <?php echo rawurldecode($comment->title()); ?></h2>
</div>

<p><a href="admin/comments/view" class="button"><img src="system/themes/default/images/buttonIcons/blog.png" style="margin-bottom:-4px;" /> View all comments</a> <a href='admin/comment/delete/<?php echo $comment->getId(); ?>' id="submitButton" class="submit" style='background:red; float:right; margin-top:-6px;'>Delete</a></p>

<script type="text/javascript" src="system/themes/default/js/external/tiny_mce/tiny_mce.js"></script>

<!-- FORM STARTS HERE. -->
<form action="" method="post" id="addNewPortfolioItemForm" enctype="multipart/form-data">

	<div class="formHeader" style="width: 870px;">Title <div class="alert" id="titleHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="titleDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="title" class="inputDiv" value="<?php echo rawurldecode($comment->title()); ?>"/>
	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Section</div><div class="alert" id="fileAlert" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="section" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="section">
		 		<option id="portfolio" value="portfolio" <?php if(rawurldecode($comment->section()) == 'portfolio') echo 'selected="selected"'?>>Portfolio</option>
		 		<option id="blog" value="blog" <?php if(rawurldecode($comment->section()) == 'blog') echo 'selected="selected"'?>>Blog</option>
      		</select>
  	</div>

  	<div class="formHeader" style="width: 870px;"><div style="float:left">Article / Item ID</div><div class="alert" id="fileAlert" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="itemId" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="itemId">
		 		<option id="<?php echo $comment->itemID();?>" value="<?php echo $comment->itemID();?>"><?php echo $comment->itemID(); ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;">Date <div class="alert" id="dateHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="dateDiv">
		<input type="text" id="date" class="inputDiv" value="<?php echo rawurldecode($comment->publishDate()); ?>" readonly/>
	</div>

	<div class="formHeader" style="width: 870px;">Author <div class="alert" id="clientHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="authorDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="author" class="inputDiv" value="<?php echo rawurldecode($comment->author()); ?>"/>
	</div>

	<div class="formHeader" style="width: 870px;">Author's Email <div class="alert" id="clientHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="emailDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="email" class="inputDiv" value="<?php echo rawurldecode($comment->userEmail()); ?>"/>
	</div>

	<div class="formHeader" style="width: 870px;">Author's Website <div class="alert" id="clientHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="websiteDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="website" class="inputDiv" value="<?php echo rawurldecode($comment->userSite()); ?>"/>
	</div>

	<div class="formHeader" style="width: 870px;">Comment<div class="alert" id="contentHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="commentDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC'>
		 	<textarea name="comment" id="comment" style='width: 851px; height:200px;'><?php echo rawurldecode($comment->comment()); ?></textarea>
  	</div>

	<div id="submitButton" class="submit"
		 onMouseOver="visual.changeBackgroundColour(this.id, 'rollover')"
    	 onMouseOut="visual.changeBackgroundColour(this.id, 'rollout')"
    	 onClick="formData = validateForm('title,author,email,itemId,website,section,date,comment'); if(formData) { checkApproved(); data.updateComment(<?php echo $comment->getId(); ?>, formData); $('#sucessMessage').fadeIn(); }">
    	 Submit
    </div>

    <input type="hidden" name="isApproved" value="false" />
    <p class='checkbox'>Approved?<input type='checkbox' id='isApproved' value='true' style='border:none; width:auto; padding:0; height:auto;' <?php if($comment->isApproved() == 'true') echo 'checked="checked"'?>></p>

    <div id='sucessMessage' style="float: left; padding: 7px; background: #ECECEC; margin: 10px; border-radius: 3px; font-weight: bold; width:100px; text-align:center; display:none">
    	Updated!
    </div>

</form>
<!-- FORM ENDS HERE. -->

<script>
	function checkApproved() {
		var isApproved = 'false';

		if(document.getElementById('isApproved').checked)
			isApproved = 'true';

		formData += '&isApproved=' + isApproved;
	}
</script>

</div>

</body>
</html>