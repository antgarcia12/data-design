ALTER DATABASE agarcia707 CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS review;
DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS author;
DROP TABLE IF EXISTS album;

CREATE TABLE album (
	albumId BINARY(32) NOT NULL,
	albumGenre VARCHAR(16),
	albumName VARCHAR(32)

	PRIMARY KEY(albumId)
);

CREATE TABLE author (
	authorId BINARY(32) NOT NULL,
	authorEmail VARCHAR(256) NOT NULL,
	authorHash CHAR(97) NOT NULL,
	authorName VARCHAR(65) NOT NULL,
	authorTitle VARCHAR(256) NOT NULL,

	UNIQUE (authorEmail),

	PRIMARY KEY(authorId)
);

CREATE TABLE article (
	articleAlbumId VARCHAR(256) NOT NULL,
	articleAuthorId VARCHAR(256) NOT NULL,
	articleContent VARCHAR(150),
	articleContentId BINARY(32) NOT NULL,
	articleTitle VARCHAR(256) NOT NULL,

	INDEX(articleAlbumId)
	INDEX(articleAuthorId)

	FOREIGN KEY(articleAlbumId) REFERENCES album(albumId),
	FOREIGN KEY(articleAuthorId) REFERENCES author(authorId)

	PRIMARY KEY(articleAlbumId, articleAuthorId)
);

CREATE TABLE review (
	reviewAlbumId VARCHAR(256) NOT NULL,
	reviewAuthorId VARCHAR(256) NOT NULL,
	reviewContent VARCHAR(150) NOT NULL,
	reviewDate DATETIME(6) NOT NULL,
	reviewId VARCHAR(256) NOT NULL,
	reviewTtitle VARCHAR(256) NOT NULL,

	INDEX(reviewAlbumId)
	INDEX(reviewAuthorId)

	FOREIGN KEY(reviewAlbumId) REFERENCES album(albumId),
	FOREIGN KEY(reviewAuthorId) REFERENCES author(authorId)

	PRIMARY KEY(reviewAlbumId, reviewAuthorId)
);

