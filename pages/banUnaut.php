<?php

if($_SESSION['status'] === null) {
    echo "Вы не авторизованы, вам недоступен данный контент";
    exit();
}