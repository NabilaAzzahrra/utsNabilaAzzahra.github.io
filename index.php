<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Register</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading">
                    <div class="behatas">
                        <pre>          </pre>
                    </div>
                    <div class="behtengah">
                        <h1 align="center" data-aos="fade-up" data-aos-delay="100">Hi Welcome</h1>
                        <h4 align="center"><img src="https://iconape.com/wp-content/files/ml/133496/svg/133496.svg" width="180px" height="180px"></h4>
                        <h5>Please fill <br> in the registration form</h5>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="title" align="center"><b>Sign Up</b></h2>
                    <form id="formRegist">

                        <div class="input-group">
                            <div class="row">
                                <div><input id="name" class="input--style-3" type="text" placeholder="Nama" name="name"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="row">
                                <div><input id="username" class="input--style-3" type="text" placeholder="Username" name="username"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <div class="row">
                                <div><input id="password" class="input--style-3" type="password" placeholder="Password" name="password"></div>
                                <div class="icon"><i class="far fa-eye" id="togglePassword"></i></div>
                            </div>
                        </div>

                        <div class="input-group" id="pl">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="plan" id="plan">
                                    <option value="0" disabled="disabled" selected="selected">Plan</option>
                                    <option value="1">Free</option>
                                    <option value="2">Premium</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group" id="py" required>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="pembayaran" id="pembayaran">
                                    <option value="0" disabled="disabled" selected="selected">Pembayaran</option>
                                    <option value="1">Indomaret</option>
                                    <option value="2">Dana</option>
                                    <option value="3">Ovo</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="p-t-10" align="center">
                            <button id="btnDaftar" class="btn btn--pill btn--green" type="submit">Submit</button>
                            <h6 align="center">do you already have an account?</h6>
                            <h6 align="center"><a href="index1.php"> have an account</a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#pembayaran").hide();
            $("#plan").change(function() {
                var _this = $(this).val();
                if (_this == 2) {
                    $("#pembayaran").show();
                } else {
                    $("#pembayaran").hide();
                }
            });
        });

        function daftar(dataForm) {
            var biodata = dataForm;
            $.ajax({
                type: "POST",
                url: "https://lanakomunika.politekniklp3i-tasikmalaya.ac.id/api/register", //Memanggil Endpoint
                async: false,
                dataType: "json",
                data: biodata,
                success: function(response) {
                    if (response.status == "200") {
                        Swal.fire({
                            icon: "success",
                            title: "Pendaftaran Berhasil!",
                            text: "Tunggu sebentar...",
                            timer: 3000,
                            showConfirmButton: false,
                        }).then(function() {
                            window.location.href = "./index1.php";
                        });
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Pendaftaran Gagal!",
                            text: "Silahkan untuk mencoba daftar kembali.",
                            timer: 3000,
                            showConfirmButton: false,
                        });
                    }
                    console.log(response);
                },
                error: function(response) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops !!",
                        text: "Server error!",
                        timer: 3000,
                        showConfirmButton: false,
                    });
                    console.log(response);
                },
            });
        }
        $("#btnDaftar").on("click", function() {
            event.preventDefault();
            var dataForm = $("#formRegist").serialize();
            daftar(dataForm);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.8/dist/sweetalert2.all.min.js"></script>

    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

    <script>
        $(document).ready(function() {
            $("#py").hide();
            $("#plan").change(function() {
                var _this = $(this);

                if (_this.val() == 2) {
                    $("#py").show();
                } else {
                    $("#py").hide();
                }
            });

        });
    </script>

    <script>
        function validateForm() {
            if (document.forms["formRegist"]["username"].value == "") {
                alert("username must be filled ????");
                document.forms["formRegist"]["username"].focus();
                return false;
            }
            if (document.forms["formRegist"]["password"].value == "") {
                alert("password must be filled ????");
                document.forms["formRegist"]["password"].focus();
                return false;
            }
            if (document.forms["formRegist"]["email"].value == "") {
                alert("email must be filled ????");
                document.forms["formRegist"]["email"].focus();
                return false;
            }
            if (document.forms["formRegist"]["plan"].selectedIndex < 1) {
                alert("choose plan ????");
                document.forms["formRegist"]["plan"].focus();
                return false;
            }

        }
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
<!--This templates was made by Colorlib(https://colorlib.com) -->

</html>
<!--end document-->