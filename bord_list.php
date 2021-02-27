<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> E-sportsBBS</title>
		<meta name="description" content="E-sportsファンが集う場所">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://unpkg.com/ress/dist/ress.min.css" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="images/icon.png">
	</head>
	<body>

<?php
	$dsn='mysql:dbname=bord;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	$sql='SELECT code,name FROM bord_name WHERE 1';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();
	
	$dbh = null;


?>

<header>
掲示板一覧
</header>

<?php while(true)
{ 
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
if($rec==false)
{ 
break;   } ?>

<ul>
<li>
<?php print'<a href="bord_data.php?bordcode='.$rec['code'].'">';
	print $rec['name'];
	print'</a>';
} ?> 
<li>
</ul>
<a href="bord_add.php">掲示板作成</a><br/>
<a href="index.html">メニューへ戻る</a>
</body>
</html>