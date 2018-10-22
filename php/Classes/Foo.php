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
	 * @param string $newArticleTitle string that is the title of the article
	 * @param string $newArticleContent string that contains date of Article
	 *
	 **/
	public function __construct(Uuid $articleId, Uuid $articleAuthorId, Uuid $articleAlbumId, string $newArticleTitle, string $articleContent) {
		try {
			$this->setArticleId($newArticleId);
			$this->setArticleAuthorId($newArticleAuthorId);
			$this->setArticleAlbumId($newArticleAlbumId);
			$this->articleTitle($newArticleTitle);
			$this->setArticleContent($newArticleContent);
		}
	}

	/**
	 * accessor method for article id
	 *
	 * @return Uuid value of tweet id
	 **/
	public function getArticleId : Uuid {
		return ($this->articleId);

		//this outside of class
		//$article->getArticleId();
	}

	/**
	 * mutator method for article id
	 * @param string | Uuid $newArticleId
	 * @throws \RangeException if $newArticleId is not positive
	 * @throws \TypeError if $newArticleId is not an integer
	 **/
	public function setArticleid( $newArticleId): void {
		try {
			$uuid = self::validateUuuid($newArticleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->articleId = $uuid;
	}

	/**
	 * accessor method for article author id
	 *
	 * @return Uuid
	 **/
	public function getArticleAuthorId(): Uuid {
		return $this->articleAuthorId;
	}
	/**
	 *mutator method for the article author id
	 * @param string | Uuid $newArticleAuthorId
	 * @throws \RangeException if $newArticleAuthorId is not positive
	 * @throws \TypeError if $newArticleAuthorId is not an integer
	 **/

	public function setArticleAuthorId( $newArticleAuthorId): void {
		try {
			$uuid = self::validateUuid($newArticleAuthorId);
		} catch(\InvalidArgumentException|\RangeException|\Exception|\TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exception($exception->getMessage(), 0, $exception));
	}

	// convert and store the article author id
	$this->articleAuthorId = $uuid;
}

/**
 * accessor method for article album id
 *
 * @return Uuid
 **/
	public function getArticleAlbumId(): Uuid {
		return $this->articleAlbumId;
	}
	/**
	 * mutator method for the article album id
	 * @param string | Uuid $newArticleAlbumId
	 * @throws \RangeException if $newArticleAlbumId is not positive
	 * @throws \TypeError if $newArticleAlbumId is not an integer
	 **/
	public function setArticleAlbumId( $newArticleAlbumId): void {
		try {
			$uuid = self::validateUuid($newArticleAlbumId);
			}catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exception($exception->getMessage(), 0, $exception));
	}

	//convert and store the article album id
	$this->articleAlbumId = $uuid;
}

/**
 * accessor method for the article title
 *
 * @return string
 **/
	public function getArticleTitle() : string {
		return($this->articleTitle);
	}

	/**
	 * mutator method for the article title
	 * @param string $newArticleTitle
	 * @throws\InvalidArgumentException if $newArticleTitle is not a string or insecure
	 * @throws \RangeException if $newArticleTitle is > 256 characters
	 * @throws \TypeError if $newArticleTitle is not a string
	 **/

	/**
	 * @param string $articleTitle
	 */
	public function setArticleTitle(string $articleTitle): void {
		$newArticleTitle = trim($newArticleTitle);
		$newArticleTitle = filter_var($newArticleTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleTitle) === true) {
			throw(new \InvalidArgumentException("article title is empty or insecure"));
		}

		if(strlen($newArticleTitle) > ) {
			throw(new \RangeException("article title too large"));
		}
		$this->articleTitle = $newArticleTitle;
	}
	/**
	 * accessor method for the article content
	 * @return string value of the article content
	 **/
	/**
	 * @return string
	 */
	public function getArticleContent(): string {
		return $this->articleContent;
	}

	/**
	 * mutator method for the new article content
	 * @param string $newArticleContent
	 * @throws \InvalidArgumentException if $newArticleContent is not a string or insecure
	 * @throws \RangeException if $newArticleContent is > 1040 characters
	 * @throws \TypeError if $newArticleContent is not a string
	 **/
	/**
	 * @param string $articleContent
	 */
	public function setArticleContent(string $articleContent): void {
		$newArticleContent = trim($newAritlceContent);
		$newArticleContent = filter_var($newArticleContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleContent) === true) {
			throw(new \InvalidArgumentException("article content too large"));
		}

		$this->articleContent = $newArticleContent;
	}
}