<?php 
 require 'db.php';
//echo $d=date('Y-m-d');
//die();
 if(isset($_POST['upload'])){

if ($_FILES['csv']['size'] > 0 && $_FILES['csv']['size'] != 2) { 

 $file = $_FILES['csv']['tmp_name'];
//echo  filesize($file);

$target_dir = "uploads/";
$target_file = $target_dir . basename($file);
// $target_file = $target_dir . basename($file);
$handle = fopen($file,"r"); 
//new code


// path where your CSV file is located


$c="";
$store=$_FILES["csv"]["name"];
if(substr($store, -3) == 'csv' || substr($store, -4) == 'xlsx' || substr($store, -3) == 'xls'){
 move_uploaded_file($file, "uploads/" . $store);
            //echo "Stored in: " . "uploads/" . $store . "<br />";
 $continue = true;
$csv_fields = fgetcsv($handle,1000,",",'"');
if(!empty($csv_fields))

//print_r($csv_fields);
$order= array('firstname','lastname','email');
$order2= array('email');
$order1= array_map('strtolower', $csv_fields);
//print_r($order1);

 if(($order === $order1) || ($order2 === $order1)){
  //echo 'order match';


  //if($csv_fields !== FALSE) {

        echo '<div class="container panel" style="
    color: black;background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(237,237,237,1) 100%);margin-top:100px;border:2px solid;">
        <div class="row" >


<div class="col-md-12" >
        <div class="col-md-6" style="float:left;">
      <h4> List of CSV File Fields</h4><hr>';

   $num = count($csv_fields);     
   

for ($c=0; $c < $num; $c++) {
          
    
       echo "<div class='form-group'><table>"; 
     
echo "<tr>

 <td><input  type='text' value='".$csv_fields[$c]."'  class='textbox  form-control' id='textbox'></td>
 



 <td style='color:white;'><input type='checkbox'  name='check' value='".$csv_fields[$c]."' class='check checkbox-primary' data-placement='right' data-toggle='tooltip' title='On clicking, submit $csv_fields[$c] field in database' style='margin-left:5px;' ></td> 

<br>"; 

 echo "</tr></table></div>";
}



  

  echo "</div>";
echo "<div class='col-md-6' style='float:left;'>

        <h4>Preview of CSV File </h4><hr>";


echo "<table class='table  table-bordered' style='margin-top:20px;'>\n\n";
echo "<tr><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";
 $l = 0;
 
while (($line = fgetcsv($handle)) !== false) {
      echo "<tr>";
        foreach ($line as $cell) {
              echo "<td>" . htmlspecialchars($cell) . "</td>";
       }
         if ($l++ == 3) break;
      echo "</tr>\n";
}

echo "\n</table>";

     echo  "</div>

        </div>
        
       
</div>
<div style='text-align: center;'><input type='submit' name='submit' id='submit' value='submit' class=' btn btn-md btn btn-primary' style='margin-bottom:10px;margin-top:10px;background:#3F4C6B;opacity:1.4;color:white;width: 20%;border:0px;'></div>
       </div>
        ";
    
fclose($handle);

 // }
  
 
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>";
  echo "<script language='javascript'>
  $(function(){
    $('.form-signin').css('display','none');
  });

 </script>";
echo "<script language='javascript'>
  $(function(){
    $('.instructions').css('display','none');
  });

 </script>";
 echo "<script language='javascript'>
 $(document).ready(function(){
    $('.check').tooltip();
});
 </script>";

}
else{
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>";
 echo  "<script language='javascript'>
 $(document).ready(function(){
 
  window.location.href = 'index.php?g1=fail';
  });
   </script>";
// Header("location:index.php");
 //die();
   //echo 'order not match';
}
}
else{
 $show1="Please Upload a file in .csv, .xlsx or xls format";
// //echo "Please select csv  file";
}
}
elseif($_FILES['csv']['size'] > 0 && $_FILES['csv']['size'] == 2) { 
  echo 'cant upload select a file';
}
elseif($_FILES['csv']['size'] < 0 && $_FILES['csv']['size'] == 0) {
  $show1= 'please select a file';
}
else{
  
}

}


?>
