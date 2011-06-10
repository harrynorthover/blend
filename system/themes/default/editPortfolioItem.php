<!DOCTYPE html>
<html>
<head>

<?php include('includes/header.php'); ?>

<title>Editing - <?php echo rawurldecode($item->title()); ?></title>

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
	<h2><font color="#CCC"><img src="system/themes/default/images/buttonIcons/options.png" style="margin-bottom:-3px; margin-right:-2px;" width="16" height="16" /> editing</font> <?php echo rawurldecode($item->title()); ?> <font style="color:#CCC; font-size:12px; float:right; opacity:0.8"><a href="<?php echo rawurldecode($item->finalURL()); ?>" target="_blank"><?php echo rawurldecode($item->finalURL()); ?></a></font></h2>
	<?php include('includes/notifications.php'); ?>
</div>

<p><a href="admin/portfolio/items" class="button"><img src="system/themes/default/images/buttonIcons/blog.png" style="margin-bottom:-4px;" /> View all items</a> <a href="admin/portfolio/add" class="button" style="float:right; margin-top:-6px;"><img src="system/themes/default/images/add.png" style="margin-bottom:-4px; margin-right:3px; opacity:0.8" width="15" height="15"/> Add new item</a></p>

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
		<input type="text" id="title" class="inputDiv" value="<?php echo rawurldecode($item->title()); ?>"/>
	</div>

	<div class="formHeader" style="width: 870px;">Date <div class="alert" id="dateHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="dateDiv">
		<input type="text" id="date" class="inputDiv" value="<?php echo rawurldecode($item->publishDate()); ?>" readonly/>
	</div>

	<div class="formHeader" style="width: 870px;">Client <div class="alert" id="clientHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
	<div class="formItem" id="clientDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		<input type="text" id="client" class="inputDiv" value="<?php echo rawurldecode($item->client()); ?>"/>
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
		<input type="text" id="finalLink" class="inputDiv" value="<?php echo rawurldecode($item->finalURL()); ?>"/>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Preview Image</div><div class="alert" id="fileAlert" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="previewImageDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="previewImage">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>" <?php if($item->prevImageURL() == $file) echo 'selected="selected"'?>><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Screenshot 1</div><div class="alert" id="fileAlert2" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="screenshot1Div" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="screenshot1">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>" <?php if($screenshot1 == $file) echo 'selected="selected"'?>><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Screenshot 2</div><div class="alert" id="fileAlert3" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="screenshot2Div" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="screenshot2">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>" <?php if($screenshot2 == $file) echo 'selected="selected"'?>><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Screenshot 3</div><div class="alert" id="fileAlert4" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="screenshot3Div" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<select id="screenshot3">
		 	<?php foreach($files as $file): ?>
		 	<option id="<?php echo $file?>" <?php if($screenshot3 == $file) echo 'selected="selected"'?>><?php echo $file?></option>
		 	<?php endforeach; ?>
      		</select>
  	</div>

	<div class="formHeader" style="width: 870px;">Brief Description<div class="alert" id="briefDescHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="briefDescDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<textarea name="briefDescription" id="briefDescription"><?php echo $item->briefDescription(); ?></textarea>
  	</div>

	<div class="formHeader" style="width: 870px;">Content<div class="alert" id="contentHelp" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="descDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")'>
		 	<textarea name="description" id="description"><?php echo $item->description(); ?></textarea>
  	</div>

	<div class="formHeader" style="width: 870px;"><div style="float:left">Case Study</div><div class="alert" id="csAlert" style="padding:3px; width:10px; float:right; margin:5px; margin-top:-4px; margin-bottom:0px;"><img src="system/themes/default/images/help.png" /></div></div>
  	<div class="formItem" id="caseStudyDiv" onMouseOver='visual.changeBackgroundColour(this.id, "#E0E3EF")' onMouseOut='visual.changeBackgroundColour(this.id, "#EEEEEE")' style='border-bottom:1px solid #CCC'>

		 <div style='height:200px; overflow:scroll; background:#FFFFFF; padding:2px; border:1px solid #CCCCCC'>
		<?php $i = 0; ?>
        <?php foreach($cs as $casestudy):?>

		<div class="post" <?php if ($i == 0) echo 'style="border-top:thin solid #CCCCCC"'; ?> id="cs<?php echo $casestudy->getId(); ?>" onMouseOver="visual.changeBackgroundImage(this.id, 'rollover');" onMouseOut="visual.changeBackgroundImage(this.id, 'rollout');" onClick='setCasestudy(<?php echo $casestudy->getId(); ?>);'><div class="title" id="csTitle<?php echo $casestudy->getId(); ?>">
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
    	 onClick="formData = validateForm('title,client,categoryID,date,finalLink,previewImage,briefDescription,description,casestudyID,screenshot1,screenshot2,screenshot3'); if(formData) data.updatePortfolioItem(<?php echo $item->getId(); ?>, formData); $('#sucessMessage').fadeIn();">
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