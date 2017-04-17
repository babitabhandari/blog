<?php 
session_start();


if(isset($_SESSION['remail']) && isset($_SESSION['rpassword']) ) {?>


<?php require 'cust5.php';
?>

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


 .show-read-more .more-text{
        display: none;
    }

</style>



  <script type="text/javascript">
$(document).ready(function(){
	$('.read-more-content').addClass('hide');

// Set up the toggle.
$('.read-more-toggle').on('click', function() {
  $(this).next('.read-more-content').toggleClass('hide');
});
});
</script>

   
 
  

<script>
$(document).ready(function(){
$('#submit').click(function(){
  
 var  hiddentxtbox=[];
 // hiddentxtbox= $('.newhiddenBox').val();
 // alert(hiddentxtbox);

   // alert(drop);
  <?php global $store; ?>
             var store= '<?php echo $store; ?>'; 
 var textbox = [];
   
  
   
    var check = [];
   


  $('.check').each(function() {
   
     
 if ($(this).is(':checked')) {
               var current = $(this).val();

            //alert(current);
             textbox.push($(this).parents("tr").find(".textbox").val())
            
 }

  check.push($(this).val());
});

 

               $.ajax({
             url: 'ajax2.php',
             type: 'post',
            dataType: 'text', 
             data: { check: textbox, store: store},
             success:function(result){


//if(result == 0){
//$(".dup").css("display","block");
//$(".dup").html(data);
 window.location.href = "index.php?g2=duplicate";
//}
//alert(check);
 alert(result);
//else{
         window.location.href = "tabular.php?g=success";
//}
//alert("Data save!!!");
              }
         });
         
         
return false;
});
});
</script>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
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
<!--<li class="big-bundle" data-no-turbolink="">
            <a href="search.php">
                 <i class="fa fa-upload" aria-hidden="true"></i>
                <p>Export CSV</p>
                
            </a>
        </li> -->
        
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

  <div class = "container">

 <div class="col-md-6 instructions" style="float:left;margin-top: 132px;text-align:justify;">
<h3>Please Read the instructions carefully before you upload a file.</h3>
<h5 ><b>Step-1:</b> Upload a excel file having extension in .csv format</h5>
<h5><b>Step-2:</b> Please mention the column names or column headings of a excel file are firstname,lastname and email.Only this type of file will be uploaded which have mentioned three column names.</h5>

<img class="img img-responsive grow" src="uploads/emails1.png">



<h5 ><b>Step-3:-</b>When you upload your file,You will see a screen into two parts.On the left side there are columns of a csv file which you have uploaded and on the other side you will see a first three rows of a csv file.</h5>

 <a class="read-more-toggle">Read More</a>
 <div class="read-more-content">
<img class="img img-responsive grow" src="uploads/emails.png">
or 
if you have only one column(email column) in csv file then you can also upload a file.
<img class="img img-responsive grow" src="uploads/Capture2.png"> 
<h5><b>Step-4:-</b>After upload your file,go to email validation tab and validate all emails.There is a result of all the valid and invalid emails appear on screen. </h5>
<h5><b>Step-5:-</b>You can export the valid emails by click on the export button.All the emails have downloaded in excel format. </h5>
</div></div>
  <div class="wrapper" class="col-md-6" style="float:left;margin-left:40px;">
<!-- <div class="alert alert-danger dup" style="background:red;color:black;display:none;"></div> -->
    <form action="" method="post" class="form-signin" enctype="multipart/form-data" style="background: rgb(255,255,255);
    background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 100%);
    background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(237,237,237,1) 100%);
    background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(237,237,237,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
    border: 2px solid #3F4C6B;">

        <h3 class="form-signin-heading"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Upload CSV File</h3>

        <?php
//if(isset($_GET['g'])){
//$msg=$_GET['g'];
//if($msg){
//echo  '<div class="alert alert-success" style="background:#DFF0D8;color:black;">File has been Successfully //Saved.</div>';
//}
//}
?>
<?php
if(isset($_GET['g2'])){
$msg2=$_GET['g2'];
if($msg2){
echo  '<div class="alert alert-danger" style="background:red;color:white;">Duplicate Value cant be insert</div>';
}
}
?>
<?php 
if(isset($_GET['g1'])){
$msg1=$_GET['g1'];
if($msg1){
echo  '<div class="alert alert-danger">Csv File Column names Should be in firstname,lastname and email format.</div>';
}
}
?>
        <?php
        
         if(isset($_POST['upload'])){
        // $target_dir = "uploads/";
        // $store=$_FILES["csv"]["name"];
        // if(file_exists($target_dir.$store)){
    //echo '<div class="alert alert-danger">File with that name already exists.</div>';
//}
 if($_FILES['csv']['size'] > 0 && $_FILES['csv']['size'] == 2) { 
  
     echo '<div class="alert alert-danger">Cant upload a empty file</div>';
  }
  // elseif($_FILES['csv']['size'] > 0 && $_FILES['csv']['size'] == 0) { 
  
  //    echo '<div class="alert alert-danger">Cant upload a empty file</div>';
  // }         
else{
          
 global $show;
    global $show1;

//echo $show1;
  
   if (substr($store, -3)=='') { 
echo '<div class="alert alert-danger">please select a file</div>';

}
  elseif(substr($store, -3) != 'csv' || substr($store, -4) != 'xlsx' || substr($store, -3) != 'xls'){
     echo '<div class="alert alert-danger">'.$show1.'</div>';
 }
else{
}
}
}  
 
 ?>

        <label for="" > Select A file:-</label>
        <input type="file" class="form-control" name="csv"   accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" autofocus=""  id="file"/><br>

        <input type="submit" class="btn btn-lg btn-primary btn-block"  name="upload" value="Upload" style=" background: #3F4C6B;color:white;opacity: 1.4;border:0px;">
        <!-- <input type="submit" name="submit" id="submit" value="submit" class="btn btn-lg btn btn-primary btn-block"> -->
        <br>
       
    </form>     
  </div>
</div>

</body>
</html>
<?php } 
else{
header('location:http://recruitingascareer.com/screening/recruiter');
}
?>
