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
include SITE_ROOT . '/app/controllers/search.php';

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content">
        
        <div class="trainers-cards forum-content program-cards col-lg-9 col-12">
            <h2 class="main-trainers">
                Результаты поиска
                <?php
                
                if($category == 'trainers') echo "ПО ТРЕНЕРАМ";
                elseif($category == 'programs') echo "ПО ПРОГРАММАМ";
                else echo "ПО ФОРУМУ";
                
                ?>
            </h2>
            
            <?php if($category == 'trainers'): ?>
            
                <?php foreach($result as $trainer): ?>
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
            
            <?php elseif($category == 'programs'): ?>
                <?php foreach($result as $program): ?>
                    <?php if($program['publish'] == 1): ?>
                        <div class="card col-12">
                            <a href="<?=BASE_URL . 'program.php?id_program=' . $program['id_program']; ?>">
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
                                                <div class="card-date col-5">Опубликован: <?=$program['created_date']; ?></div>
                                                <?php if($program['change_date'] != ''): ?>
                                                    <div class="card-date-change col-5">Изменен: <?=$program['change_date']; ?></div>
                                                <?php endif; ?>
                                            </div>
                                            <p class="card-text"><?=mb_substr($program['text'], 0, 200, $encoding='utf8') . '...'; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            
            <?php else: ?>
                <?php foreach($result as $topic): ?>
                    <a href="<?=BASE_URL . 'topic.php?id_topic=' . $topic['id_topic'] . '&email=' . $topic['email']; ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="row flex-forum">
                                    <?php if(mb_strlen($topic['title']) > 70): ?>
                                        <h5 class="card-title col-8"><?=mb_substr($topic['title'], 0, 70, $encoding='utf-8') . '...'; ?></h5>
                                    <?php else: ?>
                                        <h5 class="card-title col-8"><?=$topic['title']; ?></h5>
                                    <?php endif; ?>
                                    <div class="last-date col-4">Последнее сообщение: <?=$topic['last_date']; ?></div>
                                </div>
                                <div class="author">
                                    <div class="create-date">Дата создания: <?=$topic['created_date']; ?></div>
                                </div>
                                <?php if(mb_strlen($topic['comment']) > 70): ?>
                                    <p class="card-comment"><?=mb_substr($topic['comment'], 0, 70, $encoding='utf-8') . '...'; ?></p>
                                <?php else: ?>
                                    <p class="card-comment"><?=$topic['comment']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
            
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>
