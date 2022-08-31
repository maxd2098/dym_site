<?php

include_once SITE_ROOT . "/app/database/db.php";


// ДОБАВЛЕНИЕ КОММЕНТАРИЯ К ПРОГРАММЕ start
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_commentProgramCreate'])) {
    //che($_POST);
    $id_program = $_POST['id_program'];
    $email = $_POST['email'];
    $comment = trim($_POST['comment']);
    
    if ($comment === '') {
        $errMsg []= 'Не все поля * заполнены';
    } else {
        
        $comment = [
            'id_program' => $id_program,
            'email' => $email,
            'comment' => $comment
        ];
        if(isset($_POST['answer'])) $comment['answer'] = $_POST['answer'];
        insert('comments_program', $comment);
    }
    header('location: program.php?id_program=' . $id_program);
}

// ДОБАВЛЕНИЕ КОММЕНТАРИЯ К ПРОГРАММЕ end


// УДАЛЕНИЕ КОММЕНТАРИЯ К ПРОГРАММЕ start

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    //che($_GET);
    delete('comments_program', ['id' => $_GET['delete_id']]);
    header('location: program.php?id_program=' . $_GET['id_program']);
    //che($_POST);
}

// УДАЛЕНИЕ КОММЕНТАРИЯ К ПРОГРАММЕ end


// ДОБАВЛЕНИЕ КОММЕНТАРИЯ К ТРЕНЕРУ start
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_commentTrainerCreate'])) {
    //che($_POST);
    $id_trainer = $_POST['id_trainer'];
    $email = $_POST['email'];
    $comment = trim($_POST['comment']);
    
    if ($comment === '') {
        $errMsg []= 'Не все поля * заполнены';
    } else {
        $comment = [
            'id_trainer' => $id_trainer,
            'email' => $email,
            'comment' => $comment
        ];
        if(isset($_POST['answer'])) $comment['answer'] = $_POST['answer'];
        insert('comments_trainer', $comment);
    }
    header('location: train.php?id_trainer=' . $id_trainer);
}

// ДОБАВЛЕНИЕ КОММЕНТАРИЯ К ТРЕНЕРУ end


// УДАЛЕНИЕ КОММЕНТАРИЯ К ТРЕНЕРУ start

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_train_id'])) {
    //che($_GET);
    delete('comments_trainer', ['id' => $_GET['delete_train_id']]);
    header('location: train.php?id_trainer=' . $_GET['id_trainer']);
}

// УДАЛЕНИЕ КОММЕНТАРИЯ К ТРЕНЕРУ end


// ДОБАВЛЕНИЕ КОММЕНТАРИЯ К ТЕМЕ ФОРУМА start
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_commentTopicCreate'])) {
    //che($_POST);
    $id_topic = $_POST['id_topic'];
    $email = $_POST['email'];
    $comment = trim($_POST['comment']);
    $author = selectOneAnd('users', ['email' => $_POST['email_topic']]);
    
    if ($comment === '') {
        $errMsg []= 'Не все поля * заполнены';
    } else {
        $comment = [
            'id_topic' => $id_topic,
            'email' => $email,
            'comment' => $comment
        ];
        if(isset($_POST['answer'])) $comment['answer'] = $_POST['answer'];
        insert('comments_topic', $comment);
    }
    header('location: topic.php?id_topic=' . $id_topic . '&email=' . $author['email']);
}

// ДОБАВЛЕНИЕ КОММЕНТАРИЯ К ТЕМЕ ФОРУМА end


// УДАЛЕНИЕ КОММЕНТАРИЯ К ТЕМЕ ФОРУМА start

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_topic_id'])) {
    //che($_GET);
    delete('comments_topic', ['id' => $_GET['delete_topic_id']]);
    header('location: topic.php?id_topic=' . $_GET['id_topic'] . '&email=' . $_GET['email']);
}

// УДАЛЕНИЕ КОММЕНТАРИЯ К ТРЕНЕРУ end









