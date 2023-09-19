<?php
  //  $this->layout("_theme", ["categories" => $categories]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?= url('imagens/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= url('vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= url('fonts/iconic/css/material-design-iconic-font.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= url('vendor/animate/animate.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= url('vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= url('vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= url('vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= url('vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= url('assets/web/util.css')?>">
	<link rel="stylesheet" type="text/css" href="<?= url('assets/web/main.css')?>">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= url("images/bg-01.jpg")?>');">
			<div class="wrap-login100">
				<form class="login100-form validate-form php-email-form" >
					<span class="login100-form-logo">
						<img src="<?= url('imagens/automax.svg') ?>" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Registre-se
					</span>

                    <div class="wrap-input100 validate-input" data-validate="Enter name">
						<input class="input100" type="text" name="name" placeholder="Name" required >
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required minlength="8">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Enviar
						</button>
						<div class="response">
							<p class="response__p" ></p>
						</div>
                        <a href="<?= url('/login') ?>" class="login100-form-link">
                            Já tem uma conta? Clique aqui para fazer login.
                        </a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="<?= url('vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= url('vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= url('vendor/bootstrap/js/popper.js')?>"></script>
	<script src="<?= url('vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= url('vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= url('vendor/daterangepicker/moment.min.js')?>"></script>
	<script src="<?= url('vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= url('vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
	<script src="<?= url('assets/web/main.js')?>"></script>

</body>
</html>


<script type="text/javascript" async>
    const form = document.querySelector(".php-email-form");

    const headers = {
            email: "",
            password: ""
    };

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const data = await fetch(`<?= url("api/user");?>`,{
            method: "POST",
            body: new FormData(form),
            headers: headers
        });
        const user = await data.json();
        console.log(user);
		if (user.type === "success") {
			let responseDiv = document.querySelector(".response__p");
			responseDiv.innerHTML = "Algo deu errado!";
			responseDiv.classList.add("error");
		} else {
			let responseDiv = document.querySelector(".response__p");
			responseDiv.innerHTML = "Registro feito com sucesso!";
			responseDiv.classList.add("success");
		}
    });
</script>