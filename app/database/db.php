<?php

session_start();
include "connect.php";

function che($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
    exit;
}

function ch($value) {
    echo "<pre>";
    print_r($value);
    echo "</pre>";
}

function dbCheckError($query) {
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

function insert($table, $params) {
    global $pdo;
    $keys = '';
    $values = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check == 0) {
            $keys .= "$key";
            $values .= "'$value'";
            
        } else {
            $keys .= ", $key";
            $values .= ", '$value'";
        }
        $check++;
    }
    
    $sql = "INSERT INTO gym_site.$table($keys) VALUES($values)";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}

function update($table, $id, $params) {
    global $pdo;
    
    $set = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $set .= "$key = '$value'";
        } else {
            $set .= ", $key = '$value'";
        }
    }
    
    $sql = "UPDATE gym_site.$table SET $set WHERE id = $id";

    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
}

function selectOneAnd($table, $params = []) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= " WHERE $key = '$value'";
        } else {
            $where .= " AND $key = '$value'";
        }
    }
    
    $sql = "SELECT * FROM gym_site.$table" . $where;
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetch();
}

function selectOneOr($table, $params = []) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= " WHERE $key = '$value'";
        } else {
            $where .= " OR $key = '$value'";
        }
    }
    
    $sql = "SELECT * FROM gym_site.$table" . $where;
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetch();
}

function selectAllOr($table, $params = []) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= " WHERE $key = '$value'";
        } else {
            $where .= " OR $key = '$value'";
        }
    }
    
    $sql = "SELECT * FROM gym_site.$table" . $where;
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}

function selectAllAnd($table, $params = []) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= " WHERE $key = '$value'";
        } else {
            $where .= " AND $key = '$value'";
        }
    }
    
    $sql = "SELECT * FROM gym_site.$table" . $where;
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}

function delete($table, $params) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= " WHERE $key = '$value'";
        } else {
            $where .= " AND $key = '$value'";
        }
    }
    
    $sql = "DELETE FROM gym_site.$table" . $where;
    
    ch($sql);
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    
}

// ФУНКЦИЯ ПОИСКА ПОСЛЕДНЕГО ОБРАЩЕНИЯ В ПОДДЕРЖКУ ПОЛЬЗОВАТЕЛЯ
function selectOneUserToSupport($table, $params) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= " WHERE $key = '$value'";
        } else {
            $where .= " AND $key = '$value'";
        }
    }
    
    $sql = "
        SELECT *
        FROM gym_site.$table" . $where . " AND created_date = (SELECT MAX(created_date) FROM gym_site.$table $where)";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetch();
}

//$arr = [
//    'name' => 'maxi',
//    'surname' => 'danil',
//    'email' => 'poo@aad',
//    'password' => '1233',
//    'phone' => '123123121a',
//    'age' => 23
//];





















