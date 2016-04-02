<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>交通費精算システム</title>
</head>
<body>

<?php
echo '【交通費精算システム】一覧</BR></BR>';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbkeihi;charset=utf8mb4', 'root', 'root');
} catch (PDOException $e) {
    echo "Connect Error : ".$dbh->getMessage();
    die();
}

echo '<table><tr><th>日付</th><th>出発地</th><th>目的地</th><th>往復/片道</th><th>金額</th><th>作成日時</th><th>更新日時</th>'.PHP_EOL;
foreach( $dbh->query('SELECT * FROM transport_expenses_details') as $row) {
    echo '<tr><td>'.htmlspecialchars($row['moving_date']).'</td>';	//日付
    echo '<td>'.htmlspecialchars($row['origin']).'</td>';	//出発地
    echo '<td>'.htmlspecialchars($row['destination']).'</td>';	//目的地
    if($row['round_trip'] == 0){
    	echo '<td>片道</td>';
    }else{
    	echo '<td>往復</td>';
    };//1:往復 0:片道
    echo '<td>'.htmlspecialchars($row['cost']).'円</td>';	//金額
    echo '<td>'.htmlspecialchars($row['created']).'</td>';	//作成日時
    echo '<td>'.htmlspecialchars($row['modified']).'</td></tr>'.PHP_EOL;	//更新日時
}

?>


</body>
</html>