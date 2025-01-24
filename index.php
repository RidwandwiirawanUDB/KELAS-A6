<?php 
include "lib/koneksi.php";
if(isset($_POST["op"])) {
$username_operator = $_POST['username_operator'];
$password_operator = $_POST['password_operator'];
if(!ctype_alnum($username_operator)or !ctype_alnum($password_operator)){
    echo '<div class="login_wrapper">
    <div class="alert alert-danger" role="alert">';
    echo "Gagal Login!";
    echo "Username atau Password Anda tidak benar atau account Anda sedang diblokir";
    echo '</div></div></div>';
}else{
    $loginOp = mysqli_query($con,"SELECT * FROM operator WHERE username_operator='$username_operator' AND password_operator='$password_operator'");
    $ketemu = mysqli_num_rows($loginOp);
    $r = mysqli_fetch_array($loginOp,MYSQLI_BOTH);
    if($ketemu>0){
        session_start();
        $_SESSION['usernameoperator'] = $r['username_operator'];
        $_SESSION['passoperator'] = $r['password_operator'];
        $_SESSION['id_operator'] = $r['id_operator'];
        header('location:dashboard.php?module=main');
    }else{
        echo '<div class="login_wrapper">
        <div class="alert alert-danger" role="alert">';
        echo "Akun atau Username anda salah!";
        echo '</div></div></div>';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- App favicon -->
    <<link rel="shortcut icon" href="upload/fav.png">
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Pemilihan Kepala Desa</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/log/css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="upload/logoSmall.png" alt="logo">
					</div>
					<div class="card fat">
						<div class="card-body">
							<center><h4 class="card-title">Login Operator</h4></center>
							<form method="POST" class="my-login-validation" novalidate="">
								<div class="form-group">
									<label for="email">Username</label>
									<input id="email" type="text" class="form-control" name="username_operator" value="" required>
									<div class="invalid-feedback">
										Username is invalid
									</div>
								</div>

								<div class="form-group">
									<label for="password">Password
										
									</label>
									<input id="password" type="password" class="form-control" name="password_operator" required data-eye>
								    <div class="invalid-feedback">
								    	Password is required
							    	</div>
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block"  type="submit"  name="op">
										Login
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2020 &mdash; iKades 
					</div>
				</div>
			</div>
		</div>
	</section>
	<script src="assets/log/js/my-login.js"></script>
</body>
</html>
