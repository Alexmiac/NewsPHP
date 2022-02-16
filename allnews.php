<?php
require_once 'db.php';
?>
<div class="border">
    <span class="mainTitle">Новости</span>
</div>
<section class="listNews border">
    <?php    //показ 5 новостей
    if (!$_GET) {
        $_GET["page"] = 1;
    }
    $offset = ($_GET["page"] - 1) * 5;
    $news5 = $pdo->query('SELECT id, idate, title, announce FROM news ORDER BY idate DESC LIMIT 5 OFFSET ' . $offset);
    $news5 = $news5->fetchAll();

    foreach ($news5 as $item) {  ?>
        <div class="news1">
            <div class="data">
                <?php echo date('d.m.Y', $item['idate']); ?>
            </div>
            <div class="title">
                <a href="view.php?id=<?php echo $item['id']; ?>">
                    <?php echo $item['title']; ?>
                </a>
            </div>
        </div>
        <div class="announce">
            <?php echo $item['announce']; ?>
        </div>
    <?php } ?>
</section>

<?php
$stmtId = $pdo->query('SELECT COUNT(id) FROM news');
$row = $stmtId->fetch();
$total = $row['COUNT(id)']; // всего записей
?>
<span class="text">Страницы:</span>
<div class="footer">
    <?php
    $numPage = 0;
    $countPage = $total / 5;
    while ($countPage > 0) {
        $numPage++; ?>
        <div class="number<?php if ($_GET['page'] == $numPage) { ?> active<?php } ?>">
            <a class="numPages<?php if ($_GET['page'] == $numPage) { ?> active<?php } ?>" href="news.php?page=<?php echo $numPage;  ?>">
                <?php echo $numPage;  ?>
            </a>
        </div>
    <?php $countPage--;
    } ?>