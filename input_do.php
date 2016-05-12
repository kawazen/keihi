
<?php
echo '【交通費精算システム】交通費保存完了<br><br>';

# DBホスト接続
require('dbconnect.php');

# 値セット
$stmt=$dbh->prepare("INSERT INTO transport_expenses_details(moving_date,origin,destination,round_trip,cost,created,modified) VALUES (?,?,?,?,?,?,?)");

$stmt->bindParam(1, $_POST['moving_date'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['origin'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['destination'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['round_trip'], PDO::PARAM_INT);
$stmt->bindParam(5, $_POST['cost'], PDO::PARAM_INT);
$now = date('Y-m-d H:i:s', time());
$stmt->bindParam(6, $now, PDO::PARAM_STR);
$stmt->bindParam(7, $now, PDO::PARAM_STR);
$stmt->execute();
?>

<p>交通費を保存しました。</p>
<p><a href="./">一覧へ戻る</a></p>

