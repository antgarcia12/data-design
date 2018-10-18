<?php
namespace agarcia707\DataDesign;

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class Article {
	/**
	 *id for this article
	 * @var Uuid $articleId
	 **/
	private $articleId;
	/**
	 * id for the Author that wrote this article; this is a foreign key
	 * @var Uuid $articleAuthorId
	 */
	private $articleAuthorId;
	/**
	 *
	 * @var
	 */
	private $articleContent;
	private $articleTitle;
	private $articleAlbumId;
}