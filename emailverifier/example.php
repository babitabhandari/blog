<pre>
<?php	
	include "class.emailverify.php";
	
	$verify = new EmailVerify();
	$verify->debug_on = true;

	$verify->local_user = 'localuser';	//username of your address from which you are sending message to verify
	$verify->local_host = 'localhost';	//domain name of your address
$email='babitabhandari405@gmail.com';
	if($verify->verify($email)){
		echo $email;
		echo ' is Valid email address';
	}else{
		echo ' is Invalid Email Address';
	}
	
?>
</pre>