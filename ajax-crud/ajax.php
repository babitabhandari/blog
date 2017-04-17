<?php
 require 'db.php';

$title1 = $_POST['title'];
echo $title1;
$description1 = $_POST['description'];
echo $description1;
$query= "insert into news values('null','$title1','$description1')";
$res=mysql_query($query);
$res1=mysql_affected_rows();

if($res){

	echo 'inserted';
// $siginup_sucess_array = array('Sucess');
// echo json_encode($siginup_sucess_array);
}
if($res1 == 0){
	echo 'rows not effected';
}
mysql_close($connection);
?>