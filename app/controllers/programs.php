<?php

include_once SITE_ROOT . "/app/database/db.php";

// ДОБАВЛЕНИЕ СТАТЬИ start

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_createProgram'])) {
    $title = trim($_POST['title']);
    $text = $_POST['text'];
    $author_id = $_SESSION['id'];
    
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
    
    if ($title === '' || $text === '') {
        $errMsg []= 'Не все поля * заполнены';
    } else {
        
        $program = [
            'title' => $title,
            'text' => $text,
            'author_id' => $author_id
        ];
        if(isset($_POST['img'])) $program['img'] = $_POST['img'];
        insert('programs', $program);
        header('location: programms.php');
    }
}

// ДОБАВЛЕНИЕ СТАТЬИ end


// ВЫВОД ВСЕХ СТАТЕЙ ТРЕНЕРА ДЛЯ РЕДАКТИРОВАНИЯ start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $_GET['id'] === $_SESSION['id']) {
    $programs = selectAllStatesForTrainer('programs', 'users', ['author_id' => $_GET['id']]);
    //che($programs);
}

// ВЫВОД ВСЕХ СТАТЕЙ ТРЕНЕРА ДЛЯ РЕДАКТИРОВАНИЯ end


// РЕДАКТИРОВАНИЕ СТАТЬИ start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_program'])) {
    $program = selectOneAnd('programs', ['id_program' => $_GET['id_program']]);
    //che($program);
}

// РЕДАКТИРОВАНИЕ СТАТЬИ end



// РЕДАКТИРОВАНИЕ СТАТЬИ edit start

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_editProgram'])) {
    //che($_POST);
    $title = trim($_POST['title']);
    $text = $_POST['text'];
    $id_program = $_POST['id_program'];
    $author_id = $_SESSION['id'];
    
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
    
    if ($title === '' || $text === '') {
        $errMsg []= 'Не все поля * заполнены';
        $program = selectOneAnd('programs', ['id_program' => $id_program]);
    } else {
        
        $program = [
            'title' => $title,
            'text' => $text,
            'author_id' => $author_id
        ];
        if(isset($_POST['img'])) $program['img'] = $_POST['img'];
        updateProgram('programs', $id_program, $program);
        header('location: programms.php');
    }
}

// РЕДАКТИРОВАНИЕ СТАТЬИ edit end




















