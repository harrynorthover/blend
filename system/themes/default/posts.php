<html>
<head>

<?php include('includes/header.php'); ?>
<?php include('includes/menu.php'); ?>

<title>Blog Items</title>

</head>

<body onLoad="showSubmenu('blogSubmenu')">

<div class="contentHolder" id="content">
<h2 align="left">blog</h2>

<p>
<a href="admin/blog/add" class="button" style="width:80px;">
<img src="system/themes/default/images/add.png" style="margin-bottom:-4px; margin-right:3px; opacity:0.8" width="15" height="15"/> Add new post.</a></p>

<p><a href="blog" class="button" style="width:70px; float:right; margin-top:-37px;">View Portfolio</a></p>

<div id="table_title">
<div style="float:left">Title</div>
<div style="padding-left:277px; float:left">Description</div></div>

<?php foreach($entries as $item):?>

<div class="post" id="post<?php echo $item->getId(); ?>" onMouseOver="visual.changeBackgroundImage(this.id, 'rollover');" onMouseOut="visual.changeBackgroundImage(this.id, 'rollout');"><div class="title" id="title<?php echo $item->getId(); ?>">
<div id='titleText<?php echo $item->getId(); ?>' style="color:#345775" onClick="visual.editTitle(this.id, this.parentNode.id, <?php echo $item->getId(); ?>, '<?php echo $item->title(); ?>', 'blogposts', 'blog');"><?php echo rawurldecode($item->title()); ?></div></div>
<div id="brief_desc"><?php echo substr(strip_tags(rawurldecode($item->content()),"<br>, <b>, <i>, <li>"), 0, 80) . '...'; ?></div><div id="functions" style="padding-top:0px;">
<a href="admin/blog/edit/<?php echo $item->getId(); ?>"><img src="system/themes/default/images/application_edit.png" alt="Edit" name="Edit" border="0" id="Edit"/></a>
<img src="system/themes/default/images/lock.png" alt="Toggle Visibility" name="Toggle_Visibility" border="0" id="Toggle_Visibility" onClick="visual.toggleState(this.parentNode.parentNode.parentNode.id, this.parentNode.parentNode.id, 'blogposts')"/>
<img src="system/themes/default/images/delete.png" alt="Delete" name="Delete" border="0" id="Delete" onClick="visual.removeItem(this.parentNode.parentNode.id, this.parentNode.parentNode.id, this.parentNode.parentNode.parentNode.id, 'blog');"/>
</div>
</div>

<script type="text/javascript">
if(<?php echo $item->isPrivate(); ?> == 1) utils.dimElement('post' + <?php echo $item->getId(); ?>);
</script>

<?php endforeach; ?>
</div>

</body>
</html>