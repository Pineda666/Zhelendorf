<?php

$conn = new mysqli("localhost","root","","zehlendorf");

if($conn->connect_error){
    die('Error de conexion'.$conn->connect_error);
}