<?php
session_start();
//koneksi ke database
include 'koneksi.php';
?>
<!doctype html>
<html>
<head>
	<title>Antik Shop</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>

<!--konten-->
<?php include 'isi.php'?>

</body>
</html>