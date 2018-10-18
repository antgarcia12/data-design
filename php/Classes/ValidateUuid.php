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
	*id for the album the article talks about
	 * @var Uuid $articleAlbumId
	 **/
	private $articleAlbumId;
	/**
	 *title of the article that was written
	 * @var string $articleTitle
	 **/
	private $articleTitle;
	/**
	 * actual textual content of this Article
	 * @var string $articleContent
	 **/
	private $articleContent;

	/**
	 * constructor for this Article
	 *
	 * @param Uuid $newArticleId id of this Article or null if a new Article
	 * @param Uuid $newArticleAuthorId id of this Author or null if a new Author
	 * @param Uuid $newArticleAlbumId id of this Album or null if a new Album
	 *
	 **/
}