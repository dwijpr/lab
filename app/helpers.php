<?php

if (!function_exists('ip_details')) {
    function ip_details($ip) {
        $json = file_get_contents("http://ipinfo.io/{$ip}/geo");
        $details = json_decode($json, true);
        return $details;
    }
}
