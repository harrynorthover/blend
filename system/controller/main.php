<?php

class Main extends baseController {
	public function index($args) {
		// Get & configure portfolio/work items.
		$tmp = $this->registry->retrive->getData(Types::PORTFOLIO_ITEMS_TABLE, 4, null, 'ORDER BY id DESC');
		$uploadURL = $this->registry->retrive->getUploadPath();

		// Add the uploads path onto the preview image url path.
		for( $i = 0; $i < count($tmp); $i++ ) {
			if($tmp[$i]->isPrivate() == 'true')
				unset($tmp[$i]);
			else
				$tmp[$i]->prevImageURL($uploadURL . '/' . $tmp[$i]->prevImageURL());
		}

		$this->registry->template->works = $tmp;

		// Get & configure the blog posts.
		$posts = $this->registry->retrive->getData(Types::BLOG_POSTS_TABLE, 2, null, 'ORDER BY id DESC');

		// TODO: Fix this so only posts that aren't private are shown. 
		for( $j = 0; $j < count($posts); $j++) {
			if($posts[$j]->isPrivate() == 'true') 
				unset($posts[$j]);
			else if($posts[$j])
				$posts[$j]->content(substr(strip_tags($posts[$j]->content(), '<p><b><a>'), 0, 600) . '...');
		}

		$this->registry->template->posts = $posts;
		$this->registry->template->show('themes/default/index');
	}
}

?>