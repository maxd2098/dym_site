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
include SITE_ROOT . '/app/controllers/adminSupportMsg.php';

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <h1>Сообщения пользователей в тех. поддержку</h1>
            <div class="row admin-params">
                <div class="col-1"><strong>ID</strong></div>
                <div class="col-2 col-xl-1 unimportant"><strong>Статус</strong></div>
                <div class="col-6 col-lg-3"><strong>Автор</strong></div>
                <div class="col-4 xl-unimportant"><strong>Кратко</strong></div>
                <div class="col-4 col-lg-2"><strong>Действия</strong></div>
            </div>
            <?php foreach($supportMsgs as $msg): ?>
                <?php //che($supportMsgs); ?>
                <div class="row admin-string">
                    <div class="col-1"><?=$msg['id']; ?></div>
                    <div class="col-2 col-xl-1 unimportant"><?=$msg['status']; ?></div>
                    <?php if(mb_strlen($msg['email']) > 15): ?>
                        <div class="col-6 col-lg-3 admin-word-wrap"><?=mb_substr($msg['email'], 0, 15, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-6 col-lg-3 admin-word-wrap"><?=$msg['email']; ?></div>
                    <?php endif; ?>
            
                    <?php if(mb_strlen($msg['message']) > 20): ?>
                        <div class="col-4 xl-unimportant"><?=mb_substr($msg['message'], 0, 20, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-4 xl-unimportant"><?=$msg['message']; ?></div>
                    <?php endif; ?>
                    <div class="col-3 col-lg-2 look"><a href="edit.php?look_id=<?=$msg['id']?>">Смотреть</a></div>
                    <div class="col-2 col-lg-1 delete"><a href="edit.php?delete_id=<?=$msg['id']?>">Delete</a></div>
                </div>
            <?php endforeach; ?>
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


