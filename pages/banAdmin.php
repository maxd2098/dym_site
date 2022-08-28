<?php

if(empty($_SESSION['status']) || $_SESSION['status'] == 0 || $_SESSION['status'] == 1) {
    echo "Вы не админ, вам недоступен данный контент";
    exit();
}
