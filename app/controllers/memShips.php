<?php

include_once SITE_ROOT . "/app/database/db.php";

$memberShips = selectAllAnd('member_ships');
//che($memberShips);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_memsh']) && isset($_SESSION['email'])) {
    $memberShip = selectOneAnd('member_ships', ['id_memsh' => $_GET['id_memsh']]);
    //che($memberShip);
}

// ПОКУПКА АБОНЕМЕНТА start

function toImage($text, $x, $y, $imgPath) {
    $img = BASE_URL . 'assets/imageToServer/' . $_POST['img'];
    //che($img);
    $font = "C:\arial.ttf"; // Ссылка на шрифт
    $font_size = 64; // Размер шрифта
    $degree = 0; // Угол поворота текста в градусах
    $pic = imagecreatefrompng($img); // Функция создания изображения
    //che($pic);
    $color = imagecolorallocate($pic, 0, 0, 0); // Функция выделения цвета для текста
    
    imagettftext($pic, $font_size, $degree, $x, $y, $color, $font, $text); // Функция нанесения текста
    imagepng($pic, $imgPath); // Сохранение рисунка
    //che($bool);
    
    imagedestroy($pic);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_payForMemShip'])) {
    //che($_POST);
    $email = $_POST['email'];
    $id_memsh = $_POST['id_memsh'];
    $remains = $_POST['count'];
    $num_card = $_POST['num_card'];
    $date_card = $_POST['date_card'];
    $code_card = $_POST['code_card'];
    $img = SITE_ROOT . '\assets\img' . '\order_memship.png';
    //che($img);
    
    if ($num_card === '' || $date_card === '' || $code_card === '') {
        $errMsg []= 'Не все поля * заполнены';
        $memberShip = selectOneAnd('member_ships', ['id_memsh' => $id_memsh]);
    } else {
        $imgName = 'img' . time() . '.png';
        $imgPath = SITE_ROOT . '\assets\imageToServer\\' . $imgName;
        $result = copy($img, $imgPath);
        
        //che($result);
        if ($result) {
            $_POST['img'] = $imgName;
            $orderMemsh = [
                'email' => $email,
                'id_memsh' => $id_memsh,
                'remains' => $remains,
                'img' => $_POST['img']
            ];
    
            toImage($email, 600, 370, $imgPath);
            toImage($remains, 790, 626, $imgPath);
            //toImage($email, 600, 370, $imgPath);
    
            insert('ordered_memships', $orderMemsh);
            
            $nowMemship = selectOneAnd('ordered_memships', ['img' => $_POST['img'], 'email' => $email]);
            //che($nowMemship);
            toImage($nowMemship['id_order'], 800, 885, $imgPath);
            
            header('location: boughtMemships.php?id=' . $_SESSION['id']);
        } else {
            $errMsg []= "Ошибка загрузки изображения на сервер";
        }
        
        
    }
}

// ПОКУПКА АБОНЕМЕНТА end





