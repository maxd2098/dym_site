<?php

include SITE_ROOT . "/app/database/db.php";

//$users = selectAllAnd('users');

$id = '';

// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЕЙ В АДМИНКЕ start
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['edit_id'])) {
    $userEdit = selectOneAnd('users', ['id' => $_GET['edit_id']]);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminEditProfile'])) {
    //che($_POST);
    $id = $_POST['id'];
    $status = $_POST['status'];
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $age = trim($_POST['age']);
    if (isset($_POST['experience'])) $experience = $_POST['experience'];
    $info = $_POST['info'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
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
            } else {
                $errMsg []= "Ошибка загрузки изображения на сервер";
            }
        } else {
            $errMsg []= "Можно загружать только изображения";
        }
        
    }
    
    if ($name === '' || $surname === '' || $age === '') {
        $errMsg []= 'Не все поля * были заполнены';
        $userEdit = selectOneAnd('users', ['id' => $id]);
    } elseif ($pass1 !== $pass2) {
        $errMsg []= 'Пароли не совпадают';
        $userEdit = selectOneAnd('users', ['id' => $id]);
    } elseif($age > 127 || $age < 14 || !is_numeric($age)) {
        $errMsg []= 'Введите адекватный возраст 14+';
        $userEdit = selectOneAnd('users', ['id' => $id]);
    } else {
        if(!empty($pass1) && $pass1 !== '') {
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
        }
        $post = [
            'status' => $status,
            'name' => $name,
            'surname' => $surname,
            'age' => $age,
            'info' => $info
        ];
        if (isset($_POST['experience']) && $_POST['experience'] != '' && ($_POST['experience'] + 10 < $age)) {
            $post['experience'] = $experience;
        }
        if(!empty($pass1) && $pass1 !== '') {
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
            $post['password'] = $pass;
        }
        if(isset($_POST['img'])) {
            $post['img'] = $_POST['img'];
            $userImg = selectOneAnd('users', ['id' => $id]);
            unlink(SITE_ROOT . '\assets\imageToServer\\' . $userImg['img']);
        }
        //che($_FILES);
        update('users', $id, $post);
        header('location: display.php');
    }
}

// РЕДАКТИРОВАНИЕ ПОЛЬЗОВАТЕЛЕЙ В АДМИНКЕ end



// УДАЛЕНИЕ ПОЛЬЗОВАТЕЛЯ В АДМИНКЕ start
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    $userImg = selectOneAnd('users', ['id' => $_GET['delete_id']]);
    delete('users', ['id' => $_GET['delete_id']]);
    unlink(SITE_ROOT . '\assets\imageToServer\\' . $userImg['img']);
    header('location: display.php');
}

// УДАЛЕНИЕ ПОЛЬЗОВАТЕЛЯ В АДМИНКЕ end



















