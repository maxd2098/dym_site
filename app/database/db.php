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

function updateProgram($table, $id, $params) {
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
    
    $sql = "UPDATE gym_site.$table SET $set WHERE id_program = $id";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
}

function updateMemShips($table, $id, $params) {
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
    
    $sql = "UPDATE gym_site.$table SET $set WHERE id_memsh = $id";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
}

function updateAbout($table, $params) {
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
    
    $sql = "UPDATE gym_site.$table SET $set WHERE id_about = 1";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
}

function updateForum($table, $id, $params) {
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
    
    $sql = "UPDATE gym_site.$table SET $set WHERE id_topic = $id";
    
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
}

function updateCarousel($table, $id, $params) {
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
    
    $sql = "UPDATE gym_site.$table SET $set WHERE id_slide = $id";
    
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

function selectAllStatesForTrainer($table1, $table2, $params = []) {
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
        SELECT id_program, title, author_id, text, count_like, t1.img, t1.created_date, t1.change_date, publish, name, surname, email
        FROM gym_site.$table1 AS t1 JOIN gym_site.$table2 AS t2 ON t1.author_id = t2.id" . $where;
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}

function selectOneAndForDisplayOrEditProgram($table1, $table2, $params = []) {
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
        SELECT id_program, title, author_id, text, count_like, t1.img, t1.created_date, t1.change_date, name, surname
        FROM gym_site.$table1 AS t1 JOIN gym_site.$table2 AS t2 ON t1.author_id = t2.id" . $where;
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetch();
}

function selectAllAndForForum($table, $params = []) {
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
    
    $sql = "SELECT * FROM gym_site.$table" . $where . " ORDER BY last_date DESC";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}

function selectTrainersToGeneralPage($table, $params = []) {
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
    
    $sql = "SELECT * FROM gym_site.$table" . $where . " ORDER BY RAND() LIMIT 4";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}

function selectResultFromSearch($table, $search) {
    global $pdo;
    
    $where = '';
    if ($table == 'users') {
        $where .= "WHERE (name LIKE '%$search%' ";
        $where .= "OR surname LIKE '%$search%' ";
        $where .= "OR email LIKE '%$search%' ";
        $where .= "OR info LIKE '%$search%') AND status = 1 ";
        $sql = "SELECT * FROM gym_site.$table " . $where;
    } elseif ($table == 'programs') {
        $where .= "JOIN gym_site.users AS t2 ON t1.author_id = t2.id WHERE title LIKE '%$search%' ";
        $where .= "OR text LIKE '%$search%' ";
        $where .= "OR name LIKE '%$search%' ";
        $where .= "OR surname LIKE '%$search%' ";
        $sql = "SELECT id, title, text, name, surname, t1.created_date, change_date, publish, t1.img FROM gym_site.$table AS t1 " . $where;
    } else {
        $where .= "WHERE title LIKE '%$search%' ";
        $where .= "OR comment LIKE '%$search%' ";
        $sql = "SELECT * FROM gym_site.$table " . $where;
    }
    
    
    
    //che($sql);
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}

function countTable($table, $params = []) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= "WHERE $key = '$value' ";
        } else {
            $where .= "AND $key = '$value' ";
        }
    }
    
    $sql = "SELECT COUNT(*) AS count FROM gym_site.$table " . $where;
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetch();
}

function selectAllForPage($table, $limit, $offset, $params = []) {
    global $pdo;
    
    $where = '';
    $check = 0;
    foreach ($params as $key => $value) {
        if ($check++ == 0) {
            $where .= "WHERE $key = '$value' ";
        } else {
            $where .= "AND $key = '$value' ";
        }
    }
    
    if ($table == 'programs') {
        $sql = "
        SELECT id_program, title, author_id, text, count_like, t1.img, t1.created_date, t1.change_date, publish, name, surname, email
        FROM gym_site.$table AS t1 JOIN gym_site.users AS t2 ON t1.author_id = t2.id " . $where;
    } elseif($table == 'users') {
        $sql = "SELECT * FROM gym_site.$table " . $where;
    } else {
        $sql = "SELECT * FROM gym_site.$table " . $where . "ORDER BY last_date DESC ";
    }
    
    
    $sql .= "LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    
    dbCheckError($query);
    return $query->fetchAll();
}




//$arr = [
//    'name' => 'maxi',
//    'surname' => 'danil',
//    'email' => 'poo@aad',
//    'password' => '1233',
//    'phone' => '123123121a',
//    'age' => 23
//];





















