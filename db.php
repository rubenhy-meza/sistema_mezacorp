<?php
//session_start();
$conn = mysqli_connect(
    '192.168.0.1001',
    'root',
    'samanthafox',
    'dbmezacorp'
);
if(!$conn){
    echo "error al conectar database";
    //header("location:../admin/eeff.html");
}

?>