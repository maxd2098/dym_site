<?php

include_once SITE_ROOT . "/app/database/db.php";
$trainers = selectAllAnd('users', ['status' => 1]);

$result = '';
$category = '';
$search = '';

if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['button_search'])) {
    $search = $_GET['search'];
    $category = $_GET['category'];
    if($_GET['category'] == 'trainers') {
        $result = selectResultFromSearch('users', $search);
    } elseif($_GET['category'] == 'programs') {
        $result = selectResultFromSearch('programs', $search);
    } else {
        $result = selectResultFromSearch('forum', $search);
    }
}
