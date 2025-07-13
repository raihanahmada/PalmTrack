<?php
// Masukkan password yang Anda inginkan di sini
$password_polos = 'adminPalmTrack2025';

// PHP akan membuat hash yang aman
$hash_password = password_hash($password_polos, PASSWORD_DEFAULT);

// Tampilkan hasilnya
echo "Password Asli: " . $password_polos . "<br>";
echo "Hasil Hash (salin teks ini): <br>";
echo $hash_password;
?>