<?php
include "db.php";
$dbname = 'manishm2_candidate_screening';
$qre= "SHOW TABLES  FROM $dbname WHERE 
    `Tables_in_manishm2_candidate_screening` LIKE 'tab%'";

$r=mysql_query($qre);
while ($row = mysql_fetch_row($r)) {
$tbl=$row[0];
    echo $tbl;
   $current= date("Y-m-d");
   echo $current;
   echo '<br>';
$expire_date = date('Y-m-d', strtotime($current . ' +1 day'));

$up="update $tbl set status=0,expire_count=expire_count+1 where expire_date = '$current'";
mysql_query($up);
echo '<br>';

}



?>