<?php
    $this->layout("_theme");
?>
<h1>Sou o conteúdo de carros</h1>
<div class="container">
    <h1>Lista de marcas</h1>
    <div class="filter">
        <label for="brand">Marca:</label>
        <select id="brand">
<<<<<<< HEAD
            <!-- <option value="">Selecione Categoria</option> -->
=======
            <option value="">Selecione Categoria</option>
>>>>>>> 48d1357f31b176c5807f6636ce831cf47284b040
            <?php
                //foreach ($brands as $brand) {
                //    echo "<option value='{$brand->id}'>{$brand->name}</option>";
                //}
            ?>
        </select>
        <label for="nameBrands">Nome da marca:</label>
        <input type="text" id="nameBrands">
<<<<<<< HEAD
   
=======
    </div>
    <table>
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
>>>>>>> 48d1357f31b176c5807f6636ce831cf47284b040

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

<<<<<<< HEAD
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

=======
<div id="conteudo">
    <h2>C.R.U.D.</h2>
    <div id="msg-php" class="no-display"></div>

>>>>>>> 48d1357f31b176c5807f6636ce831cf47284b040
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
<<<<<<< HEAD
    <input id="id" type=hidden value="" />
=======
    <input id="id" type=hidden value="-1" />
>>>>>>> 48d1357f31b176c5807f6636ce831cf47284b040
    <input id="nomeFoto" type=hidden value="" />
    <input type=reset class=button id="btnLimpar" value="Limpar" />
    <input type=submit class=button id="btnSalvar" value="Salvar" />
    </form>
<<<<<<< HEAD
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


=======
</div>

<style>
    /**
 * CRUD Teste para Essentia Pharma
 *
 * @category    CRUD
 * @package     crud
 * @copyright  Copyright (c) 2018 Mario SAM (http://www.mariosam.com.br)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/* Reset ================================================================================= */
* { margin:0; padding:0; }

body          { background:#424959; font:12px/1.35 Arial, Helvetica, sans-serif; color:#000; text-align:center; }
table,
div#conteudo  { max-width: 800px; margin:  0 auto; }

img           { border:0; vertical-align:top; }

a             { color:#fff; text-decoration:underline; }
a:hover       { text-decoration:none; }
:focus        { outline:0; }

/* Headings */
h1            { font-size:20px; font-weight:normal; line-height:1.15; }
h2            { font-size: 30px; font-weight: bold; color: #fff; letter-spacing: 10px; margin: 100px 0px 0px 15px; }
h3            { font-size:16px; font-weight:bold; line-height:1.25; }
h4            { font-size:14px; font-weight:bold; }
h5            { font-size:12px; font-weight:bold; }
h6            { font-size:11px; font-weight:bold; }

/* Forms */
form          { display:inline; }
fieldset      { border:0; }
legend        { color: #9eb0b7; padding: 10px; text-align: left; }

/* Table */
table         { border:0; border-collapse:collapse; border-spacing:0; empty-cells:show; font-size:100%; }
caption,th,td { vertical-align:top; text-align:left; font-weight:normal; }

/* Content */
strong        { font-weight:bold; }
address       { font-style:normal; }
cite          { font-style:normal; }
q,
blockquote    { quotes:none; }
q:before,
q:after       { content:''; }
small,big     { font-size:1em; }
sup           { font-size:1em; vertical-align:top; }

/* Lists */
ul,ol         { list-style:none; }

/* Tools */
.hidden       { display:block !important; border:0 !important; margin:0 !important; padding:0 !important; font-size:0 !important; line-height:0 !important; width:0 !important; height:0 !important; overflow:hidden !important; }
.nobr         { white-space:nowrap !important; }
.wrap         { white-space:normal !important; }
.a-left       { text-align:left !important; }
.a-center     { text-align:center !important; }
.a-right      { text-align:right !important; }
.v-top        { vertical-align:top; }
.v-middle     { vertical-align:middle; }
.f-left,
.left         { float:left !important; }
.f-right,
.right        { float:right !important; }
.f-none       { float:none !important; }
.f-fix        { float:left; width:100%; }
.no-display   { display:none; }
.no-margin    { margin:0 !important; }
.no-padding   { padding:0 !important; }
.no-bg        { background:none !important; }
/* ======================================================================================= */


/* Global Styles ========================================================================= */
/* Form Elements */
input,select,textarea { font:18px Arial, Helvetica, sans-serif; vertical-align:middle; color:#000; background:#7e83a2; }
input.input-text,select,textarea { background:#7e83a2; border:1px solid #ddd; border-radius: 2px; width: 350px; }
input.input-text,textarea { padding:5px; }
select { padding:1px; }
select option { padding-right:10px; }
select.multiselect option { border-bottom:1px solid #ddd; padding:2px 5px; }
select.multiselect option:last-child { border-bottom:0; }
textarea { overflow:auto; }
input.radio { margin-right:3px; }
input.checkbox { margin-right:3px; }
input.qty { width:2.5em !important; }

button.button::-moz-focus-inner { padding:0; border:0; } /* FF Fix */
button.button { -webkit-border-fit:lines; } /* <- Safari & Google Chrome Fix */
input.button { overflow:visible; width:auto; border:0; padding:10px 50px 10px 50px; margin:10px 20px 30px; background: #51abd5; color: #000; font-size: 12px; font-weight: bold; cursor:pointer; }
input.button {
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}
input.button:hover {
    background-color: #4CAF50; /* Green */
    color: white;
}
div#lista input.button.delete { background: #ef647d;  padding: 10px 15px; } 
div#lista input.button.delete:hover { background: #cb314d; } 
div#lista input.button { background: #cadde1; }
div#lista input.button:hover { background: #7ea9b2; }

table tr:hover { background: #cadde1; }

button.button span { float:left; height:21px; background:transparent url(../images/bkg_button.gif) 0 0 no-repeat; padding:0 0 0 8px; font:bold 12px/21px Arial, Helvetica, sans-serif; text-align:center; white-space:nowrap; color:#fff; }
button.button span span { background-position:100% 0; padding:0 12px 0 4px; }
button.disabled {}
button.disabled span {}

button.btn-checkout span {}
button.btn-checkout.no-checkout {}

::-webkit-input-placeholder { color: white; font-size: 12px; }
:-moz-placeholder { color: white; }
::-moz-placeholder { color: white; }
:-ms-input-placeholder { color: white; }

form fieldset { float: left; width: 50%; min-height: 220px; }
.thumb { width: 125px; height: 125px; padding: 10px; border: 0px; }

div#msg-php { background: #fff; padding: 10px; margin: 20px; font-weight: bold; color: red; }
div#lista { background: #f1f5f8; padding: 20px; }
div#lista table { margin: 0 auto; background: #fff; padding: 10px; width: 95%; }
div#lista img.thumb { width: 95px; height: 95px; }
div#lista p.plus { font-weight: bold; font-size: 22px; padding: 10px 0px 10px 0px; } 

p.a,
p.rodape { padding: 20px; color: #fff; font-size: 11px; font-weight: bold; }
input.focus { background: #fff; }

/* ======================================================================================= */
</style>

>>>>>>> 48d1357f31b176c5807f6636ce831cf47284b040
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
<<<<<<< HEAD
            console.log(parseInt(event.target.parentNode.getAttribute("data-id")));
            const urlGetCourse = "<?= url("/api/cars/"); ?>" + parseInt(event.target.parentNode.getAttribute("data-id"));
=======
            const urlGetCourse = "<?= url("api/cars"); ?>" + event.target.parentNode.getAttribute("data-id");
>>>>>>> 48d1357f31b176c5807f6636ce831cf47284b040
            const optionsGetBrand = {
                method : "get"
            };
            fetch(urlGetCourse, optionsGetBrand).then((response) => {
<<<<<<< HEAD
                response.text().then((cars) => {
                    // carregar os dados no formulário
                    console.log(cars);
                    const form = document.querySelector("#edit-form");
                    form.querySelector("#id").value = cars.id;
                    form.querySelector("#model").value = cars.model;
                    form.querySelector("#brand_id").value = cars.category_id;
                    form.querySelector("#price").value = cars.price;
=======
                response.json().then((brand) => {
                    // carregar os dados no formulário
                    // console.log(book[0]);
                    const form = document.querySelector("#edit-form");
                    form.querySelector("#id").value = brand[0].id;
                    form.querySelector("#model").value = brand[0].model;
                    form.querySelector("#brand_id").value = brand[0].category_id;
                    form.querySelector("#price").value = brand[0].price;
>>>>>>> 48d1357f31b176c5807f6636ce831cf47284b040
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