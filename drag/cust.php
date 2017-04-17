<?php 

   require 'db.php';


  if(isset($_POST['upload'])){
if ($_FILES['csv']['size'] > 0) { 
 //  $mimes = array('text/csv');
 // if(in_array($_FILES['csv']['type'],$mimes)){
   
$columnnames='';
$i=0;
$numcolumn='';
$show= '';
$numcolumn1='';
 $columnnames1='';
$j=0;

$file = $_FILES['csv']['tmp_name'];
// if($file["extension"] != "csv")
//   {
//     echo "Please select CSV file";
//    header("location:ind1.php");
//     //exit;
//   }
$target_dir = "uploads/";
$target_file = $target_dir . basename($file);
// $target_file = $target_dir . basename($file);
$handle = fopen($file,"r"); 


$store=$_FILES["csv"]["name"];
if(substr($store, -3) == 'csv'){
 move_uploaded_file($file, "uploads/" . $store);
            //echo "Stored in: " . "uploads/" . $store . "<br />";
$csv_fields = fgetcsv($handle,1000,",",'"'); 


$arr12=array();
$after = array();
$sql = "SHOW COLUMNS FROM user";

 $result = mysql_query($sql);

while($row = mysql_fetch_assoc($result)){

$arr12[]=$row['Field'];

 
}

foreach($arr12 as $v){
    $after[] = implode(' ', array_map('ucfirst', explode('_', $v)));
    // $after1= explode($after);

}
$af=implode(',' , $after);

// /echo $af;

//print_r($after);
//print_r($arr);
$tbl_fields=array_slice($arr12, 1);
$array1 = $csv_fields;
$array2 = $tbl_fields; 

//$c=implode(" ",$array1);
//print_r($c);
//print_r($array2);
$words1 =  array_unique($array1);
//print_r($words1)."<br>";

$words2 =  array_unique($array2);
//print_r($words2)."<br>";
$default=array();
// if (count($array1)>$array2){
//        $error=true;
       
//    }
$intersection = array_intersect($words1, $words2);

 $intersection1 = array_diff($words1, $words2);

$merge= array_merge($intersection, $intersection1);

usort($merge, function($a, $b) use ($words1){
   // sort using the numeric index of the second array
   $valA = array_search($a, $words1);
   $valB = array_search($b, $words1);

   // move items that don't match to end
   if ($valA === false)
       return -1;
   if ($valB === false)
       return 0;

   if ($valA > $valB)
       return 1;
   if ($valA < $valB)
       return -1;
   return 0;
});
//print_r($merge);
$row = 1;
$f = $handle;


//$tbl_fields = array('first_name','last_name','email');
if ($handle !== FALSE) {

  //if($csv_fields !== FALSE) {
        echo '<div class="container panel" style="background:#F5F7FA;">
        <div class="row" >

        <div class="col-md-6" style="float:left;">
      
                
                <h4>CSV Fields</h4>';
        
   // echo "<div style='color:red;'>Please check the column headers below to confirm we've labeled them correctly.</div>";

// foreach($merge as $a)
// {
foreach($merge as $a)
{
  if(in_array($a,$array2)){
  
    // if($columnnames == $a){
       echo "<div class='form-group'><table>"; 
     
echo "<tr>

 <td><input  type='text' value='".$a."'  class='textbox  form-control' id='textbox'></td>
<td><input  type='hidden' value='".$a."'  class='textbox2  form-control' id='textbox2'></td>

<td><input type='hidden' id='newhiddenBox' class='newhiddenBox' value='".$a."'></td>


<br>"; 

 echo "</tr></table></div>";
 }
  

else{
  echo "<div class='form-group'><table><tr><td>"; 
  echo "<td><input  type='text' value='".$a."'  class='textbox tt form-control' id='textbox'></td>
    <td><div style='color:red;width:200px;margin-left:4px;'>The $a Field does not match with database</div></td>

    <td><input  type='hidden' value='".$a."'  class='textbox1 form-control' id='textbox1'></td>
<td><input type='hidden' id='newhiddenBox'class='newhiddenBox' value='".$a."'></td>  

        

</tr></table></div>";
}
}

  echo "<input type='submit' name='submit' id='submit' value='submit' class='col-md-3 btn btn-md btn btn-primary' style='float:right;margin-bottom:30px;'></div>";
echo "<div class='col-md-6' style='float:left;'>
<span class='glyphicon glyphicon-remove btn' style='float:right;'></span>
        <h4>Database Fields</h4>";
 foreach($merge as $a)
{
  if(in_array($a,$array2)){
  
    // if($columnnames == $a){
       echo "<div class='form-group'><table>"; 
     
echo "<tr><td>
<select name='drop[]' class='select_drop textbox textbox1 form-control' id='select_drop' style='width:200px;'>"; 
          
         echo "<option  value='".$a."'>$a</option>";
       
         echo "<optgroup label='database headers'>"; 
        
         $res = mysql_query('select * from user');
$numcolumn = mysql_num_fields($res);

for ( $i = 1; $i < $numcolumn; $i++ ) {
            $columnnames = mysql_field_name($res, $i);
            
            echo '<option value="'.$columnnames.'" class="d ">'.$columnnames.'</option>';
           
    // $after1= explode($after);

    
   
          } 

         echo "</optgroup></td>";

echo "
<td><input  type='hidden' value='".$a."'  class='textbox2  form-control' id='textbox2'></td>

<td><input type='hidden' id='newhiddenBox' class='newhiddenBox' value='".$a."'></td>
 <td><input type='checkbox'  name='check' value='".$a."' class='check checkbox-primary' >Add Column</td> 

<br>"; 

 echo "</select></tr></table></div>";
 }
  

else{
  echo "<div class='form-group'><table><tr><td><select name='drop[]' class='drop  textbox  hiddentxtbox form-control' >"; 
      
         
          
        echo "<optgroup selected label='newtextfields'>
        <option value=''>Add Field or Choose</option>
         <option value='text'>Add new Field</option>
         
         </optgroup>
         <optgroup label='database headers' class='hd'>"; 
        
         $res = mysql_query('select * from user');
$numcolumn = mysql_num_fields($res);
for ( $i = 1; $i < $numcolumn; $i++ ) {

            $columnnames = mysql_field_name($res, $i);
            echo '<option value="'.$columnnames.'" >'.$columnnames.'</option>';
          
          } 
         echo "</optgroup>";

     echo "</select></td>";
     
    echo "
      
    
    <td><input  type='hidden' value='".$a."'  class='textbox1 form-control' id='textbox1'></td>
<td><input type='hidden' id='newhiddenBox'class='newhiddenBox' value='".$a."'></td>  
        

<td><input type='checkbox' name='check'  value='".$a."' class='check checkbox-primary' style='margin-left:5px;'>Add Column</td>

</tr></table></div>";
}
}
       echo  "</div>

        </div>
        
       

       </div>
        ";
    
 
    fclose($handle);

 // }
  
  //}
  echo "<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>";
  echo "<script language='javascript'>
  $(function(){
    $('.form-signin').css('display','none');
  });
  </script>";
//}
}
}
else{
 $show1="Please select csv  file";
   // header("location:ind1.php");
    //exit;
 //$show="please select a file";
 }
}
else{

 $show="please select a file";
 }

}


?>
