
<?php
echo '【交通費精算システム】交通費更新完了<br><br>';

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
?>

<p>交通費を更新しました。</p>
<p><a href="./">一覧へ戻る</a></p>

