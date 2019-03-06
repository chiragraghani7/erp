<?php
require_once("constants.php");

$connection = mysqli_connect(SERVER, USER, PASSWORD, DB);
if(!$connection)
{
    echo "some issue in connecting". mysqli_error($connection);
}

?>