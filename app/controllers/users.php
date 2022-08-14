<?php

session_start();
include  SITE_ROOT . "/app/database/db.php";


$errMsg = [];

$name = '';
$surname = '';
$email = '';
$phone = '';
$age = '';

function autUser($user) {
    $_SESSION['name'] = $user['name'];
    $_SESSION['surname'] = $user['surname'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['phone'] = $user['phone'];
    $_SESSION['age'] = $user['age'];
    $_SESSION['experience'] = $user['experience'];
    $_SESSION['img'] = $user['img'];
    $_SESSION['status'] = $user['status'];
    header("location: profile.php");
}

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













