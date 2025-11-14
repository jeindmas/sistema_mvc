<?php
// Script para generar el hash del password del administrador
$password = "12345678";
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Password original: " . $password . "\n";
echo "Password hasheado: " . $hash . "\n";
echo "\nUsa este hash en el script SQL para el administrador por defecto.\n";
?>
