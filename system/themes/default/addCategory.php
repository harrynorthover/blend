<!DOCTYPE html>
<html>
<head>

<?php include('includes/header.php'); ?>

<style>
body { background:none; }
</style>

</head>

<body style="padding-left:12px; padding-right:5px; padding-top:10px; margin-bottom:-5px;">

<script type='text/javascript'>
	function validate(i)
	{
		var e = document.getElementById(i);
		return e.value == '' ? false : true;
	}

	function add()
	{
		var t = document.getElementById('title');
		var des = document.getElementById('desc');
		var string = 'title=' + t.value + '&desc=' + des.value;
		data.addCategory(string);
		$('#sucessMessage').fadeIn();
	}
</script>

<form id="addCatForm">
	<div class="formHeader">
		Title
	</div>
	<div class="formItem" id="catTitleDiv" onmouseover='visual.changeBackgroundColour(this.id, "#E0E3EF")' onmouseout='visual.changeBackgroundColour(this.id, "#EEEEEE")' style="width:470px;">
		<input type="text" id="title" class="inputDiv" style="width:457px;"/>
	</div>
	<div class="formHeader">
		Description
	</div>
	<div class="formItem" id="catDescDiv" onmouseover='visual.changeBackgroundColour(this.id, "#E0E3EF")' onmouseout='visual.changeBackgroundColour(this.id, "#EEEEEE")' style="width:470px;">
		<textarea id="desc" class="inputDiv" style="width:457px; height:92px;"></textarea>
	</div>
	<div id="submitButton" class="submit" onmouseover="visual.changeBackgroundColour(this.id, 'rollover')" onmouseout="visual.changeBackgroundColour(this.id, 'rollout')" onclick="if(validate('title')) { add(); }">
		 Submit
	</div>

	<div id='sucessMessage' style="float: left; padding: 7px; background: #ECECEC; margin: 10px; border-radius: 3px; font-weight: bold; width:100px; text-align:center; display:none">
    	Added!
    </div>
</form>

</body>
</html>