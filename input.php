<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>交通費精算システム 交通費 新規登録</title>
</head>
<body>
【交通費精算システム】交通費 新規登録<br>
<form action="input_do.php" method="post">
　<table><tr><th>日付</th><td><input type="date" name="moving_date" value=<?php echo(date('Y-m-d', time())); ?> /></td></tr>
　<tr><th>出発地</th><td><input type="text" name="origin" value=""/></td></tr>
　<tr><th>目的地</th><td><input type="text" name="destination" value="" /></td></tr>
　<tr><th>往復/片道</th><td><select name="round_trip"/>
	<option value="0">片道</option>
	<option value="1">往復</option>
	</select></td></tr>
　<tr><th>金額</th><td><input type="number" name="cost" value="" /></td></tr></table>
  <br>
  <a href="./">戻る</a>
  <input type="submit" value="保存" />　
</form>
</body>
</html>