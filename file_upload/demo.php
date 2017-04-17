<?php

//$emails = array('Test Example <test@example.com>','test.localhost','test@localhost.com');

//foreach ($emails as $email) {
    //echo (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 
      //  " '$email' is valid\n" : 
      //  " '$email' is NOT valid\n";
//}
?>
<?php
//$handle = fopen("uploads/emails.csv", "r");
//$continue = true;
//while (($data = fgetcsv($handle, 1000, ",")) !== FALSE && $continue) {
    // check for valid email (presuming it's in column 1)
   // $continue = filter_var($data[1], FILTER_VALIDATE_EMAIL);
//if($continue){
//echo 'email column is present';
//}
//else{
//echo 'email column is not present';
//}
//}
//fclose($handle);


?>

<?php
$email = "babita@gmail.com";

if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}
?>
