<?php

include SITE_ROOT . "/app/database/db.php";

$errMsg = [];
$status = '';
$email = '';
$message = '';

// ОТПРАВКА ОБРАЩЕНИЯ start

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_supportMsg'])) {
    $status = $_SESSION['status'];
    $email = trim($_SESSION['email']);
    $message = $_POST['message'];
    //che($_POST);
    
    if ($message === '') {
        $errMsg []= 'Вы не написали обращение';
    } else {
        $userToSupport = selectOneUserToSupport('supportmsg', ['email' => $email]);
        if (isset($userToSupport['created_date'])) {
            $lastDateMsg = strtotime($userToSupport['created_date']);
            $lastDateMsg = time() + (60 * 60 * 10) - $lastDateMsg;
        }
        if(isset($lastDateMsg) && $lastDateMsg < (60 * 60 * 6)) {
            $errMsg []= 'Вы можете отправлять обращения только 1 раз в 6 часов';
        } else {
            $supportMsg = [
                'status' => $status,
                'email' => $email,
                'message' => $message
            ];
            insert('supportmsg', $supportMsg);
            $errMsg []= 'ВАШЕ ОБРАЩЕНИЕ УСПЕШНО ОТПРАВЛЕНО';
        }
    }
}

// ОТПРАВКА ОБРАЩЕНИЯ end