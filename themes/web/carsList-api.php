<!DOCTYPE html>
<html lang="pt-br">

<head>

  <title>Projeto 05</title>
  <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
  <link href="<?= url('/assets/web/styleVehicles.css'); ?>" rel="stylesheet">
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
        <div id="filterAll" class="filter-item active" data-brand="all">
          <p>Todos</p>
        </div>
        <div class="filter-item" data-brand="bmw">
          <img id="filterVolks" src="<?= url('imagens/volkswagen-1-logo-svgrepo-com.svg'); ?>" alt="BMW">
        </div>
        <div class="filter-item" data-brand="audi">
          <img id="filterRenault" src="<?= url('imagens/renault-alt-svgrepo-com.svg'); ?>" alt="Audi">
        </div>
        <div class="filter-item" data-brand="mercedes">
          <img id="filterFord" src="<?= url('imagens/ford-svgrepo-com.svg'); ?>" alt="Mercedes">
        </div>
        <div class="filter-item" data-brand="mercedes">
          <img id="filterGm" src="<?= url('imagens/chevrolet-svgrepo-com.svg'); ?>" alt="Mercedes">
        </div>
        <div class="filter-item" data-brand="mercedes">
          <img id="filterNissan" src="<?= url('imagens/nissan-svgrepo-com.svg'); ?>" alt="Mercedes">
        </div>
        <div class="filter-item" data-brand="mercedes">
          <img id="filterChery" src="<?= url('imagens/cdnlogo.com_chery.svg'); ?>" alt="Mercedes">
        </div>
      </div>
      <div class="card-wrapper">
          <div class="card-item">
            <div class="card-content">
              <h3></h3>
              <h1 class="valor"></h1>
              <button type="button"></button>
            </div>
          </div>
      </div>

  </section>

  <script async type="module">

    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";

    // http://localhost/escola-manha/api/cars
    const url = "<?php echo url("/api/cars"); ?>";

    const options = {
        method: "GET"
    };

   // ...

  const getCars = async () => {
      const cars = await request(url, options);

      const cardWrapper = document.querySelector('.card-wrapper'); // Seleciona o container dos cartões

      cars.forEach(car => {
          const cardItem = document.createElement('div'); // Cria um novo elemento de div para cada carro
          cardItem.classList.add('card-item'); // Adiciona a classe card-item

          const carImage = document.createElement('img');
          carImage.src = `${car.photo}`; // Substitua 'imageURL' pelo caminho da imagem do carro
          carImage.alt = 'Car';

          const cardContent = document.createElement('div');
          cardContent.classList.add('card-content');

          const carTitle = document.createElement('h3');
          carTitle.textContent = `${car.brand} ${car.model} ${car.description} - ${car.year}`;

          const carPrice = document.createElement('h1');
          carPrice.classList.add('valor');
          carPrice.textContent = `R$ ${car.price}`;

          const detailsButton = document.createElement('button');
          detailsButton.type = 'button';
          detailsButton.textContent = 'Ver detalhes';

          cardContent.appendChild(carTitle);
          cardContent.appendChild(carPrice);
          cardContent.appendChild(detailsButton);

          cardItem.appendChild(carImage);
          cardItem.appendChild(cardContent);

          cardWrapper.appendChild(cardItem); // Adiciona o cartão ao contêiner
      });
  };

  getCars();



    window.addEventListener("reload", async () => {
        const cars = await request(url, options);
        console.log(cars);
        cars.forEach((car) => {
            console.log(car);
            //document.querySelector("#divFaqs").insertAdjacentHTML("beforeend", `<p>${faq.question} ${faq.answer}</p>`);
        });
     });
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

    filterAll.addEventListener('click', function() {
      <?php $data['brandName'] = ''; ?>


      window.location.href = 'http://localhost/revenda-de-carros-main/veiculos';
    });
  </script>

</body>

</html>