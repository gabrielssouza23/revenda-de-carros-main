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
        <!-- <div class="title-wrapper-catalog">
          <p>Procure o que você precisa</p>
          <h3>Catálogo</h3>
        </div>
        <div class="filter-card">
          <input
            type="text"
            class="search-input"
            placeholder="Procure seu modelo favorito"
          />
          <button class="search-button">Busca</button>
        </div> -->
        <div class="card-wrapper">
          <?php 
         // var_dump($cars);
                foreach ($cars as $car) {
                  ?>
                  <div class="card-item">
				            <img src="<?= url('imagens/clio.png');?>" alt="Car" />
				            <div class="card-content">
				            <h3><?= $car->name . " " . $car->model . " " . $car->description . " - " . $car->year; ?></h3>
				            <h1 class="valor"><?= $car->price?></h1>
				            <button type="button">Ver detalhes</button>
				            </div>
			            </div>
                  <?php
              }
               ?>
  
      </div>
    </section>

   
</body>
</html>