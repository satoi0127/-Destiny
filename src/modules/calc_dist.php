<?php

function getdist($lat1,$lon1,$lat2,$lon2){

$a = M_PI / 180;

$lat1 *= $a;
$lat2 *= $a;

$lon1 *= $a;
$lon2 *= $a;

$dist = acos(sin($lat1)*sin($lat2)+cos($lat1)*cos($lat2)*cos($lon2-$lon1))*6371;

if($dist > 100000){
    echo "too far";
    }else{
    echo $dist ," km";
}

}

?>