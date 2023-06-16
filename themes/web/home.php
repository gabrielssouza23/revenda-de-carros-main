<!DOCTYPE html>
<html>
<head>
	<title>Limarim-Veículos</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link href="<?= url('/assets/web/style.css');?>" rel="stylesheet">
	<link href="<? url('/assets/web/styleFaq.css');?>" rel="stylesheet">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
	
</head>

<body>
<?php 
	$this->layout("_theme");
?>
	
	
	
		<section class="veiculos-destaque">
		<div class="line-titulo">
			<div class="ln1"></div>
			<h2>Veículos em destaque</h2>
		</div>
		<div class="container">
			<div class="vitrine-destaque">
				<div class="images btn">
							<img class="slide fade" src="imagens/fiesta1.6/152476477_2955666941372711_8331539649342254719_o.jpg">
							<img class="slide fade" src="imagens/fiesta1.6/153188432_2955666971372708_4463959874626697307_o.jpg">
							<img class="slide fade" src="imagens/fiesta1.6/152550659_2955666951372710_6798984382026102550_o.jpg">
							<img class="slide fade" src="imagens/fiesta1.6/152539106_2955666938039378_3511633968246886209_o.jpg">
							<img class="slide fade" src="imagens/fiesta1.6/152461779_2955666978039374_5691071215669686355_o.jpg">
							<img class="slide fade" src="imagens/fiesta1.6/152414867_2955666931372712_6072346620008668518_o.jpg">
							<img class="slide fade" src="imagens/fiesta1.6/152325324_2955666974706041_774737378772133307_o.jpg">
							<img class="slide fade" src="imagens/fiesta1.6/152314763_2955666961372709_1347148277146845409_o.jpg">	
					<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
					<a class="next" onclick="plusSlides(1)">&#10095;</a>		
				</div><!--fiesta-->
				<div style="text-align:center">
					<span class="dot" onclick="currentSlide(1)"></span>
					<span class="dot" onclick="currentSlide(2)"></span>
					<span class="dot" onclick="currentSlide(3)"></span>
					<span class="dot" onclick="currentSlide(4)"></span>
					<span class="dot" onclick="currentSlide(5)"></span>
					<span class="dot" onclick="currentSlide(6)"></span>
					<span class="dot" onclick="currentSlide(7)"></span>
					<span class="dot" onclick="currentSlide(8)"></span>
				</div>
				<div class="info-carro">
					<h2><?php echo($car1->name . " " . $car1->model . " - ". $car1->price); ?></h2>
					<p><?php echo($car1->description . ", " . $car1->year ); ?></p>
					<a class="btn1" href="#">Mais Detalhes</a>
				</div><!--info-carro-->
			</div><!--vitrine-destaque-->

			<div class="vitrine-destaque">
				<div class="images">
					<!-- <div class="modal1" class="slide1 fade"></div> -->

						<img src="imagens/ford-ka2011/155129496_1106131883235519_4734145228943004223_o.jpg">

						<img class="slide1 fade" src="imagens/ford-ka2011/151951083_1106131949902179_8750095732154359137_o.jpg">

						<img class="slide1 fade" src="imagens/ford-ka2011/152838812_1106131899902184_4354725686020499691_o.jpg">

						<img class="slide1 fade" src="imagens/ford-ka2011/154191482_1106131933235514_8725207368454919287_o.jpg">

						<img class="slide1 fade" src="imagens/ford-ka2011/156767924_1106131916568849_8284411592885753935_o.jpg">

					<a class="prev1" onclick="plusSlides1(-1)">&#10094;</a>
					<a class="next1" onclick="plusSlides1(1)">&#10095;</a>


				</div><!--images-->
				<div style="text-align:center">
					<span class="dot1" onclick="currentSlide1(1)"></span>
					<span class="dot1" onclick="currentSlide1(2)"></span>
					<span class="dot1" onclick="currentSlide1(3)"></span>
					<span class="dot1" onclick="currentSlide1(4)"></span>
					<span class="dot1" onclick="currentSlide1(5)"></span>

				</div>
				<div class="info-carro">
					<h2><?php echo($car2->name . " " . $car2->model . " - ". $car2->price); ?></h2>
					<p><?php echo($car2->description . ", " . $car2->year ); ?></p>
					<a class="btn2" href="">Mais Detalhes</a>
				</div>
				<!--info-carro-->
			</div><!--vitrine-destaque-->

			<div class="vitrine-destaque">
				<div class="images">
						<img class="slide2 fade" src="imagens/focus2005/157893679_3687785971332730_4854806508019420410_o.jpg">
						<img class="slide2 fade" src="imagens/focus2005/157277419_3687786027999391_2715137281767809566_o.jpg">
						<img class="slide2 fade" src="imagens/focus2005/157443644_3687786111332716_2055608517182699396_o.jpg">
						<img class="slide2 fade" src="imagens/focus2005/157861491_3687786071332720_6979065354011374667_o.jpg">
						<img class="slide2 fade" src="imagens/focus2005/158158949_3687786134666047_2403478348642125732_o.jpg">
					<a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
					<a class="next2" onclick="plusSlides2(1)">&#10095;</a>
				</div>
				<div style="text-align:center">
					<span class="dot2" onclick="currentSlide2(1)"></span>
					<span class="dot2" onclick="currentSlide2(2)"></span>
					<span class="dot2" onclick="currentSlide2(3)"></span>
					<span class="dot2" onclick="currentSlide2(4)"></span>
					<span class="dot2" onclick="currentSlide2(5)"></span>

				</div>
				<div class="info-carro">
					<h2><?php echo($car3->name . " " . $car3->model . " - ". $car3->price); ?></h2>
					<p><?php echo($car3->description . ", " . $car3->year ); ?></p>
					<a class="btn3" href="">Mais Detalhes</a>
				</div>
				<!--info-carro-->
			</div><!--vitrine-destaque-->
			<!-- <div class="clear"></div> -->
		</div><!--container-->
	</section><!--veiculos-destaque-->

	
	

    	
	
	<section id="faqSec">

		<h2 class="h2Faq">Perguntas Frequentes</h2>
		
		<div style="visibility: hidden; position: absolute; width: 0px; height: 0px;">
			<svg xmlns="http://www.w3.org/2000/svg">
				<symbol viewBox="0 0 24 24" id="expand-more">
					<path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/><path d="M0 0h24v24H0z" fill="none"/>
				</symbol>
				<symbol viewBox="0 0 24 24" id="close">
					<path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/><path d="M0 0h24v24H0z" fill="none"/>
				</symbol>
			</svg>
		</div>
		
		<details open>
			<summary>
				<?php echo($faq1->question); ?>
				<svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
    <svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
  </summary>
  <p><?php echo($faq1->answer); ?></p>
</details>

<details>
	
	<summary>
	<?php echo($faq2->question); ?>
		<svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
		<svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
	</summary>
	<p><?php echo($faq2->answer); ?></p>
</details>

<details>
	<summary>
	<?php echo($faq3->question); ?> 
		<svg class="control-icon control-icon-expand" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#expand-more" /></svg>
		<svg class="control-icon control-icon-close" width="24" height="24" role="presentation"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#close" /></svg>
	</summary>
	<p><?php echo($faq3->answer); ?></p>
</details>
</section>



<section class="contato">
	<div class="line-titulo">
		<div class="ln1"></div>
		<h2>Contato</h2>
	</div>
	<!--line-titulo-->
	
	<form>
			<div class="input-wraper w100">
				<input placeholder="Nome*" type="text" required />
			</div>
			<!--input-wraper-->

			<div class="input-wraper w50">
				<input placeholder="E-mail*" type="text" required />
			</div>
			<!--input-wraper-->

			<div class="input-wraper w50">
				<input placeholder="Telefone*" type="text" required />
			</div>
			<!--input-wraper-->

			<div class="input-wraper w100">
				<textarea placeholder="Mensagem*" required></textarea>
			</div>
			<!--input-wraper-->

			<div class="input-wraper w100">
				<input class="btn1" type="submit" value="Enviar" />
			</div>
			<!--input-wraper-->

			<div class="clear"></div>
			<!--clear-->

		</form>
 
	</section><!--contato-->

<?php

// if ($faq)  {
// 	echo "<h2>" . $faq['question'] . "</h2>";
// 	echo "<p>" . $faq['answer'] . "</p>";
// } else {
// 	echo "<p>No FAQ data available.</p>";
// }
// var_dump($faqs->selectAll());

 ?>


	<script src="<?= url('assets/web/oi.js')?>"></script>

</body>

</html>
