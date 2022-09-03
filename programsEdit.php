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
include SITE_ROOT . "/pages/banUnaut.php";
include SITE_ROOT . "/pages/banClient.php";
include SITE_ROOT . "/app/controllers/programs.php";

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    <!--PROGRAMS CARDS start-->
    <div class="row main-content">
        
        <div class="program-cards col-lg-9 col-12">
            <div class="d-flex justify-content-between">
                <h2 class="main-trainers">
                    Мои программы тренировок
                </h2>
                <?php if(isset($_SESSION['status']) && $_SESSION['status'] == 1): ?>
                    <div class="button-program-add">
                        <a href="<?=BASE_URL . 'createProgram.php'?>">
                            <button type="button" class="btn btn-danger">Добавить новую программу</button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            
            <?php foreach($programsTrainer as $program): ?>
                <div class="card col-12">
                    <a href="<?=BASE_URL . 'programEdit.php?id_program=' . $program['id_program']; ?>">
                        <div class="row g-0">
                            <div class="img-div col-lg-4">
                                <div class="img-div">
                                    <img src="<?=BASE_URL . '/assets/imageToServer/' . $program['img']; ?>" class="img-fluid" alt="Загрузите фотографию">
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h3 class="card-title"><?=$program['title']; ?></h3>
                                    <div class="card-author">Автор: <?=$program['name'] . ' ' . $program['surname']; ?></div>
                                    <div class="row">
                                        <div class="card-date col-6">Опубликован: <?=$program['created_date']; ?></div>
                                        <?php if($program['change_date'] != ''): ?>
                                            <div class="card-date-change col-6">Изменен: <?=$program['change_date']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                    <p class="card-text"><?=mb_substr($program['text'], 0, 200, $encoding='utf8') . '...'; ?></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        
        </div>
        <!--PROGRAMS CARDS start-->
        
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

