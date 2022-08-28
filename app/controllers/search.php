<?php

include_once SITE_ROOT . "/app/database/db.php";
$trainers = selectAllAnd('users', ['status' => 1]);

$result = '';
$category = '';
$search = '';

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['button_search'])) {
    $search = $_POST['search'];
    $category = $_POST['category'];
    if($_POST['category'] == 'trainers') {
        $result = selectResultFromSearch('users', $search);
    } elseif($_POST['category'] == 'programs') {
        $result = selectResultFromSearch('programs', $search);
    } else {
        $result = selectResultFromSearch('forum', $search);
    }
}
