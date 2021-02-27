<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>E-sports掲示板</title>
	</head>
	<body>
		投稿フォーム<br/>
		<br/>
	<?php
	require_once('../common/common.php');
	$post=sanitize($_POST);

	$bord_code=$post['bordcode'];

	print'<form method="post" action="bord_branch.php">';
	print'お名前<br/>';
	print'<input type="text" name="name" style="width:200px"><br/>';
	print'タイトル<br/>';
	print'<input type="text" name="title" style="width:400px"><br/>';
	print'本文<br/>';
	print'<textarea name="comment" rows="25" cols="120"></textarea><br/>';
	print'<input type="submit" value="OK">';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'<input type="hidden" name="bordcode" value="'.$bord_code.'">';
	print'</form>';
	?>
	

	</body>
</html>