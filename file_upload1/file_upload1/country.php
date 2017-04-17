<?php
$remote_IP_url = 'http://ip-api.com/json/' . $_SERVER['REMOTE_ADDR'];
$remote_user_data = json_decode(file_get_contents($remote_IP_url));
if ( $remote_user_data->status == 'success' ) {
    $user_country = $remote_user_data->countryCode;
echo  $user_country;
    // do your check and get the currency code w.r.t. the $user_country in the previous line
}
else {
    // do your error handling
}
?>