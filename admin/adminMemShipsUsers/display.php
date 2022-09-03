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

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['button_searchOrder'])) {
    //che($_GET);
    $search = $_GET['search'];
    if($search !== '') {
        $memberShips = selectAllAnd('ordered_memships', ['id_order' => $search]);
    } else {
        $memberShips = selectAllAnd('ordered_memships');
    }
} else {
    $memberShips = selectAllAnd('ordered_memships');
}

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Купленные абонементы</h1>
                <div class="search-order sidebar">
                    <form class="sidebar-search" action="display.php">
                        <div class="d-flex">
                            <input name="search" value="<?=isset($search) ? $search : ''; ?>" class="form-control me-2" type="search" placeholder="Поиск по id" aria-label="Поиск">
                            <button name="button_searchOrder" class="btn" type="submit">Поиск</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row admin-params">
                <div class="col-1"><strong>Заказ</strong></div>
                <div class="col-5"><strong>Email</strong></div>
                <div class="col-2"><strong>Абонемент</strong></div>
                <div class="col-2"><strong>Осталось</strong></div>
                <div class="col-2"><strong>Действия</strong></div>
            </div>
            <?php foreach($memberShips as $memSh): ?>
                <?php //che($supportMsgs); ?>
                <div class="row admin-string">
                    <div class="col-1"><?=$memSh['id_order']; ?></div>
                    <?php if(mb_strlen($memSh['email']) > 25): ?>
                        <div class="col-5"><?=mb_substr($memSh['email'], 0, 25, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-5"><?=$memSh['email']; ?></div>
                    <?php endif; ?>
                    <div class="col-2"><?=$memSh['id_memsh']; ?></div>
                    <div class="col-2"><?=$memSh['remains']; ?></div>
                    <div class="col-2 look"><a href="display.php?reduce_id=<?=$memSh['id_order']?>">Отметить</a></div>
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


