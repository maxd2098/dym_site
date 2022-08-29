<?php

include_once SITE_ROOT . "/app/database/db.php";

//$topics = selectAllAndForForum('forum');
//che($topics);

// СОЗДАНИЕ ТЕМЫ start

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_forumTopicCreate'])) {
    $email = trim($_POST['email']);
    $title = trim($_POST['title']);
    $comment = $_POST['comment'];
    
    if ($title === '' || $comment === '') {
        $errMsg []= 'Не все поля * заполнены';
    } else {
        
        $topic = [
            'email' => $email,
            'title' => $title,
            'comment' => $comment
        ];
        insert('forum', $topic);
        header('location: forum.php');
    }
}

// СОЗДАНИЕ ТЕМЫ end


// ПРОСМОТР ТЕМЫ start
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_topic']) && isset($_GET['email'])) {
    $topic = selectOneAnd('forum', ['id_topic' => $_GET['id_topic']]);
    $author = selectOneAnd('users', ['email' => $_GET['email']]);
    //che($topic);
}

// ПРОСМОТР ТЕМЫ end


// УДАЛЕНИЕ ТЕМЫ start

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_deleteTopic'])) {
    
    delete('forum', ['id_topic' => $_POST['id_topic']]);
    header('location: forum.php');
    
}

// УДАЛЕНИЕ СТАТЬИ end













