<?php 
session_start();
if(isset($_SESSION['remail']) && isset($_SESSION['rpassword']) ) {?>
<?php 

require 'db.php';
//if(isset($_POST['export'])){

//$output = "";
//$gender ="";
//$age="";
//$header='';
//$data='';
//if(!empty($_POST['age'])) {
//$age=$_POST['age'];
//$var1=$age;
//$var = explode("-", $var1);
//$var2= $var[0]; // piece1
//$var3= $var[1]; // piece2
//}
//if($_POST['gender']!="") {
//$gender=$_POST['gender'];
 
//}
//if($gender=="" && $age==""){
 // echo "<div class='alert alert-danger'>please select age or gender</div>";
//}
//else{
//if($gender=="" && $age!=""){
 //$qre=mysql_query("select * from user  where age Between '$var2' AND '$var3'");
//}
//if($age=="" && $gender!=""){
 // $qre=mysql_query("select * from user where gender='$gender'");
  //$qre=mysql_query("select * from user where gender='$gender'");
  
 
//}
//if($age!="" && $gender!=""){
 //$qre=mysql_query("select * from user   where (age Between '$var2' AND '$var3') AND gender='$gender'");
 //}}

  
  
// header('Content-Type: text/csv; charset=utf-8');
// header('Content-Disposition: attachment; filename=Userinfo.csv');




//$data = fopen('php://output', 'w');

//$q = mysql_query('SELECT * FROM user');
//while($row = array_filter(mysql_fetch_assoc($qre))){
        fputcsv($row, array_keys($data[0]));



//fputcsv($data, $row);
//}
//exit(); 
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width">

 
  <link rel="canonical" href="http://www.creative-tim.com/" data-turbolinks-track="false">
  

  <title>Export CSV </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script> 
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="design.css"> 
 
  <link rel="stylesheet" media="all" href="css/application-d4224b555a9342024dce6886257deded.css" data-turbolinks-track="true">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 </script>
	
<script>
	$(document).ready(function() {
//$('.search').click(function(){
$('#example').dataTable();
});
//});
	</script>
<style>
	.form-signin{
		margin-top:20px;
	}
  .table-bordered {
    border: 2px solid black;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid black;
}
.filter-bar .logo, .dashboard {
margin-top:-8px;

    border: 1px solid #333;
    display: block;
    
    float: left;
    overflow: hidden;

}
.form-signin {
    margin-top: 40px;
}
label {
     margin-top: 0px; 
}
#example_wrapper{
margin-top:-53px;
}
.dt-buttons a{
margin-right: 5px;
    background-color: #3F4C6B;
    padding: 10px;
    color: white;
    border-radius: 6px;
}
</style>

  </head>
<body>
<nav class="navbar filter-bar fixed-absolute" style="background:#3F4C6B;">
    <div class="container">
    <div class="notification">
        <div id="notif-message" class="notif-message" style="display: none;" notice-type="success">
        </div>
        

</div>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <div data-no-turbolink="" style="margin-top: -7px;">
        <a class="navbar-brand" href="http://www.creative-tim.com/">
      <!--  <div class="logo"> -->

            <img class="logo" src="uploads/3melogo.jpg" style="border-radius: 0%;
    display: block;
   height: 70px;
    width: 89px;
    float: left;
    overflow: hidden;
    margin-left: 5px;">
        <!-- </div> -->
        <p>File Upload App </p>
</a>    </div>

</div>


<div class="collapse navbar-collapse navbar-ex1-collapse">

    <ul class="nav navbar-nav navbar-right" data-no-turbolink="">
 <li data-no-turbolink="">
            <a href="index.php" >
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               
                <p>
                   CSV File Upload
                   
                </p>

            </a>
</li>
        <li>
            <a href="mail/example4.php" data-toggle="search-form">
                 <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <p>Email Validation</p>
            </a>
        </li>

       
<li class="big-bundle" data-no-turbolink="">
            <a href="search.php">
                 <i class="fa fa-upload" aria-hidden="true"></i>
                <p>Export CSV</p>
                
            </a>
        </li>
        
           <li>
            <a href="http://recruitingascareer.com/screening/recruiter">
               <i class="fa fa-user-plus" aria-hidden="true"></i>
                <p>ATS</p>
            </a>
        </li>
       <li>
            <a href="../logout.php">
               <i class="fa fa-sign-out" aria-hidden="true"></i>
                <p>Logout</p>
            </a>
        </li> 


    </ul>

</div>
</div>

</nav>
<div class = "container" style="margin-top: 100px;">
<form action="" method="post" class="form-signin"  style="background: rgb(255,255,255);
    background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 100%);
    background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(237,237,237,1) 100%);
    background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(237,237,237,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
    box-shadow: 1px 1px 1px 3px #3F4C6B;">

     <h3>Search and export file</h3>
<?php 

if(isset($_POST['search'])){
global $gender;
global $age;
echo $gender;
if($_POST['gender']!="") {
$gender=$_POST['gender'];

//echo $gender;
}
if(!empty($_POST['age'])) {
$age=$_POST['age'];
$var1=$age;
$var = explode("-", $var1);
$var2= $var[0]; // piece1
$var3= $var[1]; // piece2
}
if($gender == "" && $age == ""){
echo "<div class='alert alert-danger' style='margin:0 auto;padding: 4px;background-color: #f44336; color: white;margin-top:10px;'>please select age or gender</div>";
//}
echo '<script type="text/javascript">

 $("#cont").css("display","block");

 </script>';
}
else{
//echo "<div class='alert alert-danger' style='margin:0 auto;padding: 4px;background-color: #f44336; color: white;margin-top:10px;'>please select age or gender</div>";
}
}
?>
<label>Age</label>
<div class="srch" >
        <select  class="form-control"  name="age" id="age" value="<?php echo $_POST['age'];?>">
           <option value="">--Please Select Age--</option>
            <option value="20-40">between 20-40</option>
            <option value="40-60">between 40-60</option>
            <option value="60-80">between 60-80</option>
        </select>
<script type="text/javascript">
  document.getElementById('age').value = "<?php echo $_POST['age'];?>";
</script>
        <br>
<label>Gender</label>
<label class="radio-inline"><input type="radio" class="radio-inline" name="gender"  value="male"<?php if (isset($_POST['gender']) && $_POST['gender'] == 'male') echo ' checked="checked"'; ?> group="male">male</label>
<label class="radio-inline"><input type="radio" class="radio-inline" name="gender" value="female"<?php if (isset($_POST['gender']) && $_POST['gender'] == 'female') echo ' checked="checked"';?>group="female">female</label>
        <br>
       <input type="submit"  name="search" id="" value="search" class="btn btn-primary search" style="background:#3F4C6B;margin-top:10px;opacity:1.4;">
</div>
        <input type="submit" name="export" style="display:none;background:#3F4C6B;margin-top:10px;opacity:1.4;" id="export" value="export" class="btn btn-primary"> 
    </form>
</div>
<?php
if(isset($_POST['search'])){
$output = "";
$gender ="";
$age="";
$header='';
$data='';
if(!empty($_POST['age'])) {
$age=$_POST['age'];
$var1=$age;
$var = explode("-", $var1);
$var2= $var[0]; // piece1
$var3= $var[1]; // piece2
}
if($_POST['gender']!="") {
$gender=$_POST['gender'];

//echo $gender;
}
if($gender=="" && $age==""){
 // $srch_vali="please select age or gender";

// echo "<div class='alert alert-danger' style='margin:0 auto;padding: 4px;background-color:#f44336;width:40%; color: white;margin-top:10px;'>please select age or gender</div>";
 

}
else{
if($gender=="" && $age!=""){
 $qre=mysql_query("select * from user  where age Between '$var2' AND '$var3'");

}
if($age=="" && $gender!=""){
 // $qre=mysql_query("select * from user where gender='$gender'");
  $qre=mysql_query("select * from user where gender='$gender'");

}
if($age!="" && $gender!=""){
 $qre=mysql_query("select * from user   where (age Between '$var2' AND '$var3') AND gender='$gender'");

 }
if($qre!= ""){
//echo $qre;
//echo '<script type="text/javascript">

 //$("#cont").css("display","block");
// </script>';
//  echo '<script type="text/javascript">

 //$("#export").css("display","block");
 //</script>';

 

}

}


$columns_total = mysql_num_fields($qre);
if($qre!= ""){
echo '<div class="container" style="margin:0 auto;
    margin-top: 30px;margin-bottom:40px;box-shadow: 1px 1px 1px 2px #3F4C6B;overflow-x:auto;"  id="cont">';

echo '<table id="example" class="table table-striped table-bordered display"  cellspacing="0" width="100%">';

//echo '<tr>';
$i=0;
echo '<h3 style="text-align:center;">List Of Users</h3>';
  while($a = mysql_fetch_assoc($qre)) 
    { 
   $i++;
       if($i==1){
echo '<thead><tr>';
       foreach ($a as $key => $value) {
        if($value != NULL) 
          {
           echo '<th><b>'.$key.'</b></th>';
           //echo '&nbsp;';
            }
            
        } echo '</tr></thead>';
 echo '<br>';  $i++;  continue;


      }

echo '<tbody>';
echo '<tr>';

    foreach ($a as $key => $value) {
          
        if($value != NULL) 
          {
           echo '<td>'.$value.'</td>';
          // echo '&nbsp;';
            }
        }

        //echo '<br>';
         echo '</tr>'; 
echo '</tbody>';
        } 

       // echo '</tr>';

echo '</table>';

echo '</div>';


}
else{
//echo 'there is no data';
}
}

?>
<?php } 
else{
header('location:http://recruitingascareer.com/screening/recruiter');
}
?>