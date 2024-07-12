<?php

function getdist($lat1,$lon1,$lat2,$lon2){

$a = M_PI / 180;

$lat1 *= $a;
$lat2 *= $a;

$lon1 *= $a;
$lon2 *= $a;

$total1 = $lat1+$lon1;
$total2 = $lat2+$lon2;

if($total1==0||$total2==0){
    return -3;
}

$dist = acos(sin($lat1)*sin($lat2)+cos($lat1)*cos($lat2)*cos($lon2-$lon1))*6371;

$rounded = round($dist);

if($dist > 1000)return -1;
if($dist < 1.0)return -2;

return $rounded;

}

?>