<link rel="stylesheet" href="style.css">
<?php
require_once 'db.php';
$newsId = $_GET["id"];
$dbNews = $pdo->query('SELECT id, title, content FROM news WHERE id = ' . $newsId);
$news = $dbNews->fetch(); ?>
<div class="border mainTitle">
	<?php echo $news['title']; ?>
</div>
<div class="border">
	<?php echo $news['content']; ?>
</div>
<a class="colorAllNews" href="news.php">Все новости >></a>