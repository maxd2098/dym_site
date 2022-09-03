<?php

    include "path.php";

//phpinfo();
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
include SITE_ROOT . '/app/controllers/adminCarousel.php';
include SITE_ROOT . "/pages/addYear.php";
$trainers = selectTrainersToGeneralPage('users', ['status' => 1]);
//che($trainers);

?>
<!--HEADER end-->


<!--MAIN start-->

<!--CAROUSEL start-->
<div class="container">
    <h2 class="title-carousel">
        Тренажерка
    </h2>
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach($slides as $slide): ?>
                <?php static $checkActive = 0; ?>
                <?php if ($checkActive == 0): ?>
                    <div class="carousel-item active">
                <?php $checkActive++; ?>
                <?php else: ?>
                    <div class="carousel-item">
                <?php endif; ?>
                        <img src="<?=BASE_URL . '/assets/imageToServer/' . $slide['img']; ?>" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block">
                            <p><?=$slide['title']; ?></p>
                        </div>
                    </div>
            <?php endforeach; ?>
            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Следующий</span>
        </button>
    </div>
</div>
<!--CAROUSEL end-->


<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content">
        <h2 class="main-trainers">
            Наши лучшие тренера
        </h2>
        <div class="train-cards col-lg-9 col-12">
            <div class="row row-cols-1 row-cols-lg-2 g-4">
                
                <?php foreach($trainers as $trainer): ?>
                <div class="col">
                    <a href="<?php echo BASE_URL . 'train.php?id_trainer=' . $trainer['id']; ?>">
                        <div class="card h-100">
                            <div class="img-div">
                                <img src="<?=BASE_URL . '/assets/imageToServer/' . $trainer['img']; ?>" class="img-fluid" alt="Загрузите фотографию">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?=$trainer['name'] . ' ' . $trainer['surname']; ?></h5>
                                <div class="row years-trainers">
                                    <div class="age col-6">Возраст: <?=$trainer['age'] . addYearAll($trainer, 'age'); ?></div>
                                    <div class="age col-6">Стаж: <?=$trainer['experience'] . addYearAll($trainer, 'experience'); ?></div>
                                </div>
                                <?php if(mb_strlen($trainer['info']) > 150): ?>
                                    <div class="card-text">О себе: <?=mb_substr($trainer['info'], 0, 150, $encoding="utf-8") . '...'; ?></div>
                                <?php else: ?>
                                    <div class="card-text">О себе: <?=$trainer['info']; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
                
            </div>
        </div>
        <!--TRAINERS CARDS end-->
        
        
        <!--SIDEBAR start-->
        <?php include SITE_ROOT . "/pages/sidebar.php"; ?>
        <!--SIDEBAR end-->

    </div>
</div>
<!--MAIN end-->

<!--FOOTER start-->
<?php include "pages/footer.php"; ?>
<!--FOOTER end-->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>