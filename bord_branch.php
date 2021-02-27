<?php
	require_once('../common/common.php');
	$post=sanitize($_POST);

	$bord_code=$post['bordcode'];
	$post_name=$post['name'];
	$post_title=$post['title'];
	$post_comment=$post['comment'];

if($post_name==''|| $post_comment=='')
{
	print'入力がされていません';
	print'<form>';
	print'<input type="button" onclick="history.back()" value="戻る">';
	print'</form>';
}
else {
	
	$dsn='mysql:dbname=bord;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	$sql='INSERT INTO bord_post(bordcode,name,comment,title) VALUES (?,?,?,?)';
	$stmt=$dbh->prepare($sql);
	$data[]=$bord_code;
	$data[]=$post_name;
	$data[]=$post_comment;
	$data[]=$post_title; 
	
	$stmt->execute($data);
	
	$dbh = null;


	print'<input type="hidden" name="bordcode" value="'.$bord_code.'">';
	
	header('Location:bord_data.php?bordcode='.$bord_code); 
	exit();
} 
?>