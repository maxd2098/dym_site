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
include SITE_ROOT . "/app/controllers/comments.php";
$comments = selectAllComments('comments_topic', ['id_topic' => $_GET['id_topic']]);

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

            <h2>Комментарии</h2>

            <div class="comments-block">
                <?php if(isset($_SESSION['email'])): ?>
                    <form class="support-form" method="post" action="topic.php">
                        <input name="id_topic" value="<?=$_GET['id_topic']; ?>" type="text" class="invisible">
                        <input name="email_topic" value="<?=$_GET['email']; ?>" type="text" class="invisible">
                        <div class="w-100"></div>
                        <div class="mb-3 col-12 col-lg-8">
                            <label class="form-label">Ваш email</label>
                            <input name="email" value="<?=$_SESSION['email']; ?>" type="email" class="form-control" placeholder="Ваш адрес" readonly>
                        </div>
                        <div class="w-100"></div>
                        <div class="mb-3 col-12 col-lg-8">
                            <label class="form-label">Оставить комментарий (max: 2000 символов)*</label>
                            <textarea name="comment" class="form-control" rows="5" maxlength="2000"></textarea>
                        </div>
                        <div class="w-100"></div>
                        <div class="button-support col-auto">
                            <button name="button_commentTopicCreate" type="submit" class="btn btn-danger">Отправить</button>
                        </div>
                    </form>
                <?php else: ?>
                    <h5>Только зарегистрированные пользователи могут оставлять комментарии.</h5>
                <?php endif; ?>
            </div>

            <div class="comments-block">
                <div class="card-body">
                    <div class="card-inline-top d-flex justify-content-between col-12 col-xl-6 col-lg-8">
                        <div class="card-italic"><?=$author['name'] . ' ' . $author['surname']; ?></div>
                        <?php if($author['status'] == 0): ?>
                            <div class="card-italic">Клиент</div>
                        <?php elseif($author['status'] == 1): ?>
                            <div class="card-italic">Тренер</div>
                        <?php elseif($author['status'] == 2): ?>
                            <div class="card-italic">Админинстратор</div>
                        <?php else: ?>
                            <div class="card-italic">Владелец сайта</div>
                        <?php endif; ?>
                        <div class="card-italic"><?=$topic['created_date']; ?></div>
                    </div>
                    <p class="card-comment"><?=$topic['comment']; ?></p>
                </div>
            </div>
    
            <?php foreach($comments as $comment): ?>

                <div class="comments-block">
                    <div class="col-12">
                        <div class="row g-0">
                            <div class="card-body">
                                <div class="card-inline-top d-flex justify-content-between col-12 col-xl-6 col-lg-8">
                                    <div class="card-italic"><?=$comment['name'] . ' ' . $comment['surname']; ?></div>
                            
                                    <?php if($comment['status'] == 0): ?>
                                        <div class="card-italic">Клиент</div>
                                    <?php elseif($comment['status'] == 1): ?>
                                        <div class="card-italic">Тренер</div>
                                    <?php elseif($comment['status'] == 2): ?>
                                        <div class="card-italic">Админинстратор</div>
                                    <?php else: ?>
                                        <div class="card-italic">Владелец сайта</div>
                                    <?php endif; ?>

                                    <div class="card-italic"> <?=$comment['created_date']; ?></div>
                                </div>
                                <p class="card-text"><?=$comment['comment']; ?></p>
                                <div class="card-inline-bottom d-flex justify-content-between col-8 col-xl-3 col-lg-4 col-md-5">
                                    <?php if(isset($_SESSION['email']) && isset($_SESSION['status'])): ?>
                                        <a class="a" href="">Ответить</a>
                                
                                        <?php if($_SESSION['status'] == 2 || $_SESSION['status'] == 3 || $_SESSION['email'] == $comment['email']): ?>
                                            <a class="a" href="topic.php?id_topic=<?=$comment['id_topic'] . '&email=' . $topic['email'];?>&delete_topic_id=<?=$comment['id'];?>">Удалить</a>
                                        <?php endif; ?>
                            
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
            <?php endforeach; ?>
            
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


