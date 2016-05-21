<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>交通費精算システム</title>
</head>
<body>

<?php
session_start();
if(isset($_SESSION['keihi_del'])){
    echo('交通費を削除しました。</BR>');
    unset($_SESSION['keihi_del']);
}elseif(isset($_SESSION['keihi_update'])){
    echo('交通費を更新しました。</BR>');
    unset($_SESSION['keihi_update']);
}


# DBホスト接続
require('dbconnect.php');
?>

<p>【交通費精算システム】一覧　<a href="./">交通費一覧</a>　<a href="user.php">ユーザー一覧</a></p>
<p><a href="input.php">交通費入力</a></p>

<table><tr><th>日付</th><th>出発地</th><th>目的地</th><th>往復/片道</th><th>金額</th><th>作成日時</th><th>更新日時</th></BR>
<?php
foreach( $dbh->query('SELECT * FROM transport_expenses_details ORDER BY moving_date DESC') as $row) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['moving_date']);  //日付 ?></td>
        <td><?php echo htmlspecialchars($row['origin']);       //出発地 ?></td>
        <td><?php echo htmlspecialchars($row['destination']);  //目的地 ?></td>
    <?php if($row['round_trip'] == 0){ ?>
    	<td>片道</td>
    <?php }else{ ?>
    	<td>往復</td>
    <?php }; //1:往復 0:片道 ?>
        <td><?php echo htmlspecialchars($row['cost']);       //金額?>円</td>
        <td><?php echo htmlspecialchars($row['created']);    //作成日時?></td>
        <td><?php echo htmlspecialchars($row['modified']);   //更新日時?></td>
        <td><a href=update.php?id=<?php echo htmlspecialchars($row['id']);    //更新日時?>>編集</a></td>
        <td><form action='delete.php' method='post'><INPUT TYPE='hidden' NAME='id' VALUE='<?php echo htmlspecialchars($row['id']);?>'><input type='submit' value='削除' /></form>
<?php }
?>
</body>
</html>