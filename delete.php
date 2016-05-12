
<?php
# DBホスト接続
require('dbconnect.php');

$id = $_REQUEST['id'];

$stmt = $dbh->query("DELETE FROM transport_expenses_details WHERE id = ".mysql_real_escape_string($id));

// クエリを送信する こっちでも可能
// $sql = "DELETE FROM transport_expenses_details WHERE id = ?";
// $stmt = $dbh->prepare($sql);
// $stmt -> bindValue(1, $id, PDO::PARAM_INT);
// $stmt -> execute();
?>

<p>交通費を削除しました。</p>
<p><a href="./">一覧へ戻る</a></p>

