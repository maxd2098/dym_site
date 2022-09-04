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

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$offset = $limit * ($page - 1);
$countPage = countTable('forum');
$countPage = ceil($countPage['count'] / $limit);
//che($countPage);

$topics = selectAllForPage('forum', $limit, $offset);

?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <!--FORUM start-->
    <div class="row main-content">
        
        <div class="forum-content col-lg-9 col-12">
            <div class="d-flex justify-content-between">
                <h2 class="main-trainers">
                    Форум
                </h2>
                <div class="col-4"></div>
                <div class="button-program-add">
                    <?php if(isset($_SESSION['email'])): ?>
                        <a href="<?=BASE_URL . 'createTopic.php'?>">
                            <button type="button" class="btn btn-danger">Создать тему обсуждений</button>
                        </a>
                    <?php else: ?>
                        <div class="text">Зарегистрируйтесь, если хотите начать обсуждение</div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="forum-cards">
                
                <!--PAGINATION start-->
                <?php include SITE_ROOT . "/pages/pagination.php"; ?>
                <!--PAGINATION end-->
                
                <?php foreach($topics as $topic): ?>
                
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

                <!--PAGINATION start-->
                <?php include SITE_ROOT . "/pages/pagination.php"; ?>
                <!--PAGINATION end-->
                
            </div>
            
            
        </div>
        <!--FORUM end-->
        
        
        <!--SIDEBAR start-->
        <?php include "pages/sidebar.php"; ?>
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
