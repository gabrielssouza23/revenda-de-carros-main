<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="<?= url('/assets/web/scripts.js'); ?>" async></script>
    <link rel="stylesheet" href="<?= url('/assets/web/style.css');?>">
    <title>Document</title>
</head>
<body>
<style>
	.login-button {
			background-color: transparent;
			border: 1.5px solid #f2f5f7;
			border-radius: 2em;
			padding: 0.6rem 0.8rem;
			margin-left: 2vw;
			font-size: 1rem;
			cursor: pointer;

		}

		.login-button:hover {
			color: #131418;
			background-color: #f2f5f7;
			border: 1.5px solid #f2f5f7;
			transition: all ease-in-out 350ms;
		}

		.join-button {
			color: #131418;
			background-color: #61DAFB;
			border: 1.5px solid #61DAFB;
			border-radius: 2em;
			padding: 0.6rem 0.8rem;
			font-size: 1rem;
			cursor: pointer;
		}

		.join-button:hover {
			color: #f2f5f7;
			background-color: transparent;
			border: 1.5px solid #f2f5f7;
			transition: all ease-in-out 350ms;
		}

</style>
   
    
    <header>

		<div class="container">
			<div class="logo">
				<img src="<?= url('imagens/logo180x75.png')?>" />
			</div><!--logo-->

			<nav class="desktop">
				<ul>
					<li><a style="color:#255784;" href="<?=url('/'); ?>">Home<span class="span"></span></a></li>
					<li><a href="<?=url('/veiculos'); ?>">Veículos<span class="span"></span></a></li>
					<li><a href="<?=url('/sobre'); ?>">Sobre<span class="span"></span></a></li>
					<li id="contact">Contatos<span class="span-contact"></span></li>
				</ul>
			</nav><!--desktop-->

			<nav class="mobile">
				<ul>
					<li><a style="color:#3DE22C;" href="<?=url('/'); ?>">Home</a></li>
					<li><a href="<?=url('/veiculos'); ?>">Venda</a></li>
					<li><a href="<?=url('/sobre'); ?>">Sobre</a></li>
					<li><a href="">Contato</a></li>
					<li><button class="login-button" href="#">Login</button></li>
					<li><button class="join-button" href="#">Join</button></li>
				</ul>
			</nav><!--mobile-->

			<div class="clear"></div>
		</div><!--container-->
	</header>
    <section class="banner">
		<picture>
			<source media="(max-width: 380px)" srcset="<?= url('imagens/bglim380x144.jpg');?>" type="image/jpg">
			<source media="(max-width: 768px)" srcset="imagens/bglim768x292.jpg" type="image/jpg">
			<img src="<?= url('imagens/bglim1280.jpg');?>" alt="banner">
		</picture>
		
	</section><!--banner-->
	
    <?php
    echo $this->section("content");
    ?>
    	<div class="scroll-top">
		<div class="scroll-img">
			<img id="scroll-top-img" src="imagens/seta-para-cima-em-um-fundo-de-circulo-preto.png" alt="TOPO"
				title="Volte ao topo!">
		</div>

		<div class="scroll-top-date"></div>
		<div class="clear"></div>
	</div>
	<footer>
		<div class="container">
			<nav>
				<ul>
					<li><a style="color:#3DE22C;" href="<?=url('/'); ?>">Home</a></li>
					<li><a href="<?=url('/veiculos'); ?>">Venda</a></li>
					<li><a href="<?=url('/sobre'); ?>">Sobre</a></li>
					<li><a href="">Contato</a></li>
				</ul>
			</nav>
			<p>Todos os direitos reservados</p>
			<div class="clear"></div>
		</div>
		<!--container-->
	</footer>
</body>
</html>