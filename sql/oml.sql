INSERT INTO author(authorId, authorEmail, authorHash, authorName, authorTitle) VALUES (UNHEX("3edcfa2e82424392a35f3b5b6bb93e4a"), "jonah.bromwich@gmail.com", "789456", "Jonah Bromwich", "Kaytranada 99.9%");

INSERT INTO author(authorId, authorEmail, authorHash, authorName, authorTitle) VALUES (UNHEX("9f3c8bdf180442b7b7db28d94346f05b"), "passionweiss@gmail.com", "456123", "Jeff Weiss", "Nas Illmatic");

INSERT INTO author(authorId, authorEmail, authorHash, authorName, authorTitle) VALUES (UNHEX("6424dcf39ce44a509ec9d21765fca361"), "sheldon@pitchfork.com", "852963", "Sheldon Pearce", "The Internet Hive Mind");

UPDATE author SET authorTitle = 'Chance The Rapper Acid Rap' WHERE authorTitle = 'Nas Illmatic';

DELETE from author WHERE authorId = UNHEX("3edcfa2e82424392a35f3b5b6bb93e4a");

INSERT INTO album(albumId) VALUE (UNHEX(d074648bdd6d4b3d9075e6364d6fd31c));

INSERT INTO article(articleId, articleAlbumId, articleAuthorId, articleContent, articleTitle) VALUES (UNHEX("124c3f9b35da42179f8467180b268ea2"), UNHEX("d074648bdd6d4b3d9075e6364d6fd31c"), UNHEX("3edcfa2e82424392a35f3b5b6bb93e4a"), "news article about jonah hill", "What Jonah Hill Is Listening To Right Now");

SELECT authorId, authorEmail, authorHash, authorName, authorTitle FROM author WHERE authorId = UNHEX("9f3c8bdf180442b7b7db28d94346f05b");

SELECT author.authorId, author.authorEmail, author.authorHash, author.authorName, author.authorTitle, article.articleId FROM author INNER JOIN article ON author.authorId = article.articleId WHERE authorId = UNHEX("9f3c8bdf180442b7b7db28d94346f05b");



/*SELECT likeProfileId, likeTweetId, likeDate FROM like WHERE likeProfileId =