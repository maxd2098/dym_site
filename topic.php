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
include SITE_ROOT . "/app/controllers/forum.php";

?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <!--TOPIC start-->
    <div class="row main-content">
        
        <div class="topic-describe col-lg-9 col-12">
            <h2 class="name-trainer">
                <?=$topic['title']; ?>
            </h2>
            <div class="d-flex justify-content-between author-topic">
                <h5 class="">Автор темы: <?=$author['name'] . ' ' . $author['surname']; ?></h5>
                <?php if(isset($_SESSION['email']) && isset($_SESSION['status']) && ($_SESSION['email'] == $topic['email'] || $_SESSION['status'] == 2 || $_SESSION['status'] == 3)): ?>
                    <form action="topic.php" method="post">
                        <input class="invisible" name="id_topic" value="<?=$topic['id_topic']; ?>" type="text">
                        <button name="button_deleteTopic" type="submit" class="btn btn-danger">Удалить эту тему</button>
                    </form>
                <?php endif; ?>
                
            </div>
            <?php if($author['status'] == 0): ?>
                <h5 class="author-topic">Статус создателя: клиент</h5>
            <?php elseif($author['status'] == 1): ?>
                <h5 class="author-topic">Статус создателя: тренер</h5>
            <?php elseif($author['status'] == 2 || $author['status'] == 3): ?>
                <h5 class="author-topic">Статус создателя: админ</h5>
            <?php endif; ?>
            
            <div class="card">
                <div class="card-body">
                    <p class="card-comment"><?=$topic['comment']; ?></p>
                    <div class="row">
                        <div class="param col-6">Автор: <?=$author['name'] . ' ' . $author['surname']; ?></div>
                        <div class="param col-6">Опубликован: <?=$topic['created_date']; ?></div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <!--TOPIC end-->
        
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


