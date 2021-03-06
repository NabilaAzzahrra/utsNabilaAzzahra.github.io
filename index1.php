<!DOCTYPE html>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/login/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/login/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/login/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/login/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/login/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/login/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login/util.css">
	<link rel="stylesheet" type="text/css" href="css/login/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100 bg-gra-01">
			<div class="wrap-login100">
				<span class="login100-form-title p-b-26">
					Login
				</span>
				<span class="login100-form-title p-b-48">
					<img src="https://iconape.com/wp-content/files/ml/133496/svg/133496.svg" width="50px" height="50px">
				</span>

				<div class="wrap-input100 validate-input" data-validate="Enter Username">
					<input class="input100" type="text" id="username" name="username">
					<span class="focus-input100" data-placeholder="Username"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<span class="btn-show-pass">
						<i class="zmdi zmdi-eye"></i>
					</span>
					<input class="input100" type="password" id="password" name="password">
					<span class="focus-input100" data-placeholder="Password"></span>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button type="submit" id="btnLogin" class="login100-form-btn">
							Login
						</button>
					</div>
				</div>

				<div class="text-center p-t-115">
					<span class="txt1">
						Don???t have an account?
					</span>

					<a class="txt2" href="index.php">
						Sign Up
					</a>
				</div>
			</div>
		</div>
	</div>

	<!--UTS-->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			Swal.fire({
				icon: "info",
				title: "Selamat Datang!",
				text: "Silahkan masukkan data anda.",
				timer: 3000,
				showConfirmButton: false,
			});

			function validasi() {
				var username = $("#username").val();
				var password = $("#password").val();
				if (username != "" && password != "") {
					cek_user(username, password);
				} else {
					Swal.fire({
						icon: "warning",
						title: "PERINGATAN !",
						text: "Harap isi seluruh data dengan benar !",
						timer: 3000,
						showConfirmButton: false,
					});
				}
			}

			function cek_user(username, password) {
				//untuk menampilkan data product
				$.ajax({
					icon: "GET",
					url: "https://lanakomunika.politekniklp3i-tasikmalaya.ac.id/api/login", //Memanggil Controller/Function
					async: false,
					dataType: "json",
					data: {
						username: username,
						password: password
					},
					success: function(response) {
						if (response.status == "200") {
							Swal.fire({
								icon: "success",
								title: "Masuk Berhasil!",
								text: "Tunggu sebentar...",
								timer: 3000,
								showConfirmButton: false,
							}).then(function() {
								window.location.href =
									"https://lanakomunika.politekniklp3i-tasikmalaya.ac.id/";
							});
						} else {
							Swal.fire({
								icon: "error",
								title: "Masuk Gagal!",
								text: "Silahkan untuk mencoba masuk kembali.",
								timer: 3000,
								showConfirmButton: false,
							});
						}
						console.log(response);
					},
					error: function(response) {
						Swal.fire({
							icon: "error",
							title: "Ups! ?????????????",
							text: "Server error!",
							timer: 3000,
							showConfirmButton: false,
						});
						console.log(response);
					},
				});
			}
			$("#btnLogin").on("click", function() {
				validasi();
			});
			var input = document.getElementById("password");
			input.addEventListener("keyup", function(event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					$("#btnLogin").on("click", validasi());
				}
			});
		});
	</script>
	<!-- Vendor JS-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/login/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/login/bootstrap/js/popper.js"></script>
	<script src="vendor/login/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/login/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/login/daterangepicker/moment.min.js"></script>
	<script src="vendor/login/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/login/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>


</body>

</html>