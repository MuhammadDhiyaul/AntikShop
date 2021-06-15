<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost","root","","tokoonline");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Admin</title>
<link rel="stylesheet" href="assets/css/bootstrap.css">
</head>
<body>

<!--nav-->
<nav class="navbar navbar-default">
	<div class="container">
    
	<ul class="nav navbar-nav">
    	<li><a href="index.php">Home</a></li>
    </ul>
    </div>
</nav>


<div class="container">
	<div class="row">
    	<div class="col-md-4">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	<h3 class="panel-tittle">Login Admin</h3>
                </div>
                <div class="panel-body">
                	<form method="post">
                    	<div class="form-group">
                        	<label>Username</label>
                            <input type="username" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                        	<label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <button class="btn btn-primary" name="login">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// jika ada tombol simpan(tombol simpan ditekan)
if (isset($_POST["login"]))
{
	$ambil= $koneksi->query("SELECT * FROM admin WHERE username='$_POST[username]' AND password = '$_POST[password]'");
	
	// ngitung akun yang terambil
	$akunyangcocok = $ambil->num_rows;
	
	// jika 1 akun yang cocok, maka diloginkan
	if ($akunyangcocok==1)
	{
		//anda suskses login
		//mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		//simpan di session pelanggan
		$_SESSION["admin"] = $akun;
		echo "<script>alert('anda suskses login')</script>";
		echo "<script>location='index.php'</script>";
	}
	else
	{
		// anda gagal login
		echo "<script>alert('anda gagal login, periksa akun anda')</script>";
		echo "<script>location='login.php'</script>";
	}
}

?>
</body>
</html>