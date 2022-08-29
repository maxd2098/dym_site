<?php

include_once SITE_ROOT . "/app/database/db.php";

//$topics = selectAllAndForForum('forum');

// РЕДАКТИРОВАНИЕ ТЕМ ФОРУМА start

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['edit_id'])) {
    $topic = selectOneAnd('forum', ['id_topic' => $_GET['edit_id']]);
    $author = selectOneAnd('users', ['email' => $topic['email']]);
    //che($topic);
}

// РЕДАКТИРОВАНИЕ ТЕМ ФОРУМА end


// РЕДАКТИРОВАНИЕ ТЕМЫ ФОРУМА edit start
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminEditForum'])) {
    //che($_POST);
    $title = trim($_POST['title']);
    $comment = trim($_POST['comment']);
    $id_topic = $_POST['id_topic'];
    
    if ($title === '' || $comment === '') {
        $errMsg[] = 'Не все поля * заполнены';
        $topic = selectOneAnd('forum', ['id_topic' => $id_topic]);
        $author = selectOneAnd('users', ['email' => $topic['email']]);
    } else {
        $topic = [
            'title' => $title,
            'comment' => $comment
        ];
        updateForum('forum', $id_topic, $topic);
        header('location: display.php');
    }
}

// РЕДАКТИРОВАНИЕ ТЕМЫ ФОРУМА edit end


// УДАЛЕНИЕ ТЕМЫ ФОРУМА В АДМИНКЕ start
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    delete('forum', ['id_topic' => $_GET['delete_id']]);
    header('location: display.php');
}

// УДАЛЕНИЕ ТЕМЫ ФОРУМА В АДМИНКЕ end









