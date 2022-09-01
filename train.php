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
include SITE_ROOT . "/app/controllers/comments.php";
$comments = selectAllComments('comments_trainer', ['id_trainer' => $_GET['id_trainer'], 'answer' => 'null']);

?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content">
        
        <div class="trainer-describe col-lg-9 col-12">
            <h2 class="name-trainer">
                <?=$trainer['name'] . ' ' . $trainer['surname']; ?>
            </h2>
            <div class="img-div">
                <img src="<?=BASE_URL . '/assets/imageToServer/' . $trainer['img']; ?>" class="img-fluid" alt="Загрузите фотографию">
            </div>
            <div class="weight-train age">
                Возраст: <?=$trainer['age'] . addYearAll($trainer, 'age');?>
            </div>
            <div class="weight-train experience">
                Стаж работы: <?=$trainer['experience'] . addYearAll($trainer, 'experience');?>
            </div>
            <div class="weight-train email">
                Email: <?=$trainer['email'];?>
            </div>
            <div class="describe">
                О себе: <?=$trainer['info'];?>
            </div>
            <button class="btn btn-danger" type="submit">Оставить заявку</button>

            <h2 class="comment-title">Комментарии</h2>

            <div class="comments-block">
                <?php if(isset($_SESSION['email'])): ?>
                    <form class="support-form" method="post" action="train.php">
                        <input name="id_trainer" value="<?=$_GET['id_trainer']; ?>" type="text" class="invisible">
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
                            <button name="button_commentTrainerCreate" type="submit" class="btn btn-danger">Отправить</button>
                        </div>
                    </form>
                <?php else: ?>
                    <h5>Только зарегистрированные пользователи могут оставлять комментарии.</h5>
                <?php endif; ?>
            </div>
    
            <?php foreach($comments as $comment): ?>

                <div class="comments-block">
                    <div class="col-12">
                        <div class="row g-0">
                            <div class="card-body">
                                <div class="card-inline-top d-flex justify-content-between col-12 col-xl-8 col-lg-10">
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
                                <div class="card-inline-bottom d-flex justify-content-between">
                                    <?php if(isset($_SESSION['email']) && isset($_SESSION['status'])): ?>
                                        <a class="a" href="#collapseExample<?=$comment['id']; ?>" data-bs-toggle="collapse">Ответить</a>
                                    
                                    <?php if($_SESSION['status'] == 2 || $_SESSION['status'] == 3 || $_SESSION['email'] == $comment['email']): ?>
                                        <a class="a" href="train.php?id_trainer=<?=$comment['id_trainer'];?>&delete_train_id=<?=$comment['id'];?>">Удалить</a>
                                    <?php endif; ?>
                                    
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="collapse collapse-comment" id="collapseExample<?=$comment['id']; ?>">
                    <form class="form" method="post" action="program.php">
                        <input name="answer" value="<?=$comment['id']; ?>" type="text" class="invisible">
                        <input name="id_trainer" value="<?=$_GET['id_trainer']; ?>" type="text" class="invisible">
                        <input name="email" value="<?=$_SESSION['email']; ?>" type="email" class="invisible">
                        <div class="mb-3 col-12">
                            <textarea name="comment" class="form-control" rows="2" maxlength="2000" placeholder="max: 2000 символов"></textarea>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-auto">
                            <button name="button_commentTrainerCreate" type="submit" class="btn btn-comment-answer btn-secondary">Ответить</button>
                        </div>
                    </form>

                </div>
    
                <?php
    
                $commentsIsNotNull = selectAllComments('comments_trainer', ['id_trainer' => $_GET['id_trainer'], 'answer' => $comment['id']]);
                //ch($commentsIsNotNull);
                if($commentsIsNotNull != ''):
        
                    ?>
        
                    <?php foreach($commentsIsNotNull as $commentAnswer): ?>

                    <div class="comments-block answer-comment">
                        <div class="col-12">
                            <div class="row g-0">
                                <div class="card-body">
                                    <div class="card-inline-top d-flex justify-content-between col-12 col-xl-8 col-lg-10">
                                        <div class="card-italic"><?=$commentAnswer['name'] . ' ' . $commentAnswer['surname']; ?></div>
                            
                                        <?php if($commentAnswer['status'] == 0): ?>
                                            <div class="card-italic">Клиент</div>
                                        <?php elseif($commentAnswer['status'] == 1): ?>
                                            <div class="card-italic">Тренер</div>
                                        <?php elseif($commentAnswer['status'] == 2): ?>
                                            <div class="card-italic">Админинстратор</div>
                                        <?php else: ?>
                                            <div class="card-italic">Владелец сайта</div>
                                        <?php endif; ?>

                                        <div class="card-italic"> <?=$commentAnswer['created_date']; ?></div>
                                    </div>
                                    <p class="card-text"><?=$commentAnswer['comment']; ?></p>
                                    <div class="card-inline-bottom d-flex justify-content-between">
                                        <?php if(isset($_SESSION['email']) && isset($_SESSION['status'])): ?>
                                
                                            <?php if($_SESSION['status'] == 2 || $_SESSION['status'] == 3 || $_SESSION['email'] == $commentAnswer['email']): ?>
                                                <a class="a" href="train.php?id_trainer=<?=$comment['id_trainer'];?>&delete_train_id=<?=$comment['id'];?>">Удалить</a>
                                            <?php endif; ?>
                            
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                <?php endforeach; ?>
    
                <?php endif; ?>
    
            <?php endforeach; ?>
            
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

