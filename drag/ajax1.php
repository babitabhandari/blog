<?php require 'db1.php';

// $drop= $_POST['drop'];
// print_r($drop);


$check = $_POST['check'];
print_r($check);

$hiddentxtbox=$_POST['hiddentxtbox'];
print_r($hiddentxtbox);
 $hiddentxtbox=array_values(array_filter($hiddentxtbox));
$olddropval=$_POST['olddropval'];
print_r($hiddentxtbox);

  $oldval = $_POST['oldval']; 
 print_r($oldval);
 
$dynamic_text = $_POST['dynamic_text'];

$dynamic_text=array_values(array_filter($dynamic_text));

 print_r($dynamic_text);
 

if(in_array('text', $oldval)){
   unset($oldval[array_search('text', $oldval)]);
   $mrg= array('text');
 $oldval= array_merge($oldval, $mrg);
   }

   

   if(in_array('text', $hiddentxtbox)){
   unset($hiddentxtbox[array_search('text', $hiddentxtbox)]);
$hiddentxtbox= $oldval;
   }
   
 // print_r($hiddentxtbox);
  
//   if(in_array('text', $check)){
//    unset($check[array_search('text', $check)]);
// $check= $hiddentxtbox;
//    }
//    print_r($check);
$needle = "text";

$j=0;
for($i=0;$i<count($check);$i++) {
   if($check[$i] == $needle) {
    
   $check[$i] = $dynamic_text[$j];
   
   $j++;
   }
   }
//print_r($check);



if($olddropval!=""){
    // $oldval=$olddropval;
  
    $oldval=array_merge($oldval,$olddropval);
    if (in_array('text', $oldval)) { unset($oldval[array_search('text',$oldval)]); 
     
  }
  
  }
 

print_r($oldval);
  $table  = 'user';
$column = $check;

 //old value database me old custom field se save kr ra hai 



 foreach($check as $col){
  //$check=$hiddentxtbox;
 $add = "ALTER TABLE $table ADD $col VARCHAR(255) NOT NULL";
 mysqli_query($link,$add);
 }

   $store= $_POST['store'];
  
  //$tbl_fields = $check; 
   $tbl_fields= $oldval;
print_r($tbl_fields);
 

  $handle = fopen("D:/babita/wamp/www/drag/uploads/".$store,"r"); 
   $check12 = fgetcsv($handle,1000,",",'"'); 
  
 print_r($check12);
   $tbl_fields1 = array_intersect($check12,$oldval);
  
  print_r($tbl_fields1); 



 $arr= array_keys($tbl_fields1);
print_r($arr);
$array1=array();


//print "<table>\n";
while($csv_line = fgetcsv($handle,1024)) {
  print_r($csv_line);
  //print_r(strlen($csv_line));

   // print '<tr>';
 // print '<td>';
    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
    if(in_array($i, $arr))
    {
  
        $array1[]= $csv_line[$i];
        }
 }
print_r($array1);
$matstring=implode("','", $array1);
$matstring="'".$matstring."'";

 print_r($matstring);

 print_r(strlen($matstring));
 


$f=implode(',', $check);
$sql="SELECT column_name, 
       character_maximum_length 
FROM   information_schema.columns 
WHERE  table_name = 'user' 
       AND column_name = 'address'"; 
 $r= mysql_query($sql);
  $v=mysql_fetch_row($r);
  //echo $v[0];
 //echo $v[1];
//if(strlen($csv_line) < $v[1]){
 echo $q="INSERT  INTO `user` ($f) VALUES ($matstring)";
  mysqli_query($link,$q);
   unset($array1);

// if($q){
//     echo  "data inserted";
//   }
//}
//}
// else{
//   echo "please increase your column lenght";
 
// }
}  
?>