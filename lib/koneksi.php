<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$db_name = 'kanaga_hill';

$db = mysqli_connect($hostname, $username, $password, $db_name);

if($db->connect_error){
    echo 'error';
}else {
    echo 'berhasil';
}
?>