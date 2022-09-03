<?php

include "../../path.php";

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
include SITE_ROOT . "/pages/banAdmin.php";
include SITE_ROOT . '/app/controllers/adminComments.php';

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    
    <div class="row main-content">
        <!--ADMIN CONTENT start-->
        <div class="admin-content col-lg-9 col-12">
            <h1>Разделы с комментариями</h1>
            <a class="admin-comments" href="displayComments.php?program">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Комментарии к программам</h5>
                        <p class="card-text">Нажмите на карточку, чтобы управлять всеми комментариями, оставленными в разделе "Тренировочные программы"</p>
                    </div>
                </div>
            </a>
    
            <a class="admin-comments" href="displayComments.php?train">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Комментарии к тренерам</h5>
                        <p class="card-text">Нажмите на карточку, чтобы управлять всеми комментариями, оставленными в разделе "Тренеры"</p>
                    </div>
                </div>
            </a>
    
            <a class="admin-comments" href="displayComments.php?forum">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Комментарии в форуме</h5>
                        <p class="card-text">Нажмите на карточку, чтобы управлять всеми комментариями, оставленными в разделе "Форум"</p>
                    </div>
                </div>
            </a>
        
        </div>
        <!--ADMIN CONTENT end-->
        
        <!--SIDEBAR start-->
        <?php include SITE_ROOT . "/pages/sidebarAdmin.php"; ?>
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



