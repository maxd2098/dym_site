<?php

include "../../path.php";
include SITE_ROOT . '/app/controllers/adminUsers.php';

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
<?php include SITE_ROOT . "/pages/header.php"; ?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <h2>Пользователи</h2>
            <div class="row admin-params">
                <div class="col-1"><strong>ID</strong></div>
                <div class="col-2"><strong>Статус</strong></div>
                <div class="col-5"><strong>Email</strong></div>
                <div class="col-2"><strong>Редактировать</strong></div>
                <div class="col-2"><strong>Удалить</strong></div>
            </div>
                <?php foreach($users as $user): ?>
                    <div class="row admin-string">
                        <div class="col-1"><?=$user['id']; ?></div>
                        <div class="col-2"><?=$user['status']; ?></div>
                        <?php if(mb_strlen($user['email']) > 30): ?>
                            <div class="col-5"><?=mb_substr($user['email'], 0, 30, $encoding='utf8'); ?>...</div>
                        <?php else: ?>
                            <div class="col-5"><?=$user['email']; ?></div>
                        <?php endif; ?>
                        <?php if($user['status'] == 0 || $user['status'] == 1): ?>
                            <div class="col-2 edit"><a href="edit.php?edit_id=<?=$user['id']?>">Edit</a></div>
                            <div class="col-2 delete"><a href="edit.php?delete_id=<?=$user['id']?>">Delete</a></div>
                        <?php elseif($user['status'] == 2 && $_SESSION['status'] == 3): ?>
                            <div class="col-2 edit"><a href="edit.php?edit_id=<?=$user['id']?>">Edit</a></div>
                            <div class="col-2 delete"><a href="edit.php?delete_id=<?=$user['id']?>">Delete</a></div>
                        <?php elseif($user['status'] == 3 && $_SESSION['status'] == 3): ?>
                            <div class="col-2 edit"><a href="edit.php?edit_id=<?=$user['id']?>">Edit</a></div>
                            <div class="col-2 delete">Delete</div>
                        <?php elseif($user['status'] == 2 && $_SESSION['status'] == 2): ?>
                            <div class="col-2 edit">NoEdit</div>
                            <div class="col-2 delete">Delete</div>
                        <?php endif; ?>
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>


