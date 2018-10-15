INSERT INTO author(authorId, authorEmail, authorHash, authorName, authorTitle) VALUES (UNHEX("3edcfa2e-8242-4392-a35f-3b5b6bb93e4a", "jonah.bromwich@gmail.com", "789456", "Jonah Bromwich", "Kaytranada 99.9%");

INSERT INTO author(authorId, authorEmail, authorHash, authorName, authorTitle) VALUES (UNHEX("9f3c8bdf-1804-42b7-b7db-28d94346f05b", "passionweiss@gmail.com", "456123", "Jeff Weiss", "Nas Illmatic");

INSERT INTO author(authorId, authorEmail, authorHash, authorName, authorTitle) VALUES (UNHEX("6424dcf3-9ce4-4a50-9ec9-d21765fca361", "sheldon@pitchfork.com", "852963", "Sheldon Pearce", "The Internet Hive Mind");

UPDATE author SET authorTitle = 'Chance The Rapper Acid Rap' WHERE authorTitle = 'Nas Illmatic';

DELETE from author WHERE authorId = UNHEX("3edcfa2e-8242-4392-a35f-3b5b6bb93e4a");

INSERT INTO article(articleId, articleAlbumId, articleAuthorId, articleContent, articleTitle) VALUES (UNHEX("93e166d8-bb09-4c41-be67-d9521894da9b", UNHEX("d074648b-dd6d-4b3d-9075-e6364d6fd31c"), UNHEX("3edcfa2e-8242-4392-a35f-3b5b6bb93e4a"), "news article about jonah hill", "What Jonah Hill Is Listening To Right Now");

SELECT authorId, authorEmail, authorHash, authorName, authorTitle WHERE authorId = uuid;

SELECT author.authorId, author.authorEmail, author.authorHash, author.authorName, author.authorTitle, article.articleId FROM article innerjoin author ON author.authorId = article.articleId
WHERE authorId = uuid;