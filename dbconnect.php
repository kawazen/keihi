<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbkeihi;charset=utf8mb4', 'root', 'root');
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	//エラー内容を返すようになる
	$dbh -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);			//Falseで都度DBへ通信となる(セキュリティ)

} catch (PDOException $e) {
    echo "Connect Error : ".$dbh->getMessage();
    die();
}
?>