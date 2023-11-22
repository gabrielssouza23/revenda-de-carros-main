+<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<title>Macs R Poo</title>
	
	<style>
	.inline-80 {
		display: inline-block; 
		width: 80px;
	}
	</style>
</head>
<body>	
	<div class="container" id="listing">
		<h3>Listando usuários</h3>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody id="userTableBody">
			</tbody>
		</table>
	</div>
	
	<div id="divUsers"></div>
            
  

	<div class="container" id="new-entry">
		<h3>New Entry</h3>
		<form>
            <div class="form-group">
                <label class="inline-80">Name</label> &nbsp;
                <input type="text" id="name" name="name" />
            </div>
            <div class="form-group">
                <label class="inline-80">Email</label> &nbsp;
                <input type="text" id="email" name="email" />
            </div>
            <div class="form-group">
                <label class="inline-80">Password</label> &nbsp;
                <input type="password" id="password" name="password" />
            </div>
			<div class="form-group">
				<input type="submit" value="Save" class="btn btn-primary" />
			</div>
		</form>
	</div>

	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

	<script type="module" async>
    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";

    const url = "<?php echo url("api/user/list"); ?>";

    const options = {
        method: "GET"
    };

   

    const data = await request(url, options);

    console.log(data);

    const tableBody = document.getElementById('userTableBody');
       // tableBody.innerHTML = ''; // Limpa o corpo da tabela antes de adicionar nova/ s linhas


    data.forEach(user => {
            
            const row = document.createElement('tr');

            const idCell = document.createElement('td');
            idCell.textContent = user.id;
            row.appendChild(idCell);

            const nameCell = document.createElement('td');
            nameCell.textContent = user.name;
            row.appendChild(nameCell);

            const emailCell = document.createElement('td');
            emailCell.textContent = user.email;
            row.appendChild(emailCell);

            const actionsCell = document.createElement('td');
            // const editButton = document.createElement('button');
            // editButton.className = 'btn btn-default';
            // editButton.textContent = 'Edit';
            // // Adicione um evento de clique ao botão de edição, se necessário
            // // editButton.addEventListener('click', () => { /* Lógica de edição */ });
            // actionsCell.appendChild(editButton);

            const defaultButton = document.createElement('button');
            defaultButton.className = 'btn btn-default';
            defaultButton.textContent = 'Default';
            // Adicione um evento de clique ao botão padrão, se necessário
            // defaultButton.addEventListener('click', () => { /* Lógica padrão */ });
            actionsCell.appendChild(defaultButton);

            row.appendChild(actionsCell);

            tableBody.appendChild(row);
               
    });
 

/*
    const getUsersPanel = async () => {
	    
        
        
    }

document.addEventListener("DOMContentLoaded", getUsersPanel);
*/



</script>
</body>
</html>