<?php
    $this->layout("_theme");
?>
<h1>Sou o conteúdo de carros</h1>
<div class="container">
    <h1>Lista de marcas</h1>
    <div class="filter">
        <label for="brand">Marca:</label>
        <select id="brand">
            <!-- <option value="">Selecione Categoria</option> -->
            <?php
                //foreach ($brands as $brand) {
                //    echo "<option value='{$brand->id}'>{$brand->name}</option>";
                //}
            ?>
        </select>
        <label for="nameBrands">Nome da marca:</label>
        <input type="text" id="nameBrands">
   

<!-- Modal para editar Cursos -->
<div id="edit-modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Editar Curso</h2>
        <form id="edit-form">
            <input type="hidden" id="id" name="id">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name">
            <label for="brand_id">Marca:</label>
            <select id="brand_id" name="brand_id">
                <option value="">Selecione uma Categoria</option>

                <?php
                foreach ($brands as $brand) {
                    echo "<option value='{$brand->id}'>{$brand->name}</option>";
                    //var_dump($brand);
                }
                ?>

            </select>
            <label for="price">Preço:</label>
            <input type="text" id="price" name="price">
            <button type="submit">Salvar</button>
        </form>
    </div>
</div>

</div>
    <table class="tableList">
        <thead>
        <tr>
            <th>ID</th>
            <th>Model</th>
            <th>Preço</th>
            <th>Marca</th>
            <th>Apagar</th>
        </tr>
        </thead>
        <tbody id="CarList">
        </tbody>
    </table>
</div>


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
    <input id="id" type=hidden value="" />
    <input id="nomeFoto" type=hidden value="" />
    <input type=reset class=button id="btnLimpar" value="Limpar" />
    <input type=submit class=button id="btnSalvar" value="Salvar" />
    </form>
</div> -->

<style>
.content {
    flex-grow: 1;
    padding: 20px;
    background-color: #f4f4f4;
    margin-left: 250px;
    margin-top: 40px; /* Adicionei para deixar espaço para a barra horizontal fixa */
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

select, input {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
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
</style>


<script type="text/javascript">

    const tableBrands = document.querySelector("table");
    // Seletor para a modal
    const modal = document.querySelector("#edit-modal");
    // Seletor para o botão de fechar a modal
    const closeModalButton = document.querySelector(".close");

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

        if(event.target.tagName === "TD"){
            console.log(`Mostrar: ${event.target.parentNode.getAttribute("data-id")}`);
            // Requisição para getCourse
            console.log(parseInt(event.target.parentNode.getAttribute("data-id")));
            const urlGetCourse = "<?= url("/api/cars/"); ?>" + parseInt(event.target.parentNode.getAttribute("data-id"));
            const optionsGetBrand = {
                method : "get"
            };
            fetch(urlGetCourse, optionsGetBrand).then((response) => {
                response.text().then((cars) => {
                    // carregar os dados no formulário
                    console.log(cars);
                    const form = document.querySelector("#edit-form");
                    form.querySelector("#id").value = cars.id;
                    form.querySelector("#model").value = cars.model;
                    form.querySelector("#brand_id").value = cars.category_id;
                    form.querySelector("#price").value = cars.price;
                });
            });
            openModal();
        }

        if(event.target.tagName === "BUTTON"){
            console.log(`Apagar: ${event.target.parentNode.parentNode.getAttribute("data-id")}`);
            //event.stopPropagation();
            // Requisisão para deleteCourse
            //event.target.parentNode.parentNode.remove();
        }

    });

    const selectBrand = document.querySelector("#brand_id");
    
    selectBrand.addEventListener("change",  async () => {
        //console.log(selectBrand.value);
        console.log(selectBrand);
        const url = "<?= url("api/cars/brand/"); ?>" + selectBrand.value;
        console.log(selectBrand.value)
        const response = await fetch(url, {
            method : "get"
        });
        const cars = await response.json();
        const listCar = document.querySelector("#CarList");
        listCar.innerHTML = "";
        cars.forEach((car) => {
            const tr = document.createElement("tr");
            tr.setAttribute("data-id", car.id);
            tr.innerHTML = `<td>${car.name}</td><td>${car.price}</td><td>${car.description}</td><td><button>X</button></td>`;
            listCar.appendChild(tr);
        });
    });

    // Edição de Cursos
    const editForm = document.querySelector("#edit-form");
    editForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const urlUpdate = "<?= url("api/cars/"); ?>" + editForm.id.value;
    });

</script>