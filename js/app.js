/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */


$(document).ready(function () {
    $('form.account-create-gcc').on('submit', function (e) {
        e.preventDefault();
        let datos = $(this).serialize();
        let elPass = $('input[name="password"]').val();
        $.ajax({
            url: 'api/usuario.php',
            method: 'POST',
            data: datos,
            beforeSend: function () {
                $('.alerta').html('<h2 style="padding:10px;margin:0;color:#333;margin-bottom:20px;font-weight:100;font-size:2em;text-align:center;line-height: 4.2rem;"><b>BIENVENIDO!</b><br>Ingresando a su cuenta</h2>');
                $('.btn.btn-lg.login').text('Enviando sus datos...');
            },
            success: function (response) {
                $('form.account-create-gcc').fadeOut();
                if (response === "usuario") {
                    window.setTimeout(function () {
                        window.location = "categoria.php";
                    }, 5000);
                } else {
                    $('.alerta').html('<h2 style="padding:10px;margin:0;color:#333;margin-bottom:20px;text-align:center;font-weight: bold;">Datos Incorrectos...<br>Espere un momento para volver a intentar...</h2><hr>');
                    window.setTimeout(function () {
                        window.location = "index.php";
                    }, 5000);
                }
            }
        })
    });

    $('form.evaluacion').on('submit', function (e) {
        e.preventDefault();
        let resultados = JSON.stringify($('form.evaluacion').serializeArray());
        $.ajax({
            url: '/api/resultados.php',
            method: 'POST',
            data: {
                resultados: resultados
            },
            beforeSend: function () {
                $('form.evaluacion').fadeOut();
                $('#loader-wrapper').fadeIn();
            },
            success: function (data) {
                window.scrollTo({ top: 0, behavior: 'smooth' });
                $('#loader-wrapper').fadeOut();
                $('.contacontenedor').hide();
                $('.demoexamen').fadeOut();
                $('.resultadosEvaluacion').html(data);
            }
        });
    });

    $('button.btn.btn-lg.demoex').on('click', function (e) {
        e.preventDefault();
        $('#loader-wrapper').fadeOut();
        $('.contacontenedor').hide();
        $('form.evaluacion').fadeOut();
        window.scrollTo({ top: 0, behavior: 'smooth' });
        $('.demoexamen').fadeIn();

        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    $('form.account-registro').on('submit', function (e) {
        e.preventDefault();
        let datos = $(this).serialize();
        $.ajax({
            url: '/api/registro.php',
            method: 'POST',
            data: datos,
            beforeSend: function () {
                $('form.account-registro').fadeOut();
                $('.alerta').html('<h2 style="padding:10px;margin:0;color:blue;margin-bottom:20px;font-weight:100;font-size:1.5em;text-align:center;"><b>ENVIANDO TUS DATOS!</b></h2>');
                $('.btn.btn-lg.login').text('Enviando datos...');
            },
            success: function (response) {
                console.log('La respuesta: ' + response);
                if (response === "usuario") {
                    $('.alerta').html('<h2 style="padding:10px;margin:0;color:blue;margin-bottom:20px;font-weight:100;font-size:1.5em;text-align:center;"><b>BIENVENIDO!</b><br>Gracias por registrar sus datos!,<br>en breve le será enviado su acceso...</h2>');
                    window.setTimeout(function () {
                        window.location = "index.php";
                    }, 5000);
                } else if (response === "yaexiste") {
                    $('.alerta').html('<h2 style="padding:10px;margin:0;color:red;margin-bottom:20px;text-align:center;">El usuario ya se encuentra registrado...<br>Por favor ingrese con sus datos...</h2>');
                    window.setTimeout(function () {
                        window.location = "index.php";
                    }, 5000);
                } else {
                    $('.alerta').html('<h2 style="padding:10px;margin:0;color:red;margin-bottom:20px;text-align:center;">Datos Incorrectos...<br>Espere un momento para volver a intentar...</h2>');
                    window.setTimeout(function () {
                        window.location = "index.php";
                    }, 5000);
                }
            }
        });
    });

})