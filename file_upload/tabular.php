<?php 
session_start();
require 'db.php';
$rid= $_SESSION['recruiterid'];

if(isset($_SESSION['remail']) && isset($_SESSION['rpassword']) ) {?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
  <meta name="viewport" content="width=device-width">

  <link rel="canonical" href="http://www.creative-tim.com/" data-turbolinks-track="false">

  <title>File Upload</title>
  
  <link rel="stylesheet" href="design.css">
  <!-- <link rel="stylesheet" href="css/jquery.alerts.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" media="all" href="css/application-d4224b555a9342024dce6886257deded.css" data-turbolinks-track="true">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <!-- <script src="js/jquery.alerts.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <!-- <script src="js/additional-methods.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> -->
  <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<style>
  .drop{
  width:200px;
  float:left;
  /*outline:1px solid red;*/
  }
  .tt{
  outline:1px solid red;
}
.dynamic_text{
  margin-top:15px;
}
.alert {
    padding: 4px;
  background-color: #f44336;
    color: white;
}
hr {
     margin-top: 0px; 
     margin-bottom: 0px; 
    border: 0;
    border-top: 2px solid;
    margin-left: -30px;
    margin-right: -30px;
}
.filter-bar .logo, .dashboard {
margin-top:-15px;

    border: 1px solid #333;
    display: block;
    
    float: left;
    overflow: hidden;

}
.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}
 select{
   -moz-appearance: none;
<!-- margin-left:20px; -->
        }

.grow { -webkit-transition: all 2s ease; -moz-transition: all 2s ease; -ms-transition: all 2s ease; transition: all 2s ease; margin:auto; }




</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">

 <script>
 
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});

 </script> 
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
    <div data-no-turbolink="">
        <a class="navbar-brand" href="http://www.creative-tim.com/">
        

            <img class="logo" src="uploads/3melogo.jpg" style="border-radius: 0%;
    display: block;
   height: 65px;
    width: 81px;
    float: left;
    overflow: hidden;
    margin-left: 5px;
    margin-top: -15px;" >
        
        <p>File Upload App </p>
</a>    </div>

</div>


<div class="collapse navbar-collapse navbar-ex1-collapse">

    <ul class="nav navbar-nav navbar-right" data-no-turbolink="" style="margin-top: -7px;">

       

        <li  data-no-turbolink="">
            <a href="index.php">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               
                <p>
                   CSV File Upload
                   
                </p>

            </a>
</li>
 <li>
            <a href="mail/example4.php">
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

  <div class="container" style="margin-top:150px;">
  <?php
if(isset($_GET['g'])){
$msg=$_GET['g'];
if($msg){
echo  '<div class="alert alert-success" style="background:#DFF0D8;color:black;width:50%;">File has been Successfully Saved.</div>';
}
}
?>
<table class="table table-bordered">
    <thead>
      <tr>
      <th data-original-title="Total no of emails which you have uploaded" data-toggle="tooltip" data-placement="top" class="red-tooltip" data-container="body" title="">Total No of  emails</th>
        <th data-original-title="These are those emails which you have previously validated" data-toggle="tooltip" data-placement="top" class="red-tooltip" data-container="body" title="">Total validated emails</th>
        <th data-original-title="These are those emails which you have uploaded but still not  validated yet.please click on button to validate emails." data-toggle="tooltip" data-placement="top" class="red-tooltip" data-container="body" title="">Total no of  Unvalidated  Emails</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
        <?php
        
        $query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

       $row = mysql_fetch_array($result);
      
    $rec1= ucwords($row['username']);
      $rec= tab_.$rec1; 
     // echo $rec;
      $show=mysql_query("select email from $rec ");
      $count=mysql_num_rows($show);
      echo $count;
      while($result=mysql_fetch_array($show)){
      
      }
         ?>
         </td>
        <td><?php  $validate_email=mysql_query("select email from $rec where status=1");
 $r= mysql_num_rows($validate_email);
echo $r;
 ?></td>
        <td><?php  $pending_email=mysql_query("select email from $rec where status=0");
 $r1= mysql_num_rows($pending_email);
echo $r1;
 ?></td>
      </tr>
      <tr>
        <td colspan="2"></td>
        
        <td><a class="btn btn-primary" href="mail/example4.php" style="background:#3F4C6B;opacity:1.4;color:white;">Proceed to Validate Emails</a></td>
      </tr>
      
    </tbody>
  </table>

  </div>


</body>
</html>
<?php } 
else{
header('location:http://recruitingascareer.com/screening/recruiter');
}
?>