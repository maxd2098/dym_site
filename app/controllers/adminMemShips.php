<?php

include_once SITE_ROOT . "/app/database/db.php";

// ДОБАВЛЕНИЕ АБОНЕМЕНТА start

$type = '';
$price = '';
$count = '';
$title = '';
$img = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminAddMemShips'])) {
    
    $type = trim($_POST['type']);
    $price = trim($_POST['price']);
    $count = trim($_POST['count']);
    $title = trim($_POST['title']);
    
    if ($_FILES['img']['name'] !== '') {
        $imgName = 'img' . time() . '_' . $_FILES['img']['name'];
        $imgType = $_FILES['img']['type'];
        $imgTmp = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];
        $imgPath = SITE_ROOT . '\assets\imageToServer\\' . $imgName;
        
        if(strpos($imgType, 'image') !== false) {
            $result = move_uploaded_file($imgTmp, $imgPath);
            if ($result) {
                $_POST['img'] = $imgName;
                $img = $_POST['img'];
                /*$img = [
                    'img' => $_POST['img']
                ];
            
                update('programs', $id, $img);
                $_SESSION['img'] = $_POST['img'];
                header('location: ' . BASE_URL . 'profile.php');*/
                
            } else {
                $errMsg []= "Ошибка загрузки изображения на сервер";
            }
        } else {
            $errMsg []= "Можно загружать только изображения";
        }
        
    }
    //che($_POST);
    if ($type === '' || $price === '' || $count === '' || $title === '') {
        $errMsg []= 'Не все поля * заполнены';
    } elseif(empty($_POST['img'])) {
        $errMsg []= 'Изображение не загружено';
    } else {
        $memShips = [
            'type' => $type,
            'price' => $price,
            'count' => $count,
            'title' => $title,
            'img' => $img
        ];
        insert('member_ships', $memShips);
        header('location: display.php');
    }
}

// ДОБАВЛЕНИЕ АБОНЕМЕНТА end


// РЕДАКТИРОВАНИЕ АБОНЕМЕНТА edit start

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['edit_id'])) {
    $memShip = selectOneAnd('member_ships', ['id_memsh' => $_GET['edit_id']]);
    //che($memShip);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminEditMemShips'])) {
    
    $id_memsh = $_POST['id_memsh'];
    $type = trim($_POST['type']);
    $price = trim($_POST['price']);
    $count = trim($_POST['count']);
    $title = trim($_POST['title']);
    
    if ($_FILES['img']['name'] !== '') {
        $imgName = 'img' . time() . '_' . $_FILES['img']['name'];
        $imgType = $_FILES['img']['type'];
        $imgTmp = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];
        $imgPath = SITE_ROOT . '\assets\imageToServer\\' . $imgName;
        
        $img = false;
        
        if(strpos($imgType, 'image') !== false) {
            $result = move_uploaded_file($imgTmp, $imgPath);
            if ($result) {
                $_POST['img'] = $imgName;
                $img = $_POST['img'];
                //che($_POST);
                /*$img = [
                    'img' => $_POST['img']
                ];
            
                update('programs', $id, $img);
                $_SESSION['img'] = $_POST['img'];
                header('location: ' . BASE_URL . 'profile.php');*/
                
            } else {
                $errMsg []= "Ошибка загрузки изображения на сервер";
            }
        } else {
            $errMsg []= "Можно загружать только изображения";
        }
        
    }
    //che($_POST);
    if ($type === '' || $price === '' || $count === '' || $title === '') {
        $errMsg []= 'Не все поля * заполнены';
        $memShip = selectOneAnd('member_ships', ['id_memsh' => $id_memsh]);
    } elseif ($img === false) {
        $errMsg []= 'Загруженный файл не является картинкой';
        $memShip = selectOneAnd('member_ships', ['id_memsh' => $id_memsh]);
    } else {
        $memShips = [
            'type' => $type,
            'price' => $price,
            'count' => $count,
            'title' => $title
        ];
        if($img !== '') $memShips['img'] = $img;
        updateMemShips('member_ships', $id_memsh, $memShips);
        header('location: display.php');
    }
}

// РЕДАКТИРОВАНИЕ АБОНЕМЕНТА edit end


// УДАЛЕНИЕ АБОНЕМЕНТА start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    $memshipImg = selectOneAnd('member_ships', ['id_memsh' => $_GET['delete_id']]);
    delete('member_ships', ['id_memsh' => $_GET['delete_id']]);
    unlink(SITE_ROOT . '\assets\imageToServer\\' . $memshipImg['img']);
    header("location: display.php");
}

// УДАЛЕНИЕ АБОНЕМЕНТА end


// УМЕНЬШЕНИЕ НА 1 ЧИСЛА ОСТАВШИХСЯ ТРЕНИРОВОК start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['reduce_id'])) {
    //che($_GET);
    $id_order = $_GET['reduce_id'];
    $order = selectOneAnd('ordered_memships', ['id_order' => $id_order]);
    //che($order);
    if($order['remains'] == 1) {
        delete('ordered_memships', ['id_order' => $id_order]);
        unlink(SITE_ROOT . '\assets\imageToServer\\' . $order['img']);
    } else {
        $orderReduce = [
            'remains' => $order['remains'] - 1
        ];
        updateAll('ordered_memships', $id_order, 'id_order', $orderReduce);
    }
    $reduction = [
        'id_order' => $id_order,
        'remains' => $order['remains'],
        'email' => $_SESSION['email']
    ];
    insert('order_reduction', $reduction);
    header("location: display.php");
}

// УМЕНЬШЕНИЕ НА 1 ЧИСЛА ОСТАВШИХСЯ ТРЕНИРОВОК end


// УДАЛЕНИЕ REDUCTION ЗАПИСИ start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_reduct_id'])) {
    delete('order_reduction', ['id_reduct' => $_GET['delete_reduct_id']]);
    header("location: display.php");
}

// УДАЛЕНИЕ REDUCTION ЗАПИСИ end

