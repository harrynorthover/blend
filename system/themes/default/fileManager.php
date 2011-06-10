<html>
<head>

<?php include('includes/header.php'); ?>

<title>Media Manager - <?php echo $currentDirectory; ?></title>

<style>
body { background:none; }
</style>

</head>
<body>


<div id="fileInput">
<form enctype="multipart/form-data" action="admin/fileManager/upload" method="POST" style="margin-left:18px; margin-top:10px; margin-bottom:10px; border:0px; width:787px;">
Upload a file: (<?php echo $currentDirectory; ?>)<br/>
<input type="file" id="fileName" name="fileName" size="68" style="width:87%; height:30px;"/>
<input type="submit" value="Submit" class="submit" style="width:60px; height:30px;"/>
</form>
</div>

<div id="files"
	 style="width:735px;
	 		border:thin dotted #CCCCCC;
			margin-left:18px;
			margin-top:10px;
			padding:5px;
			overflow:auto;
			height:410px;">

<?php $i = 0; ?>

<?php foreach($files as $file):?>

	<div id="file<?php echo $i; ?>"
		 style="padding:10px;
		 		border-bottom: thin solid #CCCCCC;
		 		border-left:thin solid #CCCCCC;
				border-right:thin solid #CCCCCC;
				<?php if ($i == 0) echo "border-top:thin solid #CCCCCC;"?>
				background:url(system/themes/default/images/tableItemBG.jpg) repeat-x;"
		 onMouseOver="visual.changeBackgroundImage(this.id, 'rollover');"
		 onMouseOut="visual.changeBackgroundImage(this.id, 'rollout');">
		 <?php echo $file; ?><div style="float:right"><img src="system/themes/default/images/link.png" title="Insert" style="margin-right:15px;"/><a href="uploads/<?php echo $file; ?>"><img src="system/themes/default/images/disk.png" title="Download - Right click, select 'Save link as..'" style="margin-right:15px; border:0"/></a><img src="system/themes/default/images/bin.png" title="Delete" onClick="deleteFile(this.parentNode.parentNode.id, '<?php echo $file; ?>')" /></div>
	</div>

<?php $i++; ?>

<?php endforeach;?>

</div>
<p style="color:#666666; font-size:10pt; margin-left:15px"><img src="system/themes/default/images/help.png" style="padding:2px; margin-left:2px; margin-bottom:-5px;"/> To save files, right click on the save icon and click "Save Link as.."</p>

<script type="text/javascript">

function deleteFile(id, name)
{
	/*fileName 	= name.split('.')[0];
	extension 	= name.split('.')[1];
	urlParams 	= '';

	for(var i = 0; i < name.split('.').length; i++)
	{
		urlParams += '/' + name.split('.')[i];
	}

	$.get('admin/fileManager/deleteFile' + urlParams, function(data) {});*/

	query = 'fileName=' + encodeURIComponent(name);
	$.post('admin/fileManager/delete', query, function(data) {});

	/*
	 * TODO: Remove div of folder that has been deleted.
	 */
	$('#' + id).hide('blind', function () {
        //removeElement(parent2DivID, parentDivID);
    });
}

</script>

</body>
</html>