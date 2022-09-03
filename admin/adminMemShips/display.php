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
include SITE_ROOT . '/app/controllers/adminMemShips.php';
$memberShips = selectAllAnd('member_ships');

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <div class="d-flex justify-content-between">
                <h1>Абонементы</h1>
                <div class="button-program-add">
                    <a href="<?=BASE_URL . 'admin/adminMemShips/create.php'?>">
                        <button type="button" class="btn btn-danger">Добавить абонемент</button>
                    </a>
                </div>
            </div>
            <div class="row admin-params">
                <div class="col-1"><strong>ID</strong></div>
                <div class="col-1"><strong>Тип</strong></div>
                <div class="col-3"><strong>Цена</strong></div>
                <div class="col-2"><strong>Число</strong></div>
                <div class="col-3"><strong>Действия</strong></div>
            </div>
            <?php foreach($memberShips as $memSh): ?>
                <?php //che($supportMsgs); ?>
                <div class="row admin-string">
                    <div class="col-1"><?=$memSh['id_memsh']; ?></div>
                    <div class="col-1"><?=$memSh['type']; ?></div>
                    <div class="col-3"><?=$memSh['price']; ?></div>
                    <div class="col-2"><?=$memSh['count']; ?></div>
                    <div class="col-2 look"><a href="edit.php?edit_id=<?=$memSh['id_memsh']?>">Edit</a></div>
                    <div class="col-1 delete"><a href="edit.php?delete_id=<?=$memSh['id_memsh']?>">Delete</a></div>
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

