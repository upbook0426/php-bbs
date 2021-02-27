<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>E-sports掲示板</title>
	</head>
	<body>
	<?php
	
/*try
	{
*/
	require_once('../common/common.php');
	$post=sanitize($_POST);

	$bord_name=$post['name'];
	
	$dsn='mysql:dbname=bord;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	$sql='INSERT INTO bord_name(name) VALUES (?)';
	$stmt=$dbh->prepare($sql);
	$data[]=$bord_name;
	$stmt->execute($data);
	
	$dbh=null;

	print $bord_name;
	print'を追加しました。<br/>';

	
/* 
	catch (Exception $e)
	{
	print'ただいまデーターベースにエラーが発生しております。<br/>';
	print'復旧まで少々お時間下さいますようお願い致します。<br/>';
	}
*/
	?>
	<a href="bord_list.php">掲示板一覧へ</a>

	</body>
</html>