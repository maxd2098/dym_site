<?php

include "path.php";

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
include SITE_ROOT . "/pages/addYear.php";
//$trainers = selectAllAnd('users', ['status' => 1]);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 2;
$offset = $limit * ($page - 1);
$countPage = countTable('users', ['status' => 1]);
$countPage = ceil($countPage['count'] / $limit);
//che($countPage);

$trainers = selectAllForPage('users', $limit, $offset, ['status' => 1]);

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content">
        
        <div class="trainers-cards col-lg-9 col-12">
            <h2 class="main-trainers">
                Наши тренеры
            </h2>
            
            <?php foreach($trainers as $trainer): ?>
                <div class="card col-12">
                    <a href="<?=BASE_URL . 'train.php?id_trainer=' . $trainer['id']; ?>">
                        <div class="row g-0">
                            <div class="img-div col-lg-4">
                                <img src="<?=BASE_URL . '/assets/imageToServer/' . $trainer['img']; ?>" class="img-fluid" alt="Загрузите фотографию">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h3 class="card-title"><?=$trainer['name'] . ' ' . $trainer['surname']; ?></h3>
                                    <div class="year card-author">Возраст: <?=$trainer['age'] . addYearAll($trainer, 'age'); ?></div>
                                    <div class="year card-date">Стаж: <?=$trainer['experience'] . addYearAll($trainer, 'experience'); ?></div>
                                    <?php if(mb_strlen($trainer['info']) > 200): ?>
                                        <p class="card-text">О себе: <?=mb_substr($trainer['info'], 0, 200, $encoding="utf-8") . '...'; ?></p>
                                    <?php else: ?>
                                        <p class="card-text">О себе: <?=$trainer['info']; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            
            <!--PAGINATION start-->
            <?php include SITE_ROOT . "/pages/pagination.php"; ?>
            <!--PAGINATION end-->
    
        </div>
        <!--TRAINERS CARDS end-->
        
        
        <!--SIDEBAR start-->
        <?php include SITE_ROOT . "/pages/sidebar.php"; ?>
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
