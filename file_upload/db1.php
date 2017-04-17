<?php
error_reporting(E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR);
$link = mysqli_connect("localhost", "manishm2_screening", "screening123", "manishm2_candidate_screening");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>