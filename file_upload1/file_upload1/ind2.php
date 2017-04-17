<?php require 'cust4.php';
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

.closebtn:hover {
    color: black;
}

</style>

<script>
  $('.tt').click(function(){
$('.tt').css('outline','none');

  });
  </script>
  <script>
    $(function(){

    $('.btn').on('click',function() {                 
        $(this).closest('.panel').fadeOut('slide',function(){
            $('.panel').hide();    
        });
        });
})
</script>

 <script>
  jQuery(function($){  


   $(".drop").on('change', function(){
     var $this = $(this),
     selectBox = $this.val();
    // alert(selectBox);
   
    if(selectBox == 'text'){
      //location.reload();

     if($this.parent().next().find('.dynamic_text').length == 0) $(this).parent().next().append("<table><tr><td><form method='post'><input type='text' class='dynamic_text form-control'></form></td></tr></table>")

      
    
}
 else{
  $(this).find("[label='database headers']").find('option').each(function(){
       if($this.val() == $(this).val()) 
         $this.parent().next().find('.textbox').hide();

        })

}
});

  });
  
  </script>
  <script>
   $(function(){
  $(document).on('change','.drop', function(){
        var total = $(this).val();
        console.log(total);
        console.log($(this).attr("id"))
        console.log($(this).parent().nextAll("td").eq(2).children('input'));
       $(this).parent().nextAll("td").eq(2).children('input').val($(this).find("option:selected").attr("value"));


  var v = [];
            $(".select_drop").each(function(){
                v.push($(this).val());
            })     
            if($.inArray(total, v) >= 0){ 
                 alert('same column cant be choose'); 
                 location.reload(); 
            } 
      
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
   var textbox1 = [];
   var textbox2= [];
    // var drop= $('.drop').val();

    // alert(drop);
    var check = [];
    //var dynamic_text= $('.dynamic_text').val();
var dynamic_text= [];
//var dynamic_text1= [];
 
//var co=[];


   // alert(dynamic_text);
   $('.check').each(function() {
   
     // var drop2= $('.drop2').val();
     // alert(drop1 + drop2);
 if ($(this).is(':checked')) {
               var current = $(this).val();

              //alert(current);
             textbox.push($(this).parents("tr").find(".textbox").val())
             textbox1.push($(this).parents("tr").find(".textbox1").val())
             textbox2.push($(this).parents("tr").find(".textbox2").val())
            dynamic_text.push($(this).parents("tr").find(".dynamic_text").val())
            //dynamic_text1.push($(this).parents("tr").find(".dynamic_text1").val())

            hiddentxtbox.push($(this).parents("tr").find(".newhiddenBox").val())
 }
  check.push($(this).val());
});

 

               $.ajax({
             url: 'ajax1.php',
             type: 'post',

             data: { check: textbox, store: store, oldval: textbox1,dynamic_text:dynamic_text,hiddentxtbox:hiddentxtbox,olddropval:textbox2},
             success:function(data){
//alert(check);
          alert(data);
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
        <div class="logo">

            <img src="uploads/new_logo.png" width="60" height="60">
        </div>
        <p>File Upload App </p>
</a>    </div>

</div>


<div class="collapse navbar-collapse navbar-ex1-collapse">

    <ul class="nav navbar-nav navbar-right" data-no-turbolink="">

        <li>
            <a href="mail/example4.php">
                 <i class="fa fa-envelope-o" aria-hidden="true"></i>
                <p>Email Validation</p>
            </a>
        </li>

        <li class="dropdown dropdown-categories" data-no-turbolink="">
            <a href="ind2.php">
            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
               
                <p>
                   CSV File Upload
                   
                </p>

            </a>
</li>
<li class="big-bundle" data-no-turbolink="">
            <a href="search.php">
                 <i class="fa fa-upload" aria-hidden="true"></i>
                <p>Export CSV</p>
                
            </a>
        </li>
        

        <li>
            <a href="http://blog.creative-tim.com/">
               <i class="fa fa-sign-out" aria-hidden="true"></i>
                <p>Logout</p>
            </a>
        </li>

<li>
            <a href="http://blog.creative-tim.com/">
               <i class="fa fa-sign-out" aria-hidden="true"></i>
                <p>candidate Screening</p>
            </a>
        </li>
        <li>
            <a href="http://blog.creative-tim.com/">
               <i class="fa fa-sign-out" aria-hidden="true"></i>
                <p>candidate Screening</p>
            </a>
        </li>
    </ul>

</div>
</div>

</nav>

  <div class = "container">


  <div class="wrapper">
    <form action="" method="post" class="form-signin" enctype="multipart/form-data" style="background: rgb(255,255,255);
    background: -moz-linear-gradient(top, rgba(255,255,255,1) 0%, rgba(237,237,237,1) 100%);
    background: -webkit-linear-gradient(top, rgba(255,255,255,1) 0%,rgba(237,237,237,1) 100%);
    background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(237,237,237,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
    border: 2px solid #3F4C6B;">

        <h3 class="form-signin-heading"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Upload CSV File</h3>
        
        <?php
        if(isset($_POST['upload'])){
 global $show;
    global $show1;
  // global $store;
   if ($_FILES['csv']['size'] < 0) { 
 
     echo '<div class="alert alert-danger">'.$show1.'</div>';
      
     }
   //if(substr($store, -3) == 'csv'){
     echo '<div class="alert alert-danger">'.$show.'</div>';
 // }
  }
 
 ?>

        <label for="" > Select A file:-</label>
        <input type="file" class="form-control" name="csv"   autofocus=""  id="file"/><br>

        <input type="submit" class="btn btn-lg btn-primary btn-block"  name="upload" value="Upload" style=" background: #3F4C6B;color:white;opacity: 1.4;">
        <!-- <input type="submit" name="submit" id="submit" value="submit" class="btn btn-lg btn btn-primary btn-block"> -->
        <br>
       
    </form>     
  </div>
</div>

</body>
</html>

