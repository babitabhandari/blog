<?php
error_reporting(E_ALL^E_DEPRECATED);
$conn=mysql_connect("localhost","root","") or die("Could not connect");
mysql_select_db("send",$conn) or die("could not connect database");
?>