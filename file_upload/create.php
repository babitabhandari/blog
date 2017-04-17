<?php 

session_start();
$link = mysqli_connect("localhost", "manishm2_screening", "screening123", "manishm2_candidate_screening");



$rid= $_SESSION['recruiterid'];
 $query2="select username from tbl_registration where reg_id='$rid'";
 $result=mysqli_query($link,$query2) or die("Error: ".mysqli_error($link));

     $row = mysqli_fetch_array($result);
   $rec= ucwords($row['username']);
   //echo $rec;

    
$columns_str=array("name","lastname","address");
//$st=implode(',',$columns_str);
//echo $st;

//$cols = str_split($columns_str);
//echo $cols;
$colQuery = '`id` int(11) NOT NULL AUTO_INCREMENT,';
foreach($columns_str as $col)
{
   $colQuery .= "
       `$col` VARCHAR(300),";
}
$colQuery .= "
PRIMARY KEY (`id`),`date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,`status` BOOLEAN DEFAULT NULL";
$link->query("CREATE TABLE $rec ( $colQuery ) ENGINE = InnoDB;")
    

//$sql = "CREATE TABLE $rec ( ". "tutorial_id INT NOT NULL AUTO_INCREMENT, ". "tutorial_title VARCHAR(100) //NOT NULL, ". "tutorial_author VARCHAR(40) NOT NULL, ". "submission_date DATE, ". "PRIMARY KEY ( tutorial_id //)); ";
 
//$retval = mysqli_query( $link,$sql ); 
//if(! $retval ) {
//die('Could not create table: ' . mysqli_error($link));
// } 
//echo "Table created successfully\n";
?>