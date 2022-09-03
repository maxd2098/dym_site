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
include SITE_ROOT . "/app/controllers/forum.php";

?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <!--SUPPORT start-->
    <div class="row main-content">
        
        <div class="support-content col-lg-9 col-12">
            <h2 class="main-trainers">
                Создайте тему
            </h2>
            <div class="mb-3 error-msg">
                <?php
                foreach($errMsg as $msg) {
                    echo $msg . "<br>";
                }
                //che($_POST);
                ?>
            </div>
            <form class="support-form" method="post" action="createTopic.php">
                <div class="mb-3">
                    <label class="form-label">Адрес электронной почты</label>
                    <input name="email" value="<?=$_SESSION['email']; ?>" type="email" class="form-control" placeholder="Ваш адрес" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Название темы*</label>
                    <input name="title" type="text" class="form-control" placeholder="Введите заголовок" maxlength="255">
                </div>
                <div class="mb-3">
                    <label class="form-label">Ваш комментарий (max: 10000 символов)*</label>
                    <textarea name="comment" class="form-control" rows="6" maxlength="10000"></textarea>
                </div>
                <div class="button-support col-auto">
                    <button name="button_forumTopicCreate" type="submit" class="btn btn-danger">Создать</button>
                    <a class="button" href="<?=BASE_URL . 'forum.php'; ?>">
                        <button type="button" class="btn btn-secondary">Отмена</button>
                    </a>
                </div>
            </form>
        
        </div>
        <!--SUPPORT end-->
        
        
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
