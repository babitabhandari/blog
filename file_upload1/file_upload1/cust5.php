<?php 
// ini_set("allow_url_fopen", 1);
 require 'db.php';
//echo $d=date('Y-m-d');
//die();
 if(isset($_POST['upload'])){

if ($_FILES['csv']['size'] > 0 && $_FILES['csv']['size'] != 2) { 

 $file = $_FILES['csv']['tmp_name'];
//echo  filesize($file);

$target_dir = "uploads/";
$target_file = $target_dir . basename($file);
//echo $target_file;
// $target_file = $target_dir . basename($file);
$handle = fopen($file,"r"); 
//new code


// path where your CSV file is located


$c="";
$store=$_FILES["csv"]["name"];
//if(file_exists($target_dir.$store)){
  // die('File with that name already exists.');
//}
if(substr($store, -3) == 'csv' || substr($store, -4) == 'xlsx' || substr($store, -4) == 'xls'){
 move_uploaded_file($file, "uploads/" . $store);
            //echo "Stored in: " . "uploads/" . $store . "<br />";
 $continue = true;
$csv_fields = fgetcsv($handle,1000,",",'"');
$csv1= implode('',$csv_fields);
 
//  $csv_fields1= explode(',',$csv_fields);
// echo $csv_fields1;
if(!empty($csv_fields))

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
   
//if($num == 3){ 
for ($c=0; $c < $num; $c++) {
          
    
       echo "<div class='form-group'><table>"; 
     
echo "<tr>

 <td><input  type='text' value='".$csv_fields[$c]."'  class='textbox  form-control' id='textbox'></td>
 



 <td style='color:white;'><input type='checkbox'  name='check' value='".$csv_fields[$c]."' class='check checkbox-primary' data-placement='right' data-toggle='tooltip' title='On clicking, submit $csv_fields[$c] field in database' style='margin-left:5px;' ></td> 

<br>"; 

 echo "</tr></table></div>";
}
//}
// else{

// echo 'Please Upload a csv file atleast three columns';
// die();
// }


 

  echo "</div>";
echo "<div class='col-md-6' style='float:left;'>

        <h4>CSV File Information</h4><hr>";


echo "<table class='table table-striped table-bordered' style='margin-top:0px;'>\n\n";
// echo "<tr><th>Firstname</th><th>Lastname</th><th>Email</th></tr>";
 
if ($handle !== FALSE)
{
  
   echo '<table class="table table-striped table-bordered">';

    // Get headers
   
     
  //if (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
 // {
 

 //echo '<tr><th>'.$csv1.'</th></tr>';
   //  echo '<tr><th>'.implode('</td><td>', $data).'</td></tr>';
     
 // }

    // Get the rest
    echo '<tr>';
    foreach($csv_fields as $csv2){
    echo '<th>'.$csv2.'</th>';
    }
    echo '</tr>';
  while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
   {
 
     echo '<tr><td>'.implode('</td><td>', $data).'</td></tr>';
     
     }
  
    //fclose($handle);
   echo '</table>';
}
 
   
 

   
//if ($handle !== FALSE)
//{

   //echo "<table class='table table-striped table-bordered' style='margin-top:20px;'>\n\n";

 // Get headers
  // if (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
  // {
      //  echo '<tr><th>'.implode('</th><th>', $data).'</th></tr>';
  // }

    // Get the rest
  // while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
   // {
      // echo '<tr><td>'.implode('</td><td>', $data).'</td></tr>';
  //  }
  fclose($handle);
  // echo '</table>';
//}
 //while (($line = fgetcsv($handle,1000,",",'"')) !== false) {
   
        // echo "<tr>";
       // foreach ($line as $cell) {
                 //echo "<td>" . htmlspecialchars($cell) . "</td>";
       //  }
          //if ($l++ == 2) break;
        // echo "</tr>\n";
// }

echo "\n</table>";

     echo  "</div>

        </div>
        
       
</div>
<div style='text-align: center;'><input type='submit' name='submit' id='submit' value='submit' class=' btn btn-md btn btn-primary' style='margin-bottom:10px;margin-top:10px;background:#3F4C6B;opacity:1.4;color:white;width: 20%;border:0px;'></div>
       </div>
        ";
    
//fclose($handle);

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
