<h1>Login com ADM</h1>
<div>
    <form id="formLogin">
        <div>E-mail: <input type="text" id="email" name="email" value=""></div>
        <div>Password: <input type="text" id="password" name="password" value=""></div>
        <button type="submit">Login</button>
    </form>
</div>

<script type="module" async>
    import {request, requestDebugError} from "<?php echo url("/assets/_shared/functions.js"); ?>";
    
    const formLogin = document.querySelector("#formLogin");
    formLogin.addEventListener("submit", (event) => {
        event.preventDefault();
        const urlLogin = "<?= url("api/adm/login"); ?>";
        const options = {
            method : "get",
            headers : {
                email : document.querySelector("#email").value,
                password : document.querySelector("#password").value
            }
        };
        fetch(urlLogin,options).then(response => {
            response.json().then(adm => {
                console.log(adm.adm);
                localStorage.setItem("userLogin",JSON.stringify(adm.adm));
                console.log(adm);
                if(adm.error){
                    alert("Erro ao fazer login!");
                }
                else{
                    window.location.href = "<?= url("/admin"); ?>";;
                    // console.log(user);
                }
            });
        });
    });



</script>