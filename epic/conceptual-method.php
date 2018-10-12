<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Conceptual Methods</title>
	</head>
	<body>
		<h2>Entities & Attributes</h2>
		<h3>Album:</h3>
			<ul>
				<li>albumId</li>
				<li>albumName</li>
				<li>albumGenre</li>
			</ul>
		<h3>Author:</h3>
			<ul>
				<li>authorId (Primary Key)</li>
				<li>authorEmail</li>
				<li>authorHash</li>
				<li>authorName</li>
				<li>authorTitle</li>
			</ul>
		<h3>Article:</h3>
				<ul>
					<li>articleId</li>
					<li>articleAuthorId (Foreign key)</li>
					<li>articleContent</li>
					<li>articleTitle</li>
					<li>articleAlbumId</li>
				</ul>
		<h3>Review</h3>
				<ul>
					<li>reviewId</li>
					<li>reviewAuthorId (Foreign Key)</li>
					<li>reviewContent</li>
					<li>reviewTitle</li>
					<li>reviewTime</li>
					<li>reviewAlbumId</li>
				</ul>
		<h3>Relations:</h3>
				<ul>
					<li>Authors can write multiple articles and reviews.</li>
					<li>Albums can have multiple articles and reviews.</li>
				</ul>
		<img src="./revised-erd.png" alt="Revised Data Design ERD">
		<br>
		<a href="use-case.php"><strong>USER CASE/STORY</strong></a>
		<br>
		<a href="index.php"><strong>BEGINNING</strong></a>
	</body>
</html>