<?php
//$this->layout("_theme");
?>
<style>
    .content {
        flex-grow: 1;
        padding: 20px;
        background-color: #f4f4f4;
        margin-left: 250px;
        margin-top: 40px;
        /* Adicionei para deixar espaço para a barra horizontal fixa */
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    h1 {
        font-size: 24px;
        text-align: center;
        margin-bottom: 20px;
    }

    .filter {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    select,
    input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    form {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    label,
    input,
    select,
    button {
        margin-bottom: 10px;
        font-size: 16px;
    }

    button {
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    button:hover {
        background-color: #45a049;
    }

    /* Adicione estilos para a modal aqui */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<div class="container">
    <h1>Lista de marcas</h1>
    <div class="filter">
        <label for="brand">Marca:</label>
        <select id="brand">
            <option value="">Selecione Categoria</option>
            <?php
            foreach ($brands as $brand) {
                echo "<option value='{$brand->id}'>{$brand->name}</option>";
            }
            ?>
        </select>
        <!-- <label for="nameBrands">Nome da marca:</label>
        <input type="text" id="nameBrands"> -->
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Preço</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody id="CarList">
        </tbody>
    </table>
</div>

<!-- Modal para editar carros -->
<div id="edit-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Carro</h2>
        <form id="edit-form">
            <input type="hidden" id="id" name="id">

            <img id="imagePreview" alt="Imagem do Curso">
            <input type="text" id="inputImage" name="inputImage">
            <label for="model" id="model">Modelo:</label>
            <input type="text" id="inputModel" name="inputModel">
            <label for="price" id="price">Preço:</label>
            <input type="text" id="inputPrice" name="inputPrice">
            <label for="brand" id="brand">Marca:</label>
            <input type="text" id="inputBrand" name="inputBrand">
            <label for="year" id="year">Ano:</label>
            <input type="text" id="inputYear" name="inputYear">
            <label for="description" id="description">Descrição:</label>
            <input type="text" id="inputDescription" name="inputDescription">
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

<button id="btnSair">Sair</button>

<!-- <div id="conteudo">
    <h2>C.R.U.D.</h2>
    <div id="msg-php" class="no-display"></div>

    <form method="POST" enctype="multipart/form-data" onSubmit="salvarForm(); return false;" id="frmCrud">
    <fieldset>
        <legend>Nome:</legend>
        <input id="nome" type=text class=input-text required placeholder="Digite seu nome aqui" size=20 name=nome onFocus="inputOn(this)" onBlur="inputOff(this)"/>
        <legend>Email:</legend>
        <input id="email" type=email class=input-text required placeholder="Informe seu email" size=30 name=email onFocus="inputOn(this)" onBlur="inputOff(this)"/>
        <legend>Telefone:</legend>
        <input id="telefone" type=text class=input-text required pattern="\d*" placeholder="Seu telefone? (apenas números)" size=10 name=telefone onFocus="inputOn(this)" onBlur="inputOff(this)"/>
    </fieldset>
    <fieldset>
        <legend>Foto:</legend>
        <input type=file id="foto" name=foto class=input-text accept="image/png, image/jpeg"/>
        <img id="image" class=thumb />
    </fieldset>
    <input id="id" type=hidden value="-1" />
    <input id="nomeFoto" type=hidden value="" />
    <input type=reset class=button id="btnLimpar" value="Limpar" />
    <input type=submit class=button id="btnSalvar" value="Salvar" />
    </form>
</div> -->


<script type="text/javascript">
    const tableBrands = document.querySelector("table");
    // Seletor para a modal
    const modal = document.querySelector("#edit-modal");
    // Seletor para o botão de fechar a modal
    const closeModalButton = document.querySelector(".close");

    const selectBrand = document.querySelector("#brand");


    // Função para abrir a modal com dados do produto (vai receber por parâmetro o id do produto)
    function openModal() {
        modal.style.display = "block";
    }

    // Fechar a modal ao clicar no botão de fechar
    closeModalButton.onclick = function() {
        modal.style.display = "none";
    };

    // Fechar a modal quando o usuário clicar fora dela
    window.onclick = function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

    // Função para carregar os dados do produto na modal

    tableBrands.addEventListener("click", (event) => {

        if (event.target.tagName === "TD") {
            console.log(`Mostrar: ${event.target.parentNode.getAttribute("data-id")}`);
            // Requisição para getCourse
            const urlGetCourse = "<?= url("api/cars/brand/"); ?>" + selectBrand.value + "/" + event.target.parentNode.getAttribute("data-id");
            const optionsGetBrand = {
                method: "get"
            };
            fetch(urlGetCourse, optionsGetBrand).then((response) => {
                response.json().then((brand) => {
                    // carregar os dados no formulário
                    console.log(brand);
                    const form = document.querySelector("#edit-form");

                    const imagePreview = document.querySelector("#imagePreview");
                    imagePreview.src = brand[0].photo || ''; // Substitua 'photo' pelo campo real que contém a URL da imagem

                    form.querySelector("#inputImage").value = brand[0].photo || ''; // Substitua 'photo' pelo campo real que contém a URL da imagem
                    form.querySelector("#inputModel").value = brand[0].model;
                    form.querySelector("#inputPrice").value = brand[0].price;
                    form.querySelector("#inputBrand").value = brand[0].brand;
                    form.querySelector("#inputYear").value = brand[0].year;
                    form.querySelector("#inputDescription").value = brand[0].description;
                });
            });
            openModal();
        }

        if (event.target.tagName === "BUTTON") {
            console.log(`Apagar: ${event.target.parentNode.parentNode.getAttribute("data-id")}`);

            const urlDeleteCar = "<?= url("api/cars/brand/delete/"); ?>" + selectBrand.value + "/" + event.target.parentNode.parentNode.getAttribute("data-id");
            const optionsDeleteCar = {
                method: "delete"
            };

            fetch(urlDeleteCar, optionsDeleteCar)
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(`Erro ao excluir o carro: ${response.status}`);
                    }
                    console.log("Carro excluído com sucesso");
                    // Faça algo após a exclusão, como recarregar a lista de carros
                    // ou atualizar a interface de usuário
                })
                .catch((error) => {
                    console.error("Erro:", error);
                });

        }

        //event.stopPropagation();
        // Requisisão para deleteCourse
        //event.target.parentNode.parentNode.remove();


    });

    selectBrand.addEventListener("change", async () => {
        //console.log(selectBrand.value);
        //console.log(selectBrand);
        const url = "<?= url("api/cars/brand/"); ?>" + selectBrand.value;
        //  console.log(selectBrand.value)
        const response = await fetch(url, {
            method: "get"
        });
        const cars = await response.json();
        const listCar = document.querySelector("#CarList");
        listCar.innerHTML = "";
        cars.forEach((car) => {
            const tr = document.createElement("tr");
            tr.setAttribute("data-id", car.id);
            tr.innerHTML = `<td>${car.id}</td><td>${car.model}</td><td>${car.price}</td><td>${car.brand}</td><td>${car.year}</td><td><button>X</button></td>`;
            listCar.appendChild(tr);
            // console.log(car);
        });
    });

    // Edição de Cursos
    const editForm = document.querySelector("#edit-form");
    editForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const urlUpdate = "<?= url("api/cars/"); ?>" + editForm.id.value;
    });

    // Seletor para o botão Sair
    const btnSair = document.querySelector("#btnSair");

    // Adicionar um ouvinte de evento para o botão Sair
    btnSair.addEventListener("click", function() {
        // Redirecionar para a URL desejada
        window.location.href = "<?php echo url('/admin'); ?>";
    });
</script>