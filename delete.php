<?php
# DBホスト接続
require('dbconnect.php');
$id = $_POST['id'];

// $stmt = $dbh->query("DELETE FROM transport_expenses_details WHERE id = ".mysql_real_escape_string($id));	//これだとMYSQL依存

// クエリを送信する 基本としてこちら(PreparedStatement)を使っていく
$sql = "DELETE FROM transport_expenses_details WHERE id = ?";
$stmt = $dbh->prepare($sql);
$stmt -> bindValue(1, $id, PDO::PARAM_INT);
$stmt -> execute();

session_start();
$_SESSION['keihi_del'] = 1;

header('Location: ./');
?>


