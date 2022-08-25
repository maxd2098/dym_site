<?php

include_once SITE_ROOT . "/app/database/db.php";

$memberShips = selectAllAnd('member_ships');
//che($memberShips);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_memsh']) && isset($_SESSION['email'])) {
    $memberShip = selectOneAnd('member_ships', ['id_memsh' => $_GET['id_memsh']]);
    //che($memberShip);
}







