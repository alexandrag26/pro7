$(document).ready(function(){

    var localinfo = localStorage.getItem('infosaved');

    if (localinfo!=null){

        var jsonparse = JSON.parse(localinfo);
        if(jsonparse[1]=="found"){
            $.mobile.changePage("#homewindow", { transition: "slideup",  changeHash: false});
        } else {
            $.mobile.changePage("#login", { transition: "slideup", reverse:true ,  changeHash: false})
        }
    } else {
        $.mobile.changePage("#login", { transition: "slideup", reverse:true ,  changeHash: false});
    }
     
    $(document).on("click","#loginBTN",function(){
        if($("#loginUSER").val() == "" || $("#loginPASS").val() == ""){
            alert("Por favor, ingrese todos los campos.");
    } else {
        $.ajax({
            url: "https://mercadoprovii.000webhostapp.com/check-login.php", async: true,
            type: "POST",
            data: {
                user: $("#loginUSER").val(),
                pass: $("#loginPASS").val()
            },
            success:function(response){
                if(response=="noFOUND"){
                    alert("No se encuentra el usuario en la base de datos. Verifique su información.");
                } else {
                    localStorage.setItem('Infosaved', response);
                    $.mobile.changePage("#homewindow", { transition: "slideup", changeHash: false});
                }
                }
            });
        }
    });


    $(document).on("click","#create",function(){
        if($("#user").val() == "" || $("#pass").val() == "" || $("#mail").val() == ""){
            alert("Por favor, ingrese todos los campos.");
    } else {
        $.ajax({
            url: "https://mercadoprovii.000webhostapp.com/create-account.php", async: true,
            type: "POST",
            data: {
                user: $("#user").val(),
                pass: $("#pass").val(),
                mail: $("#mail").val()
            },
            success:function(response){
                if(response=="EXISTS"){
                    alert("Ya existe un usuario creado con ese nombre, por favor introduzca otro nombre.");
                } else {
                    alert("Usuario creado exitosamente.");
                    //Ir a la pagina del login
                    window.location = 'https://mercadoprovii.000webhostapp.com/login.html';
                }
                }
            });
        }
    });

    $(logout.php).click(function(){
        localStorage.removeItem("infosaved");
        $.mobile.changePage("#login", { transition: "slideup", reverse:true ,  changeHash: false});
    });
});