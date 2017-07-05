<?php

if (!function_exists('xml2array')) {
      function xml2array ( $xmlObject, $out = array () ) {
            foreach ((array) $xmlObject as $index => $node)
            $out[$index] = (is_object ( $node )) ? xml2array ( $node ) : $node;
            return $out;
      }
}

if (!function_exists('ip_details')) {
    function ip_details($ip) {
        $json = file_get_contents("http://ipinfo.io/{$ip}/geo");
        $details = json_decode($json, true);
        return $details;
    }
}
