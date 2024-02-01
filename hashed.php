<?php
$password = 'indraganteng'; // Gantilah dengan kata sandi yang ingin Anda hash

$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

echo "Hashed Password: " . $hashedPassword . PHP_EOL;
