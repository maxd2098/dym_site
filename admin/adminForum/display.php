<?php

include "../../path.php";

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Тренажерка</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="<?=BASE_URL . 'assets/css/style.css'?>">
    <script src="https://kit.fontawesome.com/90241b67b0.js" crossorigin="anonymous"></script>
</head>
<body>

<!--HEADER start-->
<?php

include SITE_ROOT . "/pages/header.php";
include SITE_ROOT . "/pages/banAdmin.php";
include SITE_ROOT . '/app/controllers/adminForum.php';

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 2;
$offset = $limit * ($page - 1);
$countPage = countTable('forum');
$countPage = ceil($countPage['count'] / $limit);
//che($countPage);

$topics = selectAllForPage('forum', $limit, $offset);

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <h1>Форум</h1>
            <div class="row admin-params">
                <div class="col-1"><strong>ID</strong></div>
                <div class="col-3"><strong>Автор</strong></div>
                <div class="col-5"><strong>Заголовок</strong></div>
                <div class="col-2"><strong>Действия</strong></div>
            </div>
            <?php foreach($topics as $topic): ?>
                <?php //che($supportMsgs); ?>
                <div class="row admin-string">
                    <div class="col-1"><?=$topic['id_topic']; ?></div>
                    <?php if(mb_strlen($topic['email']) > 15): ?>
                        <div class="col-3"><?=mb_substr($topic['email'], 0, 15, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-3"><?=$topic['email']; ?></div>
                    <?php endif; ?>
            
                    <?php if(mb_strlen($topic['title']) > 30): ?>
                        <div class="col-5"><?=mb_substr($topic['title'], 0, 30, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-5"><?=$topic['title']; ?></div>
                    <?php endif; ?>
                    <div class="col-1 look"><a href="edit.php?edit_id=<?=$topic['id_topic']?>">Edit</a></div>
                    <div class="col-1 delete"><a href="display.php?delete_id=<?=$topic['id_topic']?>">Delete</a></div>
                </div>
            <?php endforeach; ?>

            <!--PAGINATION start-->
            <?php include SITE_ROOT . "/pages/pagination.php"; ?>
            <!--PAGINATION end-->
            
        </div>
        <!--ADMIN CONTENT end-->
        
        <!--SIDEBAR start-->
        <?php include SITE_ROOT . "/pages/sidebarAdmin.php"; ?>
        <!--SIDEBAR end-->
    
    </div>
</div>
<!--MAIN end-->

<!--FOOTER start-->
<?php include SITE_ROOT . "/pages/footer.php"; ?>
<!--FOOTER end-->




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>


