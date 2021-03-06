<?php if($_SERVER["REQUEST_METHOD"]=="POST"){
# DBホスト接続
require('dbconnect.php');

# 値セット
$stmt=$dbh->prepare("UPDATE transport_expenses_details set moving_date =?,origin=?,destination=?,round_trip=?,cost=?,modified=? WHERE id = ?");

$stmt->bindParam(1, $_POST['moving_date'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['origin'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['destination'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['round_trip'], PDO::PARAM_INT);
$stmt->bindParam(5, $_POST['cost'], PDO::PARAM_INT);
$now = date('Y-m-d H:i:s', time());
$stmt->bindParam(6, $now, PDO::PARAM_STR);
$stmt->bindParam(7, $_POST['id'], PDO::PARAM_INT);
$stmt->execute();
session_start();
$_SESSION['keihi_update'] = 1;

header('Location: ./');
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

<?php
# DBホスト接続
require('dbconnect.php');

$id = $_REQUEST['id'];
$data = $dbh->query("SELECT * FROM transport_expenses_details WHERE id = ".$id);
$row = $data->fetch(PDO::FETCH_ASSOC);

?>
<title>交通費精算システム 交通費 編集</title>
</head>
<body>
【交通費精算システム】交通費 編集<br>
<form action="update.php" method="post">
　<table><tr><th>日付</th><td><input type="date" name="moving_date" value=<?php echo('"'.htmlspecialchars($row['moving_date']).'"'); ?> /></td></tr>
　<tr><th>出発地</th><td><input type="text" name="origin" value=<?php echo('"'.htmlspecialchars($row['origin']).'"'); ?> /></td></tr>
　<tr><th>目的地</th><td><input type="text" name="destination" value=<?php echo('"'.htmlspecialchars($row['destination']).'"'); ?> /></td></tr>
　<tr><th>往復/片道</th><td><select name="round_trip"/>
	<option value="0" <?php if($row['round_trip']=="0"){echo("selected");} ?>>片道</option>
	<option value="1" <?php if($row['round_trip']=="1"){echo("selected");} ?>>往復</option>
	</select></td></tr>
　<tr><th>金額</th><td><input type="number" name="cost" value="<?php echo(htmlspecialchars($row['cost'])); ?>" /></td></tr></table>
  <br>
  <a href="./">戻る</a>
　<input type="hidden" name="id" value="<?php echo(htmlspecialchars($id)); ?>" />
  <input type="submit" value="保存" />
</form>
</body>
</html>
<?php
}