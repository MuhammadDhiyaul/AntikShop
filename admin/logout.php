<?php

// menghancurkan $_SESSION["pelanggan"]
session_destroy();

echo "<script>alert('anda telah logout');</script>";
echo "<script>location='login.php';</script>";
