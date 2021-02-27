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
	
	$bord_code=$_GET['bordcode'];

	$dsn='mysql:dbname=bord;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	$sql='SELECT name FROM bord_name WHERE code=?';
	$stmt=$dbh->prepare($sql);
	$data[]=$bord_code;
	$stmt->execute($data);
	
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	$bord_name=$rec['name'];

	$sql='SELECT name,title,comment FROM bord_post WHERE bordcode='.$bord_code.'';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();
	
	$dbh = null;
?>

<h2 class="bord_data">
掲示板名:
<?php print $bord_name;
	print'<br/>'?>
</h2>
<br/>


<form method="post" action="bord_post.php">
<button type="submit" class="post_button">投稿</button>
<?php print'<input type="hidden"name="bordcode" value="'.$bord_code.'">'; ?>
</form>
<br/>




	<p class="border"></p>
<?php
	while(true)
	{
	$rec=$stmt->fetch(PDO::FETCH_ASSOC);
	if($rec==false)
	{
		break;
	} ?>


<div class="post_comment">
<?php
	print'名前';
	print$rec['name'];
	print'<br/>';
	print$rec['title'];
	print'<br/>';
	print$rec['comment'];
	print'<br/>';?>
</div>
	<p class="border"></p>
<?php
}
?>

<br/>
<p class="left20px">
<a href="bord_list.php">掲示板一覧へ戻る</a>
</p>
</body>
</html>