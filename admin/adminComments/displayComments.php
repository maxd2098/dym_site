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
include SITE_ROOT . '/app/controllers/adminComments.php';

//che($comments);

function pagination($table) {
    global $page;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 5;
    $offset = $limit * ($page - 1);
    global $countPage;
    $countPage = countTable($table);
    $countPage = ceil($countPage['count'] / $limit);
    //che($countPage);
    return selectAllForPage($table, $limit, $offset);
}

$page = 1;
$countPage = 1;

if (isset($_GET['program'])) {
    $comments = pagination('comments_program');
    $getTable = 'program';
} elseif (isset($_GET['train'])) {
    $comments = pagination('comments_trainer');
    $getTable = 'train';
} else {
    $comments = pagination('comments_topic');
    $getTable = 'forum';
}

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <?php if($getTable == 'program') echo '<h1>Комментарии к программам</h1>'; ?>
            <?php if($getTable == 'train') echo '<h1>Комментарии к тренерам</h1>'; ?>
            <?php if($getTable == 'forum') echo '<h1>Комментарии к форуму</h1>'; ?>
            <div class="row admin-params">
                <div class="col-1"><strong>ID</strong></div>
                <div class="col-2"><strong>ID раздела</strong></div>
                <div class="col-2"><strong>Автор</strong></div>
                <div class="col-5"><strong>Комментарий</strong></div>
                <div class="col-2"><strong>Действия</strong></div>
            </div>
            <?php foreach($comments as $comment): ?>
                <?php //che($supportMsgs); ?>
                <div class="row admin-string">
                    <div class="col-1"><?=$comment['id']; ?></div>
                    <?php if($getTable == 'program'): ?>
                        <div class="col-2"><?=$comment['id_program']; ?></div>
                    <?php elseif($getTable == 'train'): ?>
                        <div class="col-2"><?=$comment['id_trainer']; ?></div>
                    <?php else: ?>
                        <div class="col-2"><?=$comment['id_topic']; ?></div>
                    <?php endif; ?>
                    
                    <?php if(mb_strlen($comment['email']) > 10): ?>
                        <div class="col-2"><?=mb_substr($comment['email'], 0, 10, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-2"><?=$comment['email']; ?></div>
                    <?php endif; ?>
                    
                    <?php if(mb_strlen($comment['comment']) > 30): ?>
                        <div class="col-5"><?=mb_substr($comment['comment'], 0, 30, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-5"><?=$comment['comment']; ?></div>
                    <?php endif; ?>
                    
                    <div class="col-1 look"><a href="edit.php?edit_id=<?=$comment['id'] . '&' . $getTable; ?>">Edit</a></div>
                    <div class="col-1 delete"><a href="display.php?delete_id=<?=$comment['id'] . '&' . $getTable; ?>">Delete</a></div>
                </div>
            <?php endforeach; ?>
            
            <!--PAGINATION start-->
            <?php include SITE_ROOT . "/pages/paginationCommentsAdmin.php"; ?>
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


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>



