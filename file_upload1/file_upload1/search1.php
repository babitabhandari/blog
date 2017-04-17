<?php 

session_start();
if(isset($_SESSION['remail']) && isset($_SESSION['rpassword']) ) {?>
<?php 
require 'db.php';

   //echo $rec;
$rid= $_SESSION['recruiterid'];
 $query2="select username from tbl_registration where reg_id='$rid'";
 $result=mysql_query($query2);

     $row = mysql_fetch_array($result);
   $rec1= ucwords($row['username']);
  $rec= tab_.$rec1; 
  //echo $rec;
 if(isset($_POST['export'])){
  
 $q= "select firstname,lastname,email from  $rec where status=1";
 
 $qre1=mysql_query($q);
 
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Userinfo.csv');
header("Pragma: no-cache"); 
header("Expires: 0");
  
$data = fopen('php://output', 'w');
$first = true;
 while($row = array_filter(mysql_fetch_assoc($qre1))){
 if ($first) {
        fputcsv($data, array_keys($row));
        $first = false;
    }
   // fputcsv($fp, $row);
fputcsv($data, $row);
}
exit(); 
}
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
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="design.css"> 
 
  <link rel="stylesheet" media="all" href="css/application-d4224b555a9342024dce6886257deded.css" data-turbolinks-track="true">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">


 
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
<form action="" method="post">
 <input type="submit" name="export" style="background:#3F4C6B;margin-top:10px;opacity:1.4;" id="export" value="Export" class="btn btn-primary"> 
</form>
</div>

<?php

$rid= $_SESSION['recruiterid'];
 $query2="select username from tbl_registration where reg_id='$rid'";
 $result=mysql_query($query2);

     $row = mysql_fetch_array($result);
   $rec1= ucwords($row['username']);
  $rec= tab_.$rec1;
  

$qre=mysql_query("select firstname,lastname,email from $rec where status=1");
$columns_total = mysql_num_fields($qre);
if($qre!= ""){
echo '<div class="container" style="margin:0 auto;
    margin-top: 20px;margin-bottom:20px;overflow:auto;box-shadow: 1px 1px 1px 2px #3F4C6B;"  id="cont">';

echo '<table id="example" class="table table-striped table-bordered" style="float:left;" cellspacing="0" width="100%">';

//echo '<tr>';
$i=0;
echo '<h3 style="text-align:center;">List Of Users</h3>';
echo '<thead><td><b>FirstName</b></td><td><b>LastName</b></td><td><b>Email</b></td></thead>';
  while($a = mysql_fetch_assoc($qre)) 
    { 
   $i++;
       if($i==0){
echo '<thead>';
       foreach ($a as $key => $value) {
        if($value != NULL) 
          {
           echo '<td><b>'.$key.'</b></td>';
           //echo '&nbsp;';
            }
            
        } echo '</thead>';
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


?>
<?php } 
else{
header('location:http://recruitingascareer.com/screening/recruiter');
}
?>