<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>E-sports掲示板</title>
	</head>
	<body>
	<?php
	require_once('../common/common.php');
	$post=sanitize($_POST);

	$bord_name=$post['name'];

if($bord_name=='')
{
	print'掲示板名が入力されていません<br/>';
}
else
{
	print'掲示板名<br>';
	print $bord_name;
	print'<br/>';
	print'<form method="post" action="bord_add_done.php">';
	print'<input type="hidden" name="name" value="'.$bord_name.'">';
	print'<br/>';
	print'<input type="button" onclick="history.back" value="戻る">';
	print'<input type="submit" value="OK">';
	print'</form>';
}
	?>

	</body>
</html>