
<?php
echo '【交通費精算システム】一覧<br><br>';

try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbkeihi;charset=utf8mb4', 'root', 'root');
} catch (PDOException $e) {
    echo "Connect Error : ".$dbh->getMessage();
    die();
}

$stmt=$dbh -> prepare("INSERT INTO transport_expenses_details VALUES(?,?,?,?,?,?,?)");
$stmt->bindParam(':moving_date', $_POST['moving_date'], PDO::PARAM_STR);
$stmt->bindParam(':origin', $_POST['origin'], PDO::PARAM_STR);
$stmt->bindParam(':destination', $_POST['destination'], PDO::PARAM_STR);
$stmt->bindParam(':round_trip', $_POST['round_trip'], PDO::PARAM_INT);
$stmt->bindParam(':cost', $_POST['cost'], PDO::PARAM_INT);
$stmt->bindParam(':created', date('Y-m-d H:i:s', time()), PDO::PARAM_INT);
$stmt->bindParam(':modified', date('Y-m-d H:i:s', time()), PDO::PARAM_INT);

$stmt->execute();
echo $_POST['moving_date']; echo "<BR>"; 
echo date('Y-m-d H:i:s', time())."<br>";
echo '保存しました。';
?>