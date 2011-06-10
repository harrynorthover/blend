<!DOCTYPE html>
<html>

<?php include('includes/header.php'); ?>

<title>Portfolio</title>

<style type="text/css" media="screen">
    object { outline:none; }
</style>

<script type="text/javascript" src="assets/js/swfobject.js"></script>
<script type="text/javascript">
var flashvars = {};
var params = { wmode: "transparent" };
var attributes = {};
swfobject.embedSWF("themes/default/slideshow/loader.swf", "slideshow", "900", "450", "9.0.0", "expressInstall.swf", flashvars, params, attributes);
</script>
</head>

<body>
<div class="globalContainer">
		<?php include("includes/menu.php"); ?>
			<h2 class="pageTitle" style="margin-bottom:-10px;">Portfolio</h2>
			<div class="flash_slideshow" id="slideshow">
				<h4 style="height:140px; vertical-align:middle; color:#013969; padding-top:180px; padding-bottom:20px;"><img src="assets/imgs/flash_msg.png" width="587" height="20" alt="Sorry, the content requires a newer version of Adobe Flash Player."/><br/>
				<p>
					<a href="http://www.adobe.com/go/getflashplayer" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Get Flash Player','','assets/imgs/get_flash_btn_rollover.png',1)"><img src="assets/imgs/get_flash_btn.png" alt="Get Adobe Flash Player" name="Get Flash Player" width="254" height="53" border="0" id="Get Flash Player" style="padding-top:0px;"/></a>
				</p>
				</h4>
			</div>
			<img src="themes/default/imgs/work_message.png" style="float:center; margin-top:-25px;"/>
			<div class="text_content" style="padding-top:0px; width:820px;">
				<div>
					<?php foreach ($items as $item): ?>
					<a href="portfolio/<?php echo $item->urlTitle() ?>"><img src="<?php echo $item->previewImageURL() ?>" alt="" name="Portfolio Item" border="0" id="Portfolio Item" title="<?php echo $item->briefDescription() ?>" style="margin-left:-7px;"/></a>
					<!--<div style="width:400px; height:275px; float:left; margin-left:-10px;">
<a href="portfolio/{url_title}"><img src="{prev_img_url}" style="margin-left:5px;"/></a>
<div style="padding-left:20px; padding-top:5px;"><font face="Georgia, Times New Roman, Times, serif" size="+1"><a href="portfolio/{url_title}">{title}</a>. <div class="view_box" align="center"><a href="portfolio/{url_title}">VIEW</a></div></font></div>
<hr style="padding-left:15px; padding-right:15px; width:380px; margin-left:10px;" align="left"/>
<font style="font-weight:lighter">
<div id="desc" style="padding-left:20px; padding-right:20px; margin-top:-10px; margin-bottom:10px;">{brief_desc}</div>
</font>
</div>-->
					<?php endforeach; ?>
					<p>
					</p>
				</div>
			</div>
		</div>
<?php
/*
 * Include the footer.
 */
include('includes/footer.php');
?>

</body>
</html>