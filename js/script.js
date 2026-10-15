$(document).ready(function(){
    $('form.form-signin').on('submit', function(e){
        e.preventDefault();
        let email = $('input[name="email"]').val();
        let contrasena = $('input[name="contrasena"]').val();
        $(this).fadeOut();
        $.ajax({
            type: "POST",
            data: {
                email: email,
                contrasena: contrasena
            },
            url: "../api/login.php",
            success: function(data){
                console.log(data);
                if(data === "usuario"){
                    window.location.replace("catalogo.php");
                } else {
                    $('.success').html('<h2 class="text-center">Datos de usuario incorrectos...</h2>');
                }
            }
        });
    });
    
    $('form.form-registro').on('submit', function(e){
        e.preventDefault();
        let nombre = $('input[name="nombre"]').val();
        let email = $('input[name="email"]').val();
        let contrasena = $('input[name="contrasena"]').val();
        $(this).fadeOut();
        $.ajax({
            type: "POST",
            data: {
                nombre: nombre,
                email: email,
                contrasena: contrasena
            },
            url: "../api/registro.php",
            success: function(data){
                $('.success').html('<h2 class="text-center">Gracias!,<br>su registro de ha completado...</h2>');
            }
        });
    });
    
    $('.button--border-plain').css('width','100%');
});