<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Barista</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url()?>assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/login/css/main.css">
<!--===============================================================================================-->
    <script src="<?=base_url()?>assets/alert/sweetalert2.all.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?=base_url()?>assets/login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Forget Password
					</span>
                </div>
                
				<div class="login100-form validate-form" method="post">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" placeholder="Enter username" value="">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="show" onclick="showPass();">
							Show Password
						</button>
					</div>
					<!-- <br>
					<div class="wrap-input100 ">
						<span class="label-input100">Password</span>
						<input class="input100" type="text" name="password" id="password" placeholder="Password Will Be Show" readonly>
						<span class="focus-input100"></span>
					</div> -->

					<div>
						<a href="<?=base_url('index.php/auth/login')?>" class="txt1">
							Back To Login
						</a>
					</div>

					
				</div>
			</div>
		</div>
    </div>
    <script type="text/javascript">

		$(function() {
			$('#show').click(function() {
				var username = $('#username').val();
				var password;

				if(username == ''){
					Swal.fire(
						'Warning',
						'Username Kosong !!',
						'warning'
					)
				}

				else{
					$.ajax({
						url : "<?= base_url('index.php/auth/showPass') ?>",
						data : {
							username : username
						},
						type : "post",
						async : true,
						dataType : "json",
						success : function(result){
							// $.each(function(id) {
							// 	password = result.id;
							// });
							password = result.pass;
							$('#password').val(password);
						}
					});
					
				}
			});
		});
        
        function showPass(){
			var username = $('#username').val();
			var password;
			var status;

			if(username == ''){
				Swal.fire(
					'Warning',
					'Username Kosong !!',
					'warning'
				)
			}

			else{
				$.ajax({
					url : "<?= base_url('index.php/auth/showPass') ?>",
					data : {
						username : username
					},
					type : "post",
					async : true,
					dataType : "json",
					success : function(result){
						password = result.pass;
						status = result.status;
						if(status == 'Failed'){
							Swal.fire(
								'Warning',
								'Username Salah !!',
								'warning'
							)
						}
						else{
							Swal.fire(
								'Selamat !!!',
								'Password Anda : '+password,
								'Success'
							)
							$('#username').val('');
						}
						// $('#password').val(password);
					}
				});
				
			}
		}

    </script>
	

<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url()?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?=base_url()?>assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url()?>assets/login/js/main.js"></script>

</body>
</html>