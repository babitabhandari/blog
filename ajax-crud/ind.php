<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	
</head>
<body>
	<form action="" method="post">
		<label for="">title</label>
		<input type="text" name="title" id="title">
		<label for="">description</label>
		<input type="text" name="description" id="description">
		<input type="submit" value="save" name="submit" class="submit">
		<div id="signup-test"></div>
	</form>
	<script>
		$('.submit').click(function(){
        var title= $('#title').val();
        var description= $('#description').val();
   // alert(title+description);
     $.ajax({
      url: 'ajax.php',
       data: {title: title,description: description},
        type: 'post', 
        success: function(data) { 
        	alert(data); }
        	 });
     return false;
		});
	</script>
</body>
</html>