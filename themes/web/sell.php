<!DOCTYPE html>
<html lang="pt-br">
<head>
	
	<title>Projeto 05</title>
	<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
	<link href="<?= url('/assets/web/styleVehicles.css');?>" rel="stylesheet">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
</head>
<body>
<?php 
$this->layout("_theme");

?>

 <section class="catalog" id="catalog">
      <div class="content2">

      <div class="filter-container">
    <div id="filterAll"class="filter-item active" data-brand="all">
      <p>Todos</p>
    </div>
    <div class="filter-item" data-brand="bmw">
      <img id="filterVolks" src="<?= url('imagens/volkswagen-1-logo-svgrepo-com.svg');?>" alt="BMW" >
    </div>
    <div class="filter-item" data-brand="audi">
      <img id="filterRenault" src="<?= url('imagens/renault-alt-svgrepo-com.svg');?>" alt="Audi">
    </div>
    <div class="filter-item" data-brand="mercedes">
      <img id="filterFord" src="<?= url('imagens/ford-svgrepo-com.svg');?>" alt="Mercedes">
    </div>
    <div class="filter-item" data-brand="mercedes">
      <img id="filterGm" src="<?= url('imagens/chevrolet-svgrepo-com.svg');?>" alt="Mercedes">
    </div>
    <div class="filter-item" data-brand="mercedes">
      <img id="filterNissan" src="<?= url('imagens/nissan-svgrepo-com.svg');?>" alt="Mercedes">
    </div>
    <div class="filter-item" data-brand="mercedes">
      <img id="filterChery" src="<?= url('imagens/cdnlogo.com_chery.svg');?>" alt="Mercedes">
    </div>
  </div>
        <div class="card-wrapper">
          <?php 
         // var_dump($cars);
                foreach ($cars as $car) {
                  ?>
                  <div class="card-item">
				            <img src="<?= url('imagens/clio.png');?>" alt="Car" />
				            <div class="card-content">
				            <h3><?= $car->name . " " . $car->model . " " . $car->description . " - " . $car->year; ?></h3>
				            <h1 class="valor"><?= "R$ " . $car->price?></h1>
				            <button type="button">Ver detalhes</button>
				            </div>
			            </div>
                  <?php
              }
               ?>
  
      </div>
    </section>

    <script>
  // Obtém a referência para a imagem
  var filterVolks = document.getElementById('filterVolks');
  var filterRenault = document.getElementById('filterRenault');
  var filterFord = document.getElementById('filterFord');
  var filterGm = document.getElementById('filterGm');
  var filterNissan = document.getElementById('filterNissan');
  var filterChery = document.getElementById('filterChery');
  var filterAll = document.getElementById('filterAll');
  // Adiciona um evento de clique à imagem
  filterVolks.addEventListener('click', function() {
    // Atualiza o valor de $data['brandName'] para 'volkswagen'
    <?php $data['brandName'] = 'volkswagen'; ?>

        // Obter a URL atual
      var currentUrl = window.location.href;


      // Construir o novo URL com o parâmetro adicionado
      var newUrl = currentUrl + '/volkswagen';

      // Redirecionar a página para o novo URL
      window.location.href = newUrl;
    });

    filterRenault.addEventListener('click', function() {
    <?php $data['brandName'] = 'renault'; ?>

        // Obter a URL atual
      var currentUrl = window.location.href;


      // Construir o novo URL com o parâmetro adicionado
      var newUrl = currentUrl + '/renault';

      // Redirecionar a página para o novo URL
      window.location.href = newUrl;
    });

    filterFord.addEventListener('click', function() {
    <?php $data['brandName'] = 'ford'; ?>

        // Obter a URL atual
      var currentUrl = window.location.href;

      var newUrl = currentUrl + '/ford';

      // Redirecionar a página para o novo URL
      window.location.href = newUrl;
    });

    filterGm.addEventListener('click', function() {
      <?php $data['brandName'] = 'chevrolet'; ?>

      // Obter a URL atual
      var currentUrl = window.location.href;

      var newUrl = currentUrl + '/chevrolet';

      // Redirecionar a página para o novo URL
      window.location.href = newUrl;
    });

    
    filterNissan.addEventListener('click', function() {
      <?php $data['brandName'] = 'nissan'; ?>

      // Obter a URL atual
      var currentUrl = window.location.href;

      var newUrl = currentUrl + '/nissan';

      // Redirecionar a página para o novo URL
      window.location.href = newUrl;
    });

    
    filterChery.addEventListener('click', function() {
      <?php $data['brandName'] = 'chery'; ?>

      // Obter a URL atual
      var currentUrl = window.location.href;

      var newUrl = currentUrl + '/chery';

      // Redirecionar a página para o novo URL
      window.location.href = newUrl;
    });

    filterAll.addEventListener('click', function(){
      <?php $data['brandName'] = ''; ?>

      
      window.location.href = 'http://localhost/revenda-de-carros-main/veiculos';
    });
  </script>

</body>
</html>