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



















