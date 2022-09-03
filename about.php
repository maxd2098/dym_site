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
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="https://kit.fontawesome.com/90241b67b0.js" crossorigin="anonymous"></script>
</head>
<body>

<!--HEADER start-->
<?php

include "pages/header.php";
$about = selectOneAnd('about');

?>
<!--HEADER end-->


<!--MAIN start-->

<div class="container">
    <!--TRAINERS CARDS start-->
    <div class="row main-content about-content">
        
        <div class="train-cards col-lg-9 col-12">
            <div class="d-flex justify-content-between">
                <h2 class="about-title">
                    О нас
                </h2>
                <?php if(isset($_SESSION['status']) && ($_SESSION['status'] == 2 || $_SESSION['status'] == 3)): ?>
                    <div class="button-program-add">
                        <a href="<?=BASE_URL . 'admin/editAbout.php'?>">
                            <button type="button" class="btn btn-danger">Редактировать раздел</button>
                        </a>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row-div phone-number">
                <h5>Наш номер телефона</h5>
                <div><?=$about['phone']; ?></div>
            </div>
            <div class="row-div email">
                <h5>Наш email</h5>
                <div><?=$about['email']; ?></div>
            </div>
            <div class="row-div address">
                <h5>Адрес</h5>
                <div><?=$about['address']; ?></div>
            </div>
            <div class="row-div describe">
                <h5>Описание фитнес-центра</h5>
                <div><?=$about['description']; ?></div>
            </div>
        </div>
        <!--TRAINERS CARDS start-->
        
        
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
