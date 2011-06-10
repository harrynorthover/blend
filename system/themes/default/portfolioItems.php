<!DOCTYPE html>
<html>
<head>

<?php include('includes/header.php'); ?>

<title>Portfolio Items</title>

</head>

<body>

<?php include('includes/menu.php'); ?>

<div class="contentHolder" id="content">
<h2 align="left">portfolio</h2>
<?php include('includes/notifications.php'); ?>

<p>
<a href="admin/portfolio/add" class="button" style="width:80px;">
<img src="system/themes/default/images/add.png" style="margin-bottom:-4px; margin-right:3px; opacity:0.8" width="15" height="15"/> Add new item.</a></p>

<p><a href="portfolio" class="button" style="width:70px; float:right; margin-top:-37px;">View Portfolio</a></p>

<div id="table_title">
	<div style="float:left">Title</div> <div style="padding-left:277px; float:left">Description</div></div>

<?php foreach($items as $p_item):?>
<div class="post" id="post<?php echo $p_item->getId(); ?>"
	 onMouseOver="visual.changeBackgroundImage(this.id, 'rollover');"
	 onMouseOut="visual.changeBackgroundImage(this.id, 'rollout');">

<div class="title" id="title<?php echo $p_item->getId(); ?>">

<div id='titleText<?php echo $p_item->getId(); ?>' style="color:#345775" onClick="visual.editTitle(this.id, this.parentNode.id, <?php echo $p_item->getId(); ?>, '<?php echo $p_item->title(); ?>', 'portfolioitems', 'portfolio');"><?php echo $p_item->title(); ?></div></div>
<div id="brief_desc"><?php echo $p_item->briefDescription(); ?></div><div id="functions" style="padding-top:0px;">
<a href="admin/portfolio/edit/<?php echo $p_item->getId(); ?>"><img src="system/themes/default/images/application_edit.png" alt="Edit" name="Edit" border="0" id="Edit"/></a>
<img src="system/themes/default/images/lock.png" alt="Toggle Visibility" name="Toggle_Visibility" border="0" id="Toggle_Visibility" onClick="visual.toggleState(this.parentNode.parentNode.parentNode.id, this.parentNode.parentNode.id, 'portfolioitems')"/>
<img src="system/themes/default/images/delete.png" alt="Delete" name="Delete" border="0" id="Delete" onClick="visual.removeItem(this.parentNode.parentNode.id, this.parentNode.parentNode.id, this.parentNode.parentNode.parentNode.id, 'portfolio');"/>

</div>
</div>

<script type="text/javascript">
if(<?php echo $p_item->isPrivate(); ?> == 1)
	utils.dimElement('post' + <?php echo $p_item->getId(); ?>);
</script>

<?php endforeach; ?>

<p style="color:#CCCCCC; font-size:12px;">To quickly change an items title, <b>click on it</b> and <b>enter the new text</b> into the text box and <b>press enter</b>. </p>

</div>

</body>
</html>