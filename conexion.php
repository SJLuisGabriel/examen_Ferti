<?php
$host = "localhost";      
$usuario = "root";        
$clave = "852741op";              
$base_de_datos = "fertilap_examen"; 
$puerto = 3307;           

// Crear conexión
$conexion = mysqli_connect($host, $usuario, $clave, $base_de_datos, $puerto);

if (!$conexion) 
    die("Error de conexión: " . mysqli_connect_error());
?>