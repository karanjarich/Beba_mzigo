<?php
$json='http://dev.virtualearth.net/REST/V1/Routes/Driving?wp.0=nairobi&wp.1=mombasa&avoid=minimizeTolls&key=AndZ8xSG68KOnUISMy3YDqVTSoRcBRNBWMdNVbN4MG8xjbnNA4Ca6E3JCL8vGttf';
$data = json_decode($json);
$data->resourceSets[0];
?>