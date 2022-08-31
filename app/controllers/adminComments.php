<?php

//if (isset($_GET['program'])) {
//    $comments = selectAllAnd('comments_program');
//} elseif (isset($_GET['train'])) {
//    $comments = selectAllAnd('comments_trainer');
//} else {
//    $comments = selectAllAnd('comments_topic');
//}


// РЕДАКТИРОВАНИЕ КОММЕНТАРИЯ start

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['edit_id'])) {
    //che($_GET);
    if (isset($_GET['program'])) {
        $comment = selectOneAnd('comments_program', ['id' => $_GET['edit_id']]);
        $getId = 'id_program';
        $getTable = 'program';
    } elseif (isset($_GET['train'])) {
        $comment = selectOneAnd('comments_trainer', ['id' => $_GET['edit_id']]);
        $getId = 'id_trainer';
        $getTable = 'train';
    } else {
        $comment = selectOneAnd('comments_topic', ['id' => $_GET['edit_id']]);
        $getId = 'id_topic';
        $getTable = 'forum';
    }
    //che($comment);
}

// РЕДАКТИРОВАНИЕ КОММЕНТАРИЯ end


// РЕДАКТИРОВАНИЕ КОММЕНТАРИЯ edit start
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_adminEditComment'])) {
    //che($_POST);
    $comment = trim($_POST['comment']);
    $id = $_POST['id'];
    
    if ($comment === '') {
        $errMsg[] = 'Не все поля * заполнены';
        if ($_POST['getTable'] == 'program') {
            $comment = selectOneAnd('comments_program', ['id' => $id]);
            $getId = 'id_program';
            $getTable = 'program';
        } elseif ($_POST['getTable'] == 'train') {
            $comment = selectOneAnd('comments_trainer', ['id' => $id]);
            $getId = 'id_trainer';
            $getTable = 'train';
        } else {
            $comment = selectOneAnd('comments_topic', ['id' => $id]);
            $getId = 'id_topic';
            $getTable = 'forum';
        }
    } else {
        $info = [
            'comment' => $comment
        ];
        //che($_POST);
        if ($_POST['getTable'] == 'program') {
            update('comments_program', $id, $info);
        } elseif ($_POST['getTable'] == 'train') {
            update('comments_trainer', $id, $info);
        } else {
            update('comments_topic', $id, $info);
        }
        header('location: displayComments.php?' . $_POST['getTable']);
    }
}

// РЕДАКТИРОВАНИЕ КОММЕНТАРИЯ edit end


// УДАЛЕНИЕ КОММЕНТАРИЯ В АДМИНКЕ start
if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['delete_id'])) {
    //che($_GET);
    if (isset($_GET['program'])) {
        delete('comments_program', ['id' => $_GET['delete_id']]);
        $getTable = 'program';
    } elseif (isset($_GET['train'])) {
        delete('comments_trainer', ['id' => $_GET['delete_id']]);
        $getTable = 'train';
    } else {
        delete('comments_topic', ['id' => $_GET['delete_id']]);
        $getTable = 'forum';
    }
    header('location: displayComments.php?' . $getTable);
}

// УДАЛЕНИЕ КОММЕНТАРИЯ В АДМИНКЕ end









