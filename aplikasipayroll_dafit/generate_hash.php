<?php
// Ganti "yourpassword" dengan password yang Anda inginkan
$password = "123";
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

echo "Password: " . $password . "<br>";
echo "Hashed Password: " . $hashed_password . "<br>";
?>