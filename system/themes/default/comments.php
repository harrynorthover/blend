<!DOCTYPE html>
<html>
<head>

<?php include('includes/header.php'); ?>

<title>Comments</title>

</head>

<body>

<?php include('includes/menu.php'); ?>

<div class="contentHolder" id="content">
<h2 align="left">comments</h2>
<?php include('includes/notifications.php'); ?>

<form action='admin/comments/handleForm' method='post' id='approveForm'>
<input type='hidden' value='approveComments' id='act' name='act'/>

<div style='height:50px; margin-top:-13px;'>

	<p class='button' style='width:20px; float:left;' onClick='document.getElementById("act").value = "approve"; $("#approveForm").submit();'>
		<img src="system/themes/default/images/accept.png" style="margin-bottom:-4px; margin-right:3px; opacity:0.8" width="15" height="15"/>
	</p>

	<p class='button' style='width:20px; float:left; margin-left:10px;' onClick='document.getElementById("act").value = "unapprove"; $("#approveForm").submit();'>
		<img src="system/themes/default/images/unapprove.png" style="margin-bottom:-4px; margin-right:3px; opacity:0.8" width="15" height="15"/>
	</p>

</div>

<div id="table_title">
	<div style="float:left">Title</div> <div style="padding-left:277px; float:left">Comment</div></div>

<?php foreach($comments as $comment):?>
<div class="post" id="post<?php echo $comment->getId(); ?>" <?php if($comment->isApproved() =='false') echo'style="background-color:#aa3333; background-image:none; color:white; border:none"'; else if ($comment->isAdminComment() == 'true') echo 'style="background:aliceBlue; opacity:1;"';?>
	onMouseOver="<?php if($comment->isApproved() == 'true') echo "visual.changeBackgroundImage(this.id, 'rollover')"; ?>"
	onMouseOut="<?php if($comment->isApproved() == 'true') echo "visual.changeBackgroundImage(this.id, 'rollout')"; ?>">

<div class="title" id="title<?php echo $comment->getId(); ?>">

<div id='titleText<?php echo $comment->getId(); ?>' style="color:<?php if($comment->isApproved() =='false') echo 'white'; else echo '#345775'; ?>" onClick="visual.editTitle(this.id, this.parentNode.id, <?php echo $comment->getId(); ?>, '<?php echo rawurldecode($comment->title()); ?>', 'comments', 'comments');"><?php echo rawurldecode($comment->title()); ?></div></div>
<div id="brief_desc" <?php if($comment->isApproved() =='false') echo 'style="color:white"'?>><?php echo rawurldecode($comment->comment()); ?></div><div id="functions" style="padding-top:0px;">

<input type='checkbox' value='<?php echo $comment->getId(); ?>' name='approve[]' style='width:auto; height:auto;'></input>

<a href="admin/comments/edit/<?php echo $comment->getId(); ?>"><img src="system/themes/default/images/application_edit.png" alt="Edit" name="Edit" border="0" id="Edit"/></a>

<?php if($comment->isApproved() =='false') {
	echo '<a href="admin/comments/approve/ ' . $comment->getId() . '"><img src="system/themes/default/images/accept.png" alt="Approve" name="approve" border="0" id="approve" onClick=""/></a>';
} else
	echo '<a href="admin/comments/unapprove/ ' . $comment->getId() . '"><img src="system/themes/default/images/unapprove.png" alt="Un-Approve" name="unapprove" border="0" width="17" height="17" id="unapprove"/></a>';
?>

<img src="system/themes/default/images/delete.png" alt="Delete" name="Delete" border="0" id="Delete" onClick="visual.removeItem(this.parentNode.parentNode.id, this.parentNode.parentNode.id, this.parentNode.parentNode.parentNode.id, 'comments');"/>

</div>
</div>

<script type="text/javascript">
if(<?php echo $comment->isPrivate(); ?> == 1)
	utils.dimElement('post' + <?php echo $comment->getId(); ?>);
</script>

<?php endforeach; ?>

</form>

<p style="color:#CCCCCC; font-size:12px;">To quickly change an items title, <b>click on it</b> and <b>enter the new text</b> into the text box and <b>press enter</b>. </p>

</div>

</body>
</html>