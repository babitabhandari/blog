<?php 
session_start();
require 'db1.php';

//$link = mysqli_connect("localhost", "manishm2_screening", "screening123", "manishm2_candidate_screening");

$check = $_POST['check'];
print_r($check);



$rid= $_SESSION['recruiterid'];
 $query2="select username from tbl_registration where reg_id='$rid'";
 $result=mysqli_query($link,$query2) or die("Error: ".mysqli_error($link));

     $row = mysqli_fetch_array($result);
   $rec= ucwords($row['username']);
   //echo $rec;

$columns_str = $check;
print_r($columns_str);


$colQuery = '`id` int(11) NOT NULL AUTO_INCREMENT,';

foreach($columns_str as $colls)
{
   $colQuery .= "
      `$colls` VARCHAR(300),";

}
$colQuery .= "
PRIMARY KEY (`id`),`date`datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,`expire_date`datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,`status` BOOLEAN  NULL DEFAULT 0";
$link->query("CREATE TABLE $rec ( $colQuery ) ENGINE = InnoDB;");





  $store= $_POST['store'];
  
  //$tbl_fields = $check; 
   $tbl_fields= $oldval;
print_r($tbl_fields);
 

  $handle = fopen("uploads/".$store,"r"); 
   $check12 = fgetcsv($handle,1000,",",'"'); 
  
print_r($check12);
   $tbl_fields1 = array_intersect($check12,$check);
  
print_r($tbl_fields1); 



 $arr= array_keys($tbl_fields1);
print_r($arr);
$array1=array();


//print "<table>\n";
while($csv_line = fgetcsv($handle,1024)) {
  
    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
    if(in_array($i, $arr))
    {
  
        $array1[]= $csv_line[$i];
        
        }
 }
 date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d H:i:s');
 $expire_date = date('Y-m-d H:i:s', strtotime($date . ' +1 day'));
//print_r($date);
//$array2=array_push($array1,date("Y-M-D"));
//print_r($array2);
$matstring=implode("','", $array1);
$matstring="'".$matstring."'";
//print_r($matstring);




$f=implode(',', $check);
 
echo $q="INSERT  INTO $rec ($f,date,expire_date) VALUES ($matstring,'$date','$expire_date')";
 mysqli_query($link,$q);
   unset($array1);

 //if($q){
   //  echo  "data inserted";
  // }

}  
?>