<?php
    $ip = "102.222.234.237";
    $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
    echo isset($details->hostname) && $details->hostname !== null ? $details->hostname : '';
?> 
