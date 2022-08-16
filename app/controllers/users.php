<?php

include  SITE_ROOT . "/app/database/db.php";

$errMsg = [];

$name = '';
$surname = '';
$email = '';
$phone = '';
$age = '';
$img = '';
$info = '';
$status = '';

function autUser($user) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['surname'] = $user['surname'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['age'] = $user['age'];
    $_SESSION['experience'] = $user['experience'];
    $_SESSION['img'] = $user['img'];
    $_SESSION['info'] = $user['info'];
    $_SESSION['status'] = $user['status'];
    header("location: " . BASE_URL . "profile.php");
}

// РЕГИСТРАЦИЯ start

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_reg'])) {
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $age = trim($_POST['age']);
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if ($name === '' || $surname === '' || $email === '' || $phone === '' || $age === '' || $pass1 === '') {
        $errMsg []= 'Не все поля заполнены';
    } elseif ($pass1 !== $pass2) {
        $errMsg []= 'Пароли не совпадают';
    } elseif($age > 127 || $age < 14 || !is_numeric($age)) {
        $errMsg []= 'Введите адекватный возраст 14+';
    } else {
        $emailOrPhoneCheck = selectOneOr('users', ['email' => $email, 'phone' => $phone]);
        if (!empty($emailOrPhoneCheck)) {
            $errMsg []= 'Пользователь с таким email или номером телефона уже зарегистрирован';
        } else {
            $pass = password_hash($pass1, PASSWORD_DEFAULT);
            $post = [
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'password' => $pass,
                'phone' => $phone,
                'age' => $age
            ];
            insert('users', $post);
            $user = selectOneAnd('users', ['email' => $email]);
            autUser($user);
        }
    }
}

// РЕГИСТРАЦИЯ end



// АВТОРИЗАЦИЯ start

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_aut'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    if ($email === '' || $pass === '') {
        $errMsg []= 'Не все поля заполнены';
    } else {
        $user = selectOneOr('users', ['email' => $email, 'phone' => $phone]);
        if (!empty($user) && password_verify($pass, $user['password'])) {
            autUser($user);
        } else {
            $errMsg []= 'Неверный email (номер телефона) или пароль';
        }
    }
}

// АВТОРИЗАЦИЯ end



// РЕДАКТИРОВАНИЕ ПРОФИЛЯ start

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $userEdit = selectOneAnd('users', ['id' => $_GET['id']]);
    /*$name = $userEdit['name'];
    $surname = $userEdit['surname'];
    $email = $userEdit['email'];
    $phone = $userEdit['phone'];
    $age = $userEdit['age'];
    $info = $userEdit['info'];
    $img = $userEdit['img'];
    if (isset($userEdit['experience'])) $experience = $userEdit['experience'];
    $status = $userEdit['status'];*/
}

// РЕДАКТИРОВАНИЕ ПРОФИЛЯ end


// РЕДАКТИРОВАНИЕ ПРОФИЛЯ edit start
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_editProfile'])) {
    $id = $_SESSION['id'];
    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $phone = trim($_POST['phone']);
    $age = trim($_POST['age']);
    $info = $_POST['info'];
    if (isset($_POST['experience'])) $experience = $_POST['experience'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $email = $_SESSION['email'];
    $status = $_SESSION['status'];
    
    if ($name === '' || $surname === '' || $phone === '' || $age === '') {
        $errMsg []= 'Не все поля * были заполнены';
        $userEdit = selectOneAnd('users', ['id' => $id]);
    } elseif ($pass1 !== $pass2) {
        $errMsg []= 'Пароли не совпадают';
        $userEdit = selectOneAnd('users', ['id' => $id]);
    } elseif($age > 127 || $age < 14 || !is_numeric($age)) {
        $errMsg []= 'Введите адекватный возраст 14+';
        $userEdit = selectOneAnd('users', ['id' => $id]);
    } else {
        //che($_POST);
        $checkUser = 0;
        $emailOrPhoneCheck = selectAllOr('users', ['email' => $email, 'phone' => $phone]);
        //che($emailOrPhoneCheck);
        foreach($emailOrPhoneCheck as $userCheck) {
            if ($email != $userCheck['email']) {
                $errMsg []= 'Пользователь с таким номером телефона уже зарегистрирован';
                $userEdit = selectOneAnd('users', ['id' => $id]);
                $checkUser++;
            }
            if ($checkUser > 0) {
                break;
            }
        }
        if ($checkUser == 0) {
            if(!empty($pass1)) {
                $pass = password_hash($pass1, PASSWORD_DEFAULT);
            }
            $post = [
                'name' => $name,
                'surname' => $surname,
                'phone' => $phone,
                'age' => $age,
                'info' => $info
            ];
            if (isset($_POST['experience']) && $_POST['experience'] != '' && ($_POST['experience'] + 10 < $age )) {
                $post['experience'] = $experience;
            }
            if(!empty($pass1)) {
                $pass = password_hash($pass1, PASSWORD_DEFAULT);
                $post['password'] = $pass;
            }
            //che($_FILES);
            update('users', $id, $post);
            $user = selectOneAnd('users', ['phone' => $phone]);
            autUser($user);
        }
    }
}

// РЕДАКТИРОВАНИЕ ПРОФИЛЯ edit end


// РЕДАКТИРОВАНИЕ ФОТО start

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_editPhoto'])) {
    
    $id = $_SESSION['id'];
    //che($_FILES);
    if (isset($_FILES['img']['name'])) {
        $imgName = 'img' . time() . '_' . $_FILES['img']['name'];
        $imgType = $_FILES['img']['type'];
        $imgTmp = $_FILES['img']['tmp_name'];
        $imgSize = $_FILES['img']['size'];
        $imgPath = SITE_ROOT . '\assets\imageToServer\\' . $imgName;
        
        //che($imgPath);
        
        if(strpos($imgType, 'image') !== false) {
            $result = move_uploaded_file($imgTmp, $imgPath);
            if ($result) {
                $_POST['img'] = $imgName;
                
                $img = [
                    'img' => $_POST['img']
                ];
                
                update('users', $id, $img);
                $_SESSION['img'] = $_POST['img'];
                header('location: ' . BASE_URL . 'profile.php');
                
            } else {
                $errMsg []= "Ошибка загрузки изображения на сервер";
            }
        } else {
            $errMsg []= "Можно загружать только изображения";
        }
        
    } else {
        $errMsg []= "Ошибка получения картинки";
    }
    
}

// РЕДАКТИРОВАНИЕ ФОТО end
















