<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>交通費精算システム 明細詳細</title>
</head>
<body>



<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=dbkeihi', 'root', 'root');
} catch (PDOException $e) {
    print "Connect Error : ".$dbh->getMessage();
    die();
}




?>
</body>
</html>