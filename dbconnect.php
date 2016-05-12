<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbkeihi;charset=utf8mb4', 'root', 'root');
} catch (PDOException $e) {
    echo "Connect Error : ".$dbh->getMessage();
    die();
}
?>