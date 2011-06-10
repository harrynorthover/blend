<?php

/**
 * File: BlogParser.php
 * Created: 6:42:57 PM - Aug 14, 2010
 * Project: blend_v2
 *
 * Author: Harry Northover
 *         harrynorthover.com
 *
 * Description:
 * The parser for the data returned from the blog database.
 */

include_once ('interfaces/IParser.php');

class BlogParser implements IParser
{
	private $databaseData;
	private $parsedData = array ();

	public function parse($data)
	{
		$this->databaseData = $data;
		while ($row = mysql_fetch_array($this->databaseData))
		{
			//echo 'processing...';
			$object = new BlogItemVO($row['id']);
			$object->title(rawurldecode($row['title']));
			$object->publishDate(rawurldecode($row['date']));
			$object->tags(rawurldecode($row['tags']));
			$object->author(rawurldecode($row['author']));
			$object->content(rawurldecode($row['content']));
			$object->lastEdited(rawurldecode($row['lastEdited']));
			$object->previewImageURL(rawurldecode($row['previewImageURL']));

			if ($row['isPrivate'] == 'true') $object->isPrivate(true);
			else if ($row['isPrivate'] == 'false') $object->isPrivate(false);
			else $object->isPrivate(true);

			if ($row['commentsAllowed'] == 'true') $object->commentsAllowed(true);
			else if ($row['commentsAllowed'] == 'false') $object->commentsAllowed(false);
			else $object->commentsAllowed(true);

			array_push($this->parsedData, $object);
		}
		return array_reverse($this->parsedData);
	}
}
?>
