<?php 
require '../db.php';
session_start();
$rid= $_SESSION['recruiterid'];
if(isset($_SESSION['remail']) && isset($_SESSION['rpassword']) ) {?>
<?php

require_once('smtp_validateEmail.class.php');

if(isset($_POST['submit'])){
 //if(status != 'null' && status != '1' ){
$em= $_POST['em'];
$emails2=substr(strrchr($em, "@"), 1);

$emails1 = implode(",", preg_split("/[\s]+/", $em));
//echo $emails1;
$emails = explode(',',$emails1);
//print_r($emails);
//$emails = array('dave1@hmgamerica.com', 'babita@gmail.com');
// an optional sender
$sender = 'babitabhandari405@gmail.com';
// instantiate the class
$SMTP_Validator = new SMTP_validateEmail();
// turn on debugging if you want to view the SMTP transaction
$SMTP_Validator->debug = true;
// do the validation
$results = $SMTP_Validator->validate($emails, $sender);

// view results

$validemail= array();
$invalidemail= array();
foreach($results as $email=>$result) {
  if ($result) {
    
     $validemail[] = $email;

    //mail($email, 'Confirm Email', 'Please reply to this email to confirm', 'From:'.$sender."\r\n"); // send email
  } else {
    
    $invalidemail[] = $email;
   
  }
  
}
//echo '<pre>';print_r($validemail); echo '</pre>';

//$v=implode(",",$validemail);

 
  echo '<script>$(document).ready(function(){
$(".progress").css("display","none");

 });</script>'; 

//$valiemail= implode(',',$validemail);
//echo $valiemail;
 $query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

       $row = mysql_fetch_array($result);
      
    $rec1= ucwords($row['username']);
      $rec= tab_.$rec1; 
      date_default_timezone_set('Asia/Kolkata');
  $current= date("Y-m-d");

 $expire_date = date('Y-m-d', strtotime($current . ' +1 day'));
foreach ($validemail as $valiemail) {

  $valid_qre= "UPDATE $rec
    SET status = 1,date='$current',expire_date='$expire_date',expire_count=0 where email='$valiemail'";
   mysql_query($valid_qre);
  }
    foreach ($invalidemail as $invaliemail) {
   //  echo $invaliemail;
    $invalid_qre= "UPDATE $rec SET status = -1,date='$current',expire_date='$expire_date',expire_count=0  where email='$invaliemail'"; 
    mysql_query($invalid_qre);
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
  <meta name="viewport" content="width=device-width">

  <link rel="canonical" href="http://www.creative-tim.com/" data-turbolinks-track="false">

  <title>Email Validation</title>
  
  <!-- <link rel="stylesheet" href="design.css"> -->
  <!-- <link rel="stylesheet" href="css/jquery.alerts.css"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" media="all" href="../css/application-d4224b555a9342024dce6886257deded.css" data-turbolinks-track="true">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <!-- <script src="js/jquery.alerts.js"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="http://code.jquery.com/jquery-3.1.0.slim.min.js" type="text/javascript"></script>
<script src="../js/jquery.barfiller.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function(){

  $('#bar1').barfiller({ barColor: '#EDEDED' });
  
  
});

</script>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
  <style>
  pre {
    display: block;
    padding: 9.5px;
    margin: 0 0 10px;
    
    line-height: 1.42857143;
    color: #333;
    word-break: break-all;
    word-wrap: break-word;
    border:0px;
    background-color:none;
    border-radius:0px;
   
}
.filter-bar .logo, .dashboard {
margin-top:-15px;

    border: 1px solid #333;
    display: block;
    
    float: left;
    overflow: hidden;

}
.alert {
    padding: 6px;
  }
 .barfiller {
margin-top:20px;
  width: 100%;
  height: 12px;
  background: #fcfcfc;
  border: 1px solid #ccc;
  position: relative;
  margin-bottom: 20px;
  box-shadow: inset 1px 4px 9px -6px rgba(0,0,0,.5);
  -moz-box-shadow: inset 1px 4px 9px -6px rgba(0,0,0,.5);
}

.barfiller .fill {
  display: block;
  position: relative;
  width: 0px;
  height: 100%;
  background: #333;
  z-index: 1;
}

.barfiller .tipWrap { display: none; }

.barfiller .tip {
  margin-top: -30px;
  padding: 2px 4px;
  font-size: 11px;
  color: #fff;
  left: 0px;
  position: absolute;
  z-index: 2;
  background: #333;
}

.barfiller .tip:after {
  border: solid;
  border-color: rgba(0,0,0,.8) transparent;
  border-width: 6px 6px 0 6px;
  content: "";
  display: block;
  position: absolute;
  left: 9px;
  top: 100%;
  z-index: 9
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
    <div data-no-turbolink="">
        <a class="navbar-brand" href="http://www.creative-tim.com/">
        <!-- <div class="logo"> -->

            <img class="logo" src="../uploads/3melogo.jpg" style="border-radius: 0%;
    display: block;
   height: 65px;
    width: 90px;
    float: left;
    overflow: hidden;
    margin-left: 5px;">
      <!--  </div> -->
        <p>File Upload App </p>
</a>    </div>

</div>


<div class="collapse navbar-collapse navbar-ex1-collapse">

    <ul class="nav navbar-nav navbar-right" data-no-turbolink="" style="margin-top: -7px;">

       
        <li  data-no-turbolink="">
            <a href="../index.php" >
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               
                <p>
                   CSV File Upload
                   
                </p>

            </a>
</li>
 <li>
            <a href="example4.php" data-toggle="search-form">
                 <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <p>Email Validation</p>
            </a>
        </li>

<li class="big-bundle" data-no-turbolink="">
            <a href="../search.php">
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
            <a href="../../logout.php">
               <i class="fa fa-sign-out" aria-hidden="true"></i>
                <p>Logout</p>
            </a>
        </li> 


    </ul>

</div>
</div>

</nav>
<div class="container" style="width:80%;margin:100px auto;">
<h3>Email Validation</h3>

 <div class="form-group" >
  <form method="post">
  
  <h4 style="color:red;">You Have Crossed your limit.Out of  <?php 
   $query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

      $row = mysql_fetch_array($result);
     $rec1= ucwords($row['username']); 
     $rec= tab_.$rec1;
    
    
     //echo $rec;
  $rec_email=mysql_query("select email from $rec");
 $r= mysql_num_rows($rec_email);
echo $r;

  ?> emails,Only 
 <?php 
 $query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

       $row = mysql_fetch_array($result);
    $rec1= ucwords($row['username']);  
      $rec= tab_.$rec1;
  $rec_email2=mysql_query("select email from $rec where status!='null'");

$up3=mysql_num_rows($rec_email2);
echo $up3;
  ?>
    <?php
 // $query2="select username from tbl_registration where reg_id='$rid'";
 //  $result=mysql_query($query2) or die("Error: ".mysql_error($link));

 //      $row = mysql_fetch_array($result);
 //    $rec1= ucwords($row['username']); 
 //     $rec= tab_.$rec1; 
$current= date("Y-m-d");

// if(isset($_POST['preemail'])){
// $rec_email1=mysql_query("select email from tab_recruiter WHERE date != '$current' && status!='null' limit 3");
// //$u="";
// //$t=mysql_insert_id($rec_email1);
// //echo $t;
// $up1=mysql_num_rows($rec_email1);
// //echo $up1;
// }
// else{
//  $rec_email1=mysql_query("select email from tab_recruiter WHERE date = '$current' && status!='null' ");

//  $up1=mysql_num_rows($rec_email1);
//  //echo $up1; 
// }
?> emails are validated .</h4>

<div id="bar1" class="barfiller">
    <div class="tipWrap">
    <span class="tip"></span>
      </div>
      <span class="fill" data-percentage="
      <?php 

      global  $up3;
     
      global $r;
      $per= $up3/$r*100;
      //$per3= $up3/$r*100;
    
      $per1 = round($per);
      //$per2 = round($per3);

     
echo $per1;

//echo $per2;
      ?>"></span>
  </div>

  
<?php global $per1;
if($per1 == 100){
  echo '<div class="alert alert-success emailsuccess" >All Emails have successfully validated</div>';
} ?>


<?php 
 $query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

      $row = mysql_fetch_array($result);
     $rec1= ucwords($row['username']);
      $rec= tab_.$rec1;
  $current= date("Y-m-d");

$rec_email4=mysql_query("select email from $rec WHERE expire_count > 0 AND status='null' limit 3");
$up4=mysql_num_rows($rec_email4);
//echo $up4;
if($up4>0){

//if(status == 'null' ){
 echo '<div class="overall" >There are '; 
$query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

      $row = mysql_fetch_array($result);
     $rec1= ucwords($row['username']);
      $rec= tab_.$rec1;
 $current= date("Y-m-d");
 
$rec_email1=mysql_query("select email from $rec WHERE expire_count > 0 AND status='null' limit 5");
$up1=mysql_num_rows($rec_email1);
echo $up1;
echo ' Emails which you have validated one month ago has been expired.Do You want to validate those emails again.<br>
   <input type="submit" value="Revalidate Emails" name="expire" class="btn btn-primary" style="background:#3F4C6B;opacity:1.4;color:white;margin-top:5px;">  
       
     </div>'; 
      }
      else{

       } ?>
  <label for="comment">Email Address</label>
<textarea class="form-control"  name="em" id="" cols="30" rows="10" placeholder="please enter email addresses" class="txt">
<?php 
if(isset($_POST['expire'])){
$query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

       $row = mysql_fetch_array($result);
    $rec1= ucwords($row['username']);
   $rec= tab_.$rec1;

//if(recruiter != '' ){
$current= date("Y-m-d");
 
  //change recruiter to $rec
$rec_email1=mysql_query("select email from $rec WHERE expire_count > 0 AND status='null' limit 5");
$up1=mysql_num_rows($rec_email1);
// echo $up;
if($up1 > 0){
while($rec_result1= mysql_fetch_array($rec_email1)){

echo $rec_result1['email'].PHP_EOL;

}
}
  
}
?>
<?php 
  $query2="select username from tbl_registration where reg_id='$rid'";
   $result=mysql_query($query2) or die("Error: ".mysql_error($link));

       $row = mysql_fetch_array($result);
     $rec1= ucwords($row['username']);
   $rec= tab_.$rec1;
if(!isset($_POST['expire'])){
//if(recruiter != '' ){
$current= date("Y-m-d");
 
  //change recruiter to $rec
$rec_email=mysql_query("select email from $rec WHERE  status='null' AND expire_count=0  limit 5");
$up=mysql_num_rows($rec_email);
// echo $up;
if($up > 0){
while($rec_result= mysql_fetch_array($rec_email)){

echo $rec_result['email'].PHP_EOL;

}
}
else{
   
}
 } 

?>

</textarea>
<?php  global $up;
if($up < 0){ ?>
<script>
 $(document).ready(function(){
$(".emailsuccess").css("display","block");
});
</script>

<?php  }   ?>

<br>
<input type="submit" name="submit" value="Check email addresses" class="btn btn-primary submit" style="background:#3F4C6B;opacity:1.4;color:white;">
</form>
</div>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit'])){

$v= '<pre style="color:green;font-size:20px;">'.implode("\n",$validemail).'</pre>';

$iv= '<pre style="color:red;font-size:20px;">'.implode("\n",$invalidemail).'</pre>';

echo "<div class='container' style='width:80%;margin:0 auto;'>
<div class='row'>
<div class='col-md-6' style='float:left;'>";
  echo "<h3>List Of Valid Emails</h3>";
echo "<div style='color:green';>
      $v 
     </div></div>";

  echo "<div class='col-md-6' style='float:left;'>
  <h3>List Of Invalid Emails</h3>";
  echo "<div style='color:red';>
      $iv

     </div>
     </div>
    </div> 
</div>";

}
?>
<?php } 
 else{
 header('location:http://recruitingascareer.com/screening/recruiter');
 }
?>