<?php

include_once SITE_ROOT . "/app/database/db.php";

$supportMsgs = selectAllAnd('supportmsg');


// ПРОСМОТР СООБЩЕНИЯ В ПОДДЕРЖКУ В АДМИНКЕ start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['look_id'])) {
    $supportMsg = selectOneAnd('supportmsg', ['id' => $_GET['look_id']]);
    //che($supportMsg);
}

// ПРОСМОТР СООБЩЕНИЯ В ПОДДЕРЖКУ В АДМИНКЕ end


// УДАЛЕНИЕ СООБЩЕНИЯ В ПОДДЕРЖКУ В АДМИНКЕ start
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    delete('supportmsg', ['id' => $_GET['delete_id']]);
    header('location: display.php');
}

// УДАЛЕНИЕ СООБЩЕНИЯ В ПОДДЕРЖКУ В АДМИНКЕ end