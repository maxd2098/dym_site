<?php

include_once SITE_ROOT . "/app/database/db.php";

$slides = selectAllAnd('carousel');

// ДОБАВЛЕНИЕ СЛАЙДА start

$title = '';
$slide = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminAddSlide'])) {
    //che($_FILES);
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
                
            } else {
                $errMsg []= "Ошибка загрузки изображения на сервер";
            }
        } else {
            $errMsg []= "Можно загружать только изображения";
        }
        
    }
    //che($_POST);
    if ($title === '') {
        $errMsg []= 'Не все поля * заполнены';
    } elseif(empty($_POST['img'])) {
        $errMsg []= 'Изображение не загружено';
    } else {
        $slide = [
            'title' => $title,
            'img' => $img
        ];
        insert('carousel', $slide);
        header('location: display.php');
    }
}

// ДОБАВЛЕНИЕ СЛАЙДА end


// РЕДАКТИРОВАНИЕ СЛАЙДА edit start

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['edit_id'])) {
    $slide = selectOneAnd('carousel', ['id_slide' => $_GET['edit_id']]);
    //che($slide);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminEditSlide'])) {
    //che($_POST);
    $id_slide = $_POST['id_slide'];
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
                
            } else {
                $errMsg []= "Ошибка загрузки изображения на сервер";
            }
        } else {
            $errMsg []= "Можно загружать только изображения";
        }
        
    }
    //che($_POST);
    if ($title === '') {
        $errMsg []= 'Не все поля * заполнены';
        $slide = selectOneAnd('carousel', ['id_slide' => $id_slide]);
    } elseif ($img === false) {
        $errMsg []= 'Загруженный файл не является картинкой';
        $slide = selectOneAnd('carousel', ['id_slide' => $id_slide]);
    } else {
        $slide = [
            'title' => $title
        ];
        if($img !== '') {
            $slide['img'] = $img;
            $slideImg = selectOneAnd('carousel', ['id_slide' => $id_slide]);
            unlink(SITE_ROOT . '\assets\imageToServer\\' . $slideImg['img']);
        }
        updateAll('carousel', $id_slide, 'id_slide', $slide);
        header('location: display.php');
    }
}

// РЕДАКТИРОВАНИЕ СЛАЙДА edit end


// УДАЛЕНИЕ СЛАЙДА start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    $slideImg = selectOneAnd('carousel', ['id_slide' => $_GET['delete_id']]);
    delete('carousel', ['id_slide' => $_GET['delete_id']]);
    unlink(SITE_ROOT . '\assets\imageToServer\\' . $slideImg['img']);
    header("location: display.php");
}

// УДАЛЕНИЕ СЛАЙДА end










