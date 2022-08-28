<?php

if($_SESSION['status'] == '0') {
    echo "Вы клиент, вам недоступен данный контент";
    exit();
}