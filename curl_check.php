<?php
if (function_exists('curl_version')) {
    echo "cURL is enabled<br>";
    echo "cURL version: ";
    print_r(curl_version());
} else {
    echo "cURL is NOT enabled";
}
?> 