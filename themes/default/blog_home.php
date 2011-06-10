<?php include('includes/header.php'); ?>

<title>Blog</title>
<link href="assets/css/front/home.css" rel="stylesheet" type="text/css" />

<style type="text/css" media="screen">
    object { outline:none; }
</style>

<script type="text/javascript" src="assets/js/swfobject.js"></script>
<script type="text/javascript">
			var flashvars = {};
			flashvars.xmlFile = "assets/slideshow/xml/pictures.xml";
			var params = {};
			params.play = "true";
			params.menu = "false";
			params.quality = "high";
			params.wmode = "transparent";
			params.allowfullscreen = "false";
			params.allownetworking = "all";
			var attributes = {};
			swfobject.embedSWF("assets/browser/Browser.swf", "slideshow", "900", "450", "9.0.0", false, flashvars, params, attributes);
</script>

</head>

<body>

<div class="container">
<div class="content">

<?php include("includes/menu.php"); ?>

<h2 class="title" style="margin-bottom:-10px;">Blog</h2>

<div id="slideshow" class="flash_slideshow">
			<h4 style="height:140px; vertical-align:middle; color:#013969; padding-top:180px; padding-bottom:20px;"><img src="assets/imgs/flash_msg.png" width="587" height="20" alt="Sorry, the content requires a newer version of Adobe Flash Player." /><br />
			<p><a href="http://www.adobe.com/go/getflashplayer" target="_blank" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Get Flash Player','','assets/imgs/get_flash_btn_rollover.png',1)"><img src="assets/imgs/get_flash_btn.png" alt="Get Adobe Flash Player" name="Get Flash Player" width="254" height="53" border="0" id="Get Flash Player" style="padding-top:0px;"/></a></p></h4>
</div>
<div class="main_text_content">
<div class="text_content" style="padding-top:50px; width:800px;">

{blog_posts}
<div class="blog_entry">

 <div class="blog_post_title"><h2>

  <a href="blog/{url_title}">{title}</a></h2></div>

  <p><div class="blog_post_date">{date}</div></p>

  <p>{content}</p>

<div class="read_more">

<div class="blog_post_divider"><img src="assets/imgs/line_divide_blog_post.png" width="950" height="35" /></div>

<div class="actions">

<p><a href="blog/{url_title}" target="_self" style="margin-top:10px;">Read More</a> | <a href="blog/{url_title}/comments"><img src="assets/imgs/comment_small.jpg" width="14" height="14" style="margin-bottom:-3px;"/> ({comment_count}) Comments</a> | <a href="blog/{url_title}/comments/add" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Add Comment','','assets/imgs/add_comment_small_rollover.jpg',1)"><img src="assets/imgs/add_comment_small.jpg" alt="Add Comment +" name="Add Comment" title="Join the conversation! Add a comment!" width="14" height="14" border="0" id="Add Comment +" style="margin-bottom:-3px;"/></a> | <i>{tagid}</i></p>

</div>

<div class="blog_post_divider"><img src="assets/imgs/line_divide_blog_post_mini.png" width="950" height="8" /></div>

</div>

</div>
{/blog_posts}

</div>
</div>
</div>
</div>

