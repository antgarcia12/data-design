<?php

namespace agarcia707\DataDesign;

require_once (dirname(__DIR__, 2). "/vendor/autoload.php");
require_once ("autoload.php");

use Ramsey\Uuid\Uuid;

class Article implements \JsonSerializable {

	use ValidateUuid;
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
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 *
	 **/
	public function __construct($newArticleId, $newArticleAuthorId, $newArticleAlbumId, string $newArticleTitle, string $newArticleContent) {
		try {
			$this->setArticleId($newArticleId);
			$this->setArticleAuthorId($newArticleAuthorId);
			$this->setArticleAlbumId($newArticleAlbumId);
			$this->setArticleTitle($newArticleTitle);
			$this->setArticleContent($newArticleContent);
		}
			catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
				$exceptionType = get_class($exception);
				throw(new$exceptionType($exception->getMessage(), 0, $exception));
			}
	}


	/**
	 * accessor method for article id
	 *
	 * @return Uuid value of tweet id
	 **/
	public function getArticleId () : Uuid {
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
	public function setArticleId( $newArticleId): void {
		try {
			$uuid = self::validateUuid($newArticleId);
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
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
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
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
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
		$newArticleTitle = trim($articleTitle);
		$newArticleTitle = filter_var($newArticleTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleTitle) === true) {
			throw(new \InvalidArgumentException("article title is empty or insecure"));
		}

		if (strlen($newArticleTitle) >= 256) {
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
		$newArticleContent = trim($articleContent);
		$newArticleContent = filter_var($newArticleContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleContent) === true) {
			throw(new \InvalidArgumentException("article content too large"));
		}

		$this->articleContent = $newArticleContent;
	}


/**
 * inserts this Article into mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/

public function insert(\PDO $pdo) : void {

	// create query template
	$query = "INSERT INTO article(articleId, , articleAuthorId, articleAlbumId, articleTitle, articleContent) VALUES(:articleId, :articleAuthorId, :articleAlbumIdr, :articleTitle, articleContent)";
	$statement = $pdo->prepare($query);

	// bind the member variables to the place holders in the template
	$parameters = ["articleId" => $this->articleId->getBytes(), "articleAuthorId" => $this->articleAuthorId->getBytes(), "articleAlbumId" =>$this->articleAlbumId->getBytes(), "articleTitle" => $this->articleTitle, "articleContent" => $this->articleContent];
	$statement->execute($parameters);
}


/**
 * deletes this Article from mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function delete(\PDO $pdo) : void {

	// create query template
	$query = "DELETE FROM articleId WHERE articleId = :articleId";
	$statement = $pdo->prepare($query);

	// bind the member variables to the place holder in the template
	$parameters = ["articleId" => $this->articleId->getBytes()];
	$statement->execute($parameters);
}

/**
 * updates this Article in mySQL
 *
 * @param \PDO $pdo PDO connection object
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError if $pdo is not a PDO connection object
 **/
public function update(\PDO $pdo) : void {

	// create query template
	$query = "UPDATE article SET articleAuthorId = :articleAuthorId, articleTitle = :articleTitle, articleContent = :articleContent WHERE articleId = :articleId";
	$statement = $pdo->prepare($query);

}

/**
 * gets the Article by tweetId
 *
 * @param \PDO $pdo PDO connection object
 * @param Uuid|string $articleId article id to search for
 * @return Article|null Article found or null if not found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when a variable are not the correct data type
 **/
public static function getArticleByArticleId(\PDO $pdo, $ArticleId, $articleId) : ?Article {
	// sanitize the ArticleId before searching
	try {
		$ArticleId = self::validateUuid($ArticleId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}

	// create query template
	$query = "SELECT articleId, articleAuthorId, articleAlbumId, articleTitle, articleContent FROM article WHERE articleId = :articleId";
	$statement = $pdo->prepare($query);

	// bind the article id to the place holder in the template
	$parameters = ["articleId" => $articleId->getBytes()];
	$statement->execute($parameters);

	// grab the article from mySQL
	try {
		$article = null;
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		$row = $statement->fetch();
		if($row !== false) {
			$article = new Article($row["articleId"], $row["articleAuthorId"], $row["articleAlbumId"], $row["articleTitle"], $row["articleContent"]);
		}
	} catch(\Exception $exception) {
		// if the row couldn't be converted, rethrow it
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}
	return($article);
}

/**
 * gets the Article by profile id
 *
 * @param \PDO $pdo PDO connection object
 * @param Uuid|string $articleAuthorId author id to search by
 * @return \SplFixedArray SplFixedArray of Articles found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when variables are not the correct data type
 **/
public static function getArticleByArticleAuthorId(\PDO $pdo, $articleAuthorId) : \SplFixedArray {

	try {
		$articleAuthorId = self::validateUuid($articleAuthorId);
	} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
		throw(new \PDOException($exception->getMessage(), 0, $exception));
	}

	// create query template
	$query = "SELECT articleId, articleAuthorId, articleAlbumId, articleTitle, articleContent FROM article WHERE articleAuthorId = :articleAuthorId";
	$statement = $pdo->prepare($query);
	// bind the article author id to the place holder in the template
	$parameters = ["articleAuthorId" => $articleAuthorId->getBytes()];
	$statement->execute($parameters);
	// build an array of tweets
	$articles = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$articles = new Article($row["articleId"], $row["articleAuthorId"], $row["articleAlbumId"], $row["articleTitle"], $row["articleContent"]);
			$articles[$articles->key()] = $articles;
			$articles->next();
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return($articles);
}

/**
 * gets the Article by content
 *
 * @param \PDO $pdo PDO connection object
 * @param string $articleTitle article title to search for
 * @return \SplFixedArray SplFixedArray of Articles found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when variables are not the correct data type
 **/
public static function getArticleByArticleTitle(\PDO $pdo, string $articleTitle) : \SplFixedArray {
	// sanitize the description before searching
	$articleTitle = trim($articleTitle);
	$articleTitle = filter_var($articleTitle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
	if(empty($articleTitle) === true) {
		throw(new \PDOException("tweet content is invalid"));
	}

	// escape any mySQL wild cards
	$articleTitle = str_replace("_", "\\_", str_replace("%", "\\%", $articleTitle));

	// create query template
	$query = "SELECT articleId, articleAuthorId, articleAlbumId, articleTitle, articleContent FROM article WHERE articleTitle LIKE :articleTitle";
	$statement = $pdo->prepare($query);

	// bind the article title to the place holder in the template
	$articleTitle = "%$articleTitle%";
	$parameters = ["articleTitle" => $articleTitle];
	$statement->execute($parameters);

	// build an array of tweets
	$articles = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$article = new Article($row["articleId"], $row["articleAuthorId"], $row["articleAlbumId"], $row["articleTitle"], $row["articleContent"]);
			$articles[$articles->key()] = $article;
			$articles->next();
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return($articles);
}

/**
 * gets all Articles
 *
 * @param \PDO $pdo PDO connection object
 * @return \SplFixedArray SplFixedArray of Articles found or null if not found
 * @throws \PDOException when mySQL related errors occur
 * @throws \TypeError when variables are not the correct data type
 **/
public static function getAllArticles(\PDO $pdo) : \SPLFixedArray {
	// create query template
	$query = "SELECT articleId, articleAuthorId, artilceAlbumId, articleTitle, articleContent FROM article";
	$statement = $pdo->prepare($query);
	$statement->execute();

	// build an array of articles
	$articles = new \SplFixedArray($statement->rowCount());
	$statement->setFetchMode(\PDO::FETCH_ASSOC);
	while(($row = $statement->fetch()) !== false) {
		try {
			$article = new Article($row["ArticleId"], $row["articleAuthorId"], $row["articleAlbumId"], $row["articleTitle"], $row["articleContent"]);
			$articles[$articles->key()] = $article;
			$articles->next();
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
	}
	return ($articles);
}

/**
 * formats the state variables for JSON serialization
 *
 * @return array resulting state variables to serialize
 **/
public function jsonSerialize() : array {
	$fields = get_object_vars($this);

	$fields["articleId"] = $this->articleId->toString();
	$fields["articleAuthorId"] = $this->articleAuthorId->toString();

	//format the date so that the front end can consume it
	$fields["articleContent"] = round(floatval($this->articleContent->format("U.u")) * 1000);
	return($fields);
	}
}