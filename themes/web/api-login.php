<h1>Login com API</h1>
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
        const urlLogin = "<?= url("api/user/login"); ?>";
        const options = {
            method : "get",
            headers : {
                email : document.querySelector("#email").value,
                password : document.querySelector("#password").value
            }
        };
        fetch(urlLogin,options).then(response => {
            response.json().then(user => {
                console.log(user.user);
                localStorage.setItem("userLogin",JSON.stringify(user.user));
                console.log(user);
                if(user.error){
                    alert("Erro ao fazer login!");
                }
                else{
                    window.location.href = "<?= url("/"); ?>";;
                    // console.log(user);
                }
            });
        });
    });



</script>