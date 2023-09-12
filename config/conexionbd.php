<?php

$conn = new mysqli("localhost","root","","zehlendorf");

if($conn->connect_error){
    die('Error de conexion'.$conn->connect_error);
}

// class Database
// {
//     private $hostname = 'localhost';
//     private $database = 'zehlendorf';
//     private $username = 'root';
//     private $password = '';
//     private $charset = 'utf8';

//     function conectar()
//     {
//         try {
//             $conexion = "mysql:host=" . $this->hostname . "; dbname=" . $this->database . ";charset=" . $this->charset;
//             $options = [
//                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                 PDO::ATTR_EMULATE_PREPARES => false
//             ];
//             $pdo = new PDO($conexion, $this->username, $this->password, $options);
//             return $pdo;
//         } catch (PDOException $e) {
//             echo 'Error conexion: ' . $e->getMessage();
//             exit;
//         }
//     }
// }
