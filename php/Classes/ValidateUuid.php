<?php
namespace agarcia707\DataDesign;

require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

class Article {
	private $articleId;
	private $articleAuthorId;
	private $articleContent;
	private $articleTitle;
	private $articleAlbumId;

	/**
	 * constructor for this Article
	 *
	 * @param string|Uuid $newArticleId id of this Article or null if a new Article
	 * @param string|Uuid $newArticleAuthorId id of the Author that wrote this Article
	 * @param string $newArticleContent string containing actual Article data
	 * @param \DateTime|string|null $newTweetDate date and time Tweet was sent or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/

} 