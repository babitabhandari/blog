<?php
error_reporting(E_ALL^E_DEPRECATED);
ini_set('display_errors', 1);
include 'verify.class.php';

//$ve=array();
$emails = array('babitabhandari405@gmail.com', 'dave@hmgamerica.com','dave1@hmgamerica.com');
$er=implode(' ', $emails);
echo $er;
$ve = new VE\VerifyEmail('babitabhandari405@gmail.com','babitabhandari405@gmail.com');
foreach($emails as $email){
  //change the email to the current item in the loop
  $ve->set_email($email);
  var_dump($ve->verify());
  //  $r=$ve->verify();
  // echo $r ;
// echo '<pre>';
 // print_r($ve->get_debug());

}
//var_dump($ve->verify());

//}