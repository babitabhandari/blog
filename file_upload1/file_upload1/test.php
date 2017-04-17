<?php
require 'db1.php';
$alter= mysqli_query($link,"ALTER table  tab_Recruiter ADD UNIQUE(email)");
if($alter){
echo "query run";
}
else{
echo "not";
}

?>