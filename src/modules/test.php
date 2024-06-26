<?php
function console_out($out){
    $data = $out;
    if(is_array($data))$data = implode(',',$data);

    echo '<script> console.log("output :',$data,' ")</script>';
    
}

if(session_status() === PHP_SESSION_NONE){
    //session_start();
}else{
    console_out($_SESSION);
}
?>