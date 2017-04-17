<?php 
session_start();
require 'db1.php';

//$link = mysqli_connect("localhost", "manishm2_screening", "screening123", "manishm2_candidate_screening");

$check = $_POST['check'];
//print_r($check);



$rid= $_SESSION['recruiterid'];
 $query2="select username from tbl_registration where reg_id='$rid'";
 $result=mysqli_query($link,$query2) or die("Error: ".mysqli_error($link));

     $row = mysqli_fetch_array($result);
   $rec1= ucwords($row['username']);
   $rec= tab_.$rec1;
   
   //echo $rec;

$columns_str1 = $check;
 $columns_str=array_map('strtolower', $columns_str1);
//print_r($columns_str);


$colQuery = '`id` int(11) NOT NULL AUTO_INCREMENT,';

foreach($columns_str as $colls)
{
   $colQuery .= "
      `$colls` VARCHAR(300),";



}
$colQuery .= "
PRIMARY KEY (`id`),`date` date NOT NULL,`validate_date` date NULL,`expire_date` date  NULL ,`status` BOOLEAN  NULL DEFAULT 0,`expire_count` BOOLEAN  NULL DEFAULT 0";
$link->query("CREATE TABLE $rec ( $colQuery ) ENGINE = InnoDB;");

$alter= mysqli_query($link,"ALTER table  $rec ADD UNIQUE(email)");




  $store= $_POST['store'];
  
  //$tbl_fields = $check; 
   $tbl_fields= $oldval;
//print_r($tbl_fields);
 

  $handle = fopen("uploads/".$store,"r"); 
   $check12 = fgetcsv($handle,1000,",",'"'); 
  
//print_r($check12);
   $tbl_fields1 = array_intersect($check12,$check);
  
//print_r($tbl_fields1); 



 $arr= array_keys($tbl_fields1);
//print_r($arr);
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
 $date = date('Y-m-d');
 $expire_date = date('Y-m-d', strtotime($date . ' +1 day'));
//print_r($date);
//$array2=array_push($array1,date("Y-M-D"));
//print_r($array2);
$matstring=implode("','", $array1);
$matstring="'".$matstring."'";
//print_r($matstring);


//echo  $r="CREATE TRIGGER `email_validate`
 // BEFORE INSERT ON `$rec`
 // FOR EACH ROW
//BEGIN
  //IF NEW.`email` NOT LIKE '%_@%_.__%' THEN
    //SIGNAL SQLSTATE VALUE '45000'
    //  SET MESSAGE_TEXT = '[table:$rec] - `email` column is not valid';
 // END IF;
//END;";
 //mysqli_query($link,$r);


$f=implode(',', $check);
 $checking=mysqli_query($link,"select * from $rec where email='$email'");
    $checkrows=mysqli_num_rows($checking);

   if($checkrows>0) {
   
  echo 'this email already exists';
  
   }
    else { 
$q="INSERT IGNORE INTO $rec ($f,date) VALUES ($matstring,'$date')";
 mysqli_query($link,$q);

   unset($array1);

 
}

} 
$dup=mysqli_affected_rows($link);
if($dup == 0){
    echo  "duplicate values cant be inserted";
  }
mysqli_close($link); 
?>