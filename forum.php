<?php

include "path.php";
include "app/controllers/supportMsg.php";

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
<?php include "pages/header.php"; ?>
<!--HEADER end-->


<!--MAIN start-->


<div class="container">
    <!--FORUM start-->
    <div class="row main-content">
        
        <div class="forum-content col-lg-9 col-12">
            <h2 class="main-trainers">
                Форум
            </h2>
            <a href="">
                <div class="card">
                    <div class="card-body">
                        <div class="row flex-forum">
                            <h5 class="card-title col-8">Что лучше, протеин или гейнер</h5>
                            <div class="change-date col-4">Последнее сообщение: 18:46</div>
                        </div>
                        <div class="author">
                            <div class="name-author">Автор: Фред Ган</div>
                            <div class="create-date">06:08:22 16:32</div>
                        </div>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>

            <a href="">
                <div class="card">
                    <div class="card-body">
                        <div class="row flex-forum">
                            <h5 class="card-title col-8">Что лучше, протеин или гейнер</h5>
                            <div class="change-date col-4">Последнее сообщение: 18:46</div>
                        </div>
                        <div class="author">
                            <div class="name-author">Автор: Фред Ган</div>
                            <div class="create-date">06:08:22 16:32</div>
                        </div>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
            
            
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>

</body>
</html>
