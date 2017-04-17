<?php require 'cust.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<!-- Add Dropzone -->
<link rel="stylesheet" type="text/css" href="css/dropzone.css" />
<script src="https://use.fontawesome.com/90cc32dc7c.js"></script>
<script type="text/javascript" src="js/dropzone.js"></script>
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


</head>
<body>
<h1>File Upload</h1>
<div class="image_upload_div">

	<form action="cust.php" class="dropzone form-upload" >
	<i style=" font-size: 20px;margin:auto;" class="fa fa-cloud-upload" aria-hidden="true"></i>
	<!-- <input type="submit" value="upload" name="upload"> -->
    </form>
</div> 	
</body>
</html>


    

    
    
    
    
    

