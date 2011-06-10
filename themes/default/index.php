<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php include('includes/header.php'); ?>

<title>
<?php echo 'The Portfolio & Blog of Harry Northover, Creative Developer'?>
</title>

<style type="text/css" media="screen">
    object { outline:none; }
</style>

<script type='text/javascript'>
slideshow();
</script>

</head>

<body>
<div class="globalContainer">

		<?php include("includes/menu.php"); ?>

		<div class="flash_slideshow" id="slideshow">
			<h4 style="height:140px; vertical-align:middle; color:#013969; padding-top:180px; padding-bottom:20px;"><img src="themes/default/imgs/flash_msg.png" width="587" height="20" alt="Sorry, the content requires a newer version of Adobe Flash Player."/><br/>
				<!-- TODO: Rewrite rollover functions to use the new ones. -->
				<a href="http://www.adobe.com/go/getflashplayer" target="_blank" onmouseout="MM_swapImgRestore()" onmouseover="MM_swapImage('Get Flash Player','','themes/default/imgs/get_flash_btn_rollover.png',1)"><img src="themes/default/imgs/get_flash_btn.png" alt="Get Adobe Flash Player" name="Get Flash Player" width="254" height="53" border="0" id="Get Flash Player" style="padding-top:0px;"/></a>
			</h4>
		</div>

			<div id="introText">
				<img src="themes/default/imgs/intro_text.png" width="512" height="48" style='float:left'/>
				<a href="about"
				 onmouseout="swap('findOutMoreButton', 'themes/default/imgs/find_out_more_btn.jpg')"
				 onmouseover="swap('findOutMoreButton','themes/default/imgs/find_out_more_btn_rollover.jpg')">
				 <img src="themes/default/imgs/find_out_more_btn.jpg" alt="Find Out More!" name="Find Out More" width="232" height="53" border="0" id="findOutMoreButton"/ style='float:right; margin-left:48px;'></a>
			</div>

			<div id="latestWorkTitle" class='title' style='margin-bottom:10px;'>
				<img src="themes/default/imgs/latest_work.jpg" alt="Latest Work"/>
				<a href="portfolio"
				   onmouseout="swap('viewPortfolioBtn','themes/default/imgs/view_portfolio.jpg')"
				   onmouseover="swap('viewPortfolioBtn','themes/default/imgs/view_portfolio_rollover.jpg')">
				   <img src="themes/default/imgs/view_portfolio.jpg" alt="View Portfolio" name="View Portfolio" width="132" height="22" border="0" id="viewPortfolioBtn" style='float:right;'/></a>
			</div>

			<!-- The portfolio items. -->

			<div class="latestWork">
				 <?php foreach($works as $item): ?>
				 <a href="portfolio/<?php echo $item->finalURL(); ?>"><img src="<?php echo $item->prevImageURL(); ?>" alt="<?php echo $item->title(); ?>" name="Portfolio Item" border="0" class='drop-shadow lifted'/></a>
				 <?php endforeach;?>
			</div>

			<div class="title" id='recentPostsTitle' style='margin-top:20px; margin-bottom:30px;'>
				<img src="themes/default/imgs/recent_posts.jpg" alt="Recent Posts" style="margin-bottom:5px;"/>
				<div style='float:right'>
					<a href="blog"
					   onmouseout="swap('viewBlogBtn','themes/default/imgs/view_blog.jpg')"
					   onmouseover="swap('viewBlogBtn','themes/default/imgs/view_blog_rollover.jpg')">
					   <img src="themes/default/imgs/view_blog.jpg" alt="View Blog" name="View Blog" width="132" height="22" border="0" id="viewBlogBtn"/></a>
				</div>
			</div>

			<!-- The blog posts. -->
			<?php foreach($posts as $entry):?>
			<div class="entry">
				<div class="postTitle">
					<h2><a href="blog/{url_title}"><?php echo rawurldecode($entry->title()); ?></a></h2>
				</div>
				<div class="postDate"> <?php echo $entry->publishDate(); ?> </div>
				<p>
					<?php echo $entry->content(); ?>
				</p>
				<div class="read_more">
					<div class="actions">
						<p> <a href="blog/{url_title}" target="_self" style="margin-top:10px;">Read More</a>
						| <a href="blog/{url_title}/comments">
							<img src="themes/default/imgs/comment_small.jpg" width="14" height="14" style="margin-bottom:-3px;"/> <b>0</b> Comments</a>
						| <a href="blog/{url_title}/comments/add"
							 onmouseout="swap('addCommentBtn<?php echo $entry->getId(); ?>','themes/default/imgs/add_comment_small.jpg')"
							 onmouseover="swap('addCommentBtn<?php echo $entry->getId(); ?>','themes/default/imgs/add_comment_small_rollover.jpg')">
							<img src="themes/default/imgs/add_comment_small.jpg" alt="Add Comment +" name="Add Comment" title="Join the conversation! Add a comment!" width="14" height="14" border="0" id="addCommentBtn<?php echo $entry->getId(); ?>" style="margin-bottom:-3px;"/></a>
						</p>
					</div>
				</div>
			</div>
			<?php endforeach;?>
		</div>

<?php
/*
 * Include the footer.
 */
include('includes/footer.php');
?>

</body>
</html>