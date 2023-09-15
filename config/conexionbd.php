<?php
// cambiar usuario: carloszehlendorf contra: S2pT@(L77P
$conn = new mysqli("localhost","root","","zehlendorf");

if($conn->connect_error){
    die('Error de conexion'.$conn->connect_error);
}