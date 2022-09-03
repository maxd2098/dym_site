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
    $search = $_GET['search'];
    if($search !== '') {
        $orderReduction = selectAllAndOrderByDescCreatedDate('order_reduction', ['email' => $search]);
    } else {
        $orderReduction = selectAllAndOrderByDescCreatedDate('order_reduction');
    }
} else {
    $orderReduction = selectAllAndOrderByDescCreatedDate('order_reduction');
}


?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="col-7">Отметки при уменьшении числа оставшихся тренировок</h1>
                <div class="search-order sidebar col-5">
                    <form class="sidebar-search" action="display.php">
                        <div class="d-flex">
                            <input name="search" value="<?=isset($search) ? $search : ''; ?>" class="form-control me-2" type="search" placeholder="Поиск по email" aria-label="Поиск">
                            <button name="button_searchOrder" class="btn" type="submit">Поиск</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row admin-params">
                <div class="col-1"><strong>ID</strong></div>
                <div class="col-1"><strong>Заказ</strong></div>
                <div class="col-2"><strong>Осталось</strong></div>
                <div class="col-3"><strong>Отметил</strong></div>
                <div class="col-3"><strong>Дата</strong></div>
                <?php if($_SESSION['status'] == 3): ?>
                    <div class="col-2"><strong>Удалить</strong></div>
                <?php endif; ?>
            </div>
            <?php foreach($orderReduction as $order): ?>
                <?php //che($supportMsgs); ?>
                <div class="row admin-string">
                    <div class="col-1"><?=$order['id_reduct']; ?></div>
                    <div class="col-1"><?=$order['id_order']; ?></div>
                    
                    <div class="col-2"><?=$order['remains']; ?></div>
                    
                    <?php if(mb_strlen($order['email']) > 15): ?>
                        <div class="col-3"><?=mb_substr($order['email'], 0, 15, $encoding='utf8'); ?>...</div>
                    <?php else: ?>
                        <div class="col-3"><?=$order['email']; ?></div>
                    <?php endif; ?>
                    <div class="col-3"><?=$order['created_date']; ?></div>
                    
                    <?php if($_SESSION['status'] == 3): ?>
                        <div class="col-2 delete"><a href="display.php?delete_reduct_id=<?=$order['id_reduct']?>">Delete</a></div>
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


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>



