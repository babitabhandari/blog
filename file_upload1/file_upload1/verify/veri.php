<?php

$email = array('babitabhandari405@gmail.com','babitabhandari402@gmail.com','bhandaribabita@yahoo.com');
print_r($email);
$e=implode(",",$email);


for ($x = 1; $x <= 5; $x++)
{
$domain_name = substr(strrchr($e, "@"), 1);

echo "Domain name is :" . $domain_name;
}
?>