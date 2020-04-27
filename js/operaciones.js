$(document).ready(function () {

    $('#buscarz').on('change', function () {
        opcion = $(this).val();
        if (opcion == 0) {
            $("#espacio").html("Eliga una opción");
        }
        if (opcion == 1) {
            $("#espacio").html("<form action='buscarc.php' method='get'><label id='letra'>Buscar por código</label><br><input type='number' name='bc' id='bc' class='form-control' placeholder='Código del calzado' required><br><button type='button 'id='buscarc' class='btn btn-default'>Buscar</button></form><div id='espb'></div>");
        } else {
            $("#espacio").html("<form action='buscarcn.php' method='get'><label id='letra'>Buscar por nombre</label><br><input type='text' name='bcn' id='bcn' class='form-control' placeholder='Nombre del calzado' required><br><button type='button 'id='buscarcn' class='btn btn-default'>Buscar</button></form><div id='espb'></div>");
        }
//            $("#espacio").html($(this).find(":selected").val());

//        alert($(this).find(":selected").val());
    });
    $('#ges').on('change', function () {
        opcion = $(this).val();
        if (opcion == 0) {
            $("#espgescal").html("Eliga una opción");
        } else {
            if (opcion == 1) {
                $("#derecho").load("agr_zap.php");
//                $("#espgescal").html("<h3 id='letra'>Agregar calzado</h3><button type='button 'id='agr_zap' class='btn btn-default' onclick='return agrzap(event)'>Agregar zapato</button></form><div id='espb'></div>");
            } else {
                $("#espgescal").html("<div class='panel panel-default'><h3 id='letra'>Lo sentimos, no hemos encontrado ningún código similar en nuestra base de datos :(</h3></div>'<br><form action='agr_zap'><button type='button'id='envia' class='btn btn-default'>Buscar</button></form>");
            }
//            $("#espacio").html($(this).find(":selected").val());
        }
//        alert($(this).find(":selected").val());
    });
    $("#envia").click(function () {

        var usuario = $("#usuario").val();
        var contrasena = $("#contrasena").val();
        if (usuario != "" && contrasena != "") {
            $.ajax({
                url: 'log1.php',
                method: 'post',
                data: {usu: usuario, pas: contrasena},
                success: function (msg) {
                    if (msg == '1') {
                        $("#mostra").html("<div class='alert alert-danger' role='alert'>Datos incorrectos</div>");
                    } else {
                        window.location = msg;
                    }
                }
            });
        } else {
            $("#mostra").html("<div class='alert alert-danger' role='alert'>Campos vacios, llenar datos</div>");
        }
    });
    $("#edtperf").click(function () {
        expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var correo = $("#correo").val();
        if (nombre != "" && apellido != "" && correo != "") {
            if (!expr.test(correo)) {
                $("#erredtper").html("<div class='alert alert-warning' role='alert'>Error: La dirección de correo " + correo + " es incorrecta.</div>")
            } else {
                $.ajax({
                    url: 'edt_usu.php',
                    method: 'post',
                    data: {nombre: nombre, apellido: apellido, correo: correo},
                    success: function (msg) {
                        if (msg == '1') {
                            $("#erredtper").html("<div class='alert alert-danger' role='alert'>No se puedieron actualizar los datos</div>");
                        } else {
                            $("#erredtper").html("<div class='alert alert-success' role='alert'><span>Datos actualizados</span> correctamente!!</div>");
                        }
                    }
                });
            }
        } else {
            $("#erredtper").html("<div class='alert alert-danger' role='alert'>Campos vacios, por favor llenar datos</div>");
        }
    });
    $("#edtpas_usu").click(function () {
        var contrasenaact = $("#contrasenaact").val();
        var contrasenanew = $("#contrasenanew").val();
        var contrasenaconf = $("#contrasenaconf").val();
        var con = contrasenanew.length;
        if (contrasenaact != "" && contrasenanew != "" && contrasenaconf != "") {
            if (contrasenanew != contrasenaconf) {
                $("#erredtcon").html("<div class='alert alert-warning' role='alert'><span>Las contraseñas no coinciden</span> Verifique su nueva contraseña</div>");
            } else {

                if (con < 7) {
                    $("#erredtcon").html("<div class='alert alert-warning' role='alert'><span>Su contraseña debe tener como minimo 7 caracteres</div>");
                } else {
                    $.ajax({
                        url: 'edtpas_usu.php',
                        method: 'post',
                        data: {contrasenaact: contrasenaact, contrasenanew: contrasenanew, contrasenaconf: contrasenaconf},
                        success: function (msg) {
                            if (msg == '1') {
                                $("#erredtcon").html("<div class='alert alert-danger' role='alert'><n>Su contraseña actual no coincide con la indicada</n></div>");
                            } else {
                                $("#erredtcon").html("<div class='alert alert-success' role='alert'><span>Contraseña actualizada</span>!!</div>");
                            }
                        }
                    });
                }
            }
        } else {
            $("#erredtcon").html("<div class='alert alert-danger' role='alert'>Campos vacios, por favor llenar datos</div>");
        }
    });

    $("#registrar").click(function () {

        expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var cedula = $("#cedula").val();
        var direccion = $("#direccion").val();
        var celular = $("#celular").val();
        var correo = $("#correo").val();
        var usuario = $("#usuario").val();
        var contrasena = $("#contrasena").val();
        var con = contrasena.length;
        var contrasenaver = $("#contrasenaver").val();
        if (nombre != "" && apellido != "" && cedula != "" && direccion != "" && celular != "" && correo != "" && usuario != "" && contrasena != "" && contrasenaver != "") {
            if (!expr.test(correo)) {
                $("#reg").html("<div class='alert alert-warning' role='alert'>Error: La dirección de correo " + correo + " es incorrecta.</div>")
            } else {
                if (contrasena != contrasenaver) {
                    $("#reg").html("<div class='alert alert-warning' role='alert'><span>Las contraseñas no coinciden</span> Verifique su nueva contraseña</div>");
                } else {
                    if (con < 7) {
                        $("#reg").html("<div class='alert alert-warning' role='alert'><span>Su contraseña debe tener como minimo 7 caracteres</div>");
                    } else {
                        $.ajax({
                            url: 'ana_usu.php',
                            method: 'post',
                            data: {nombre: nombre, apellido: apellido, cedula: cedula, direccion: direccion, correo: correo, celular: celular, usuario: usuario, contrasena: contrasena},
                            success: function (msg) {
                                if (msg == '1') {
                                    $("#reg").html("<div class='alert alert-danger' role='alert'><n>El nombre de usuario ya esta en uso, escoge otro</n></div>");
                                } else {
                                    $(".registro").html("<div class='alert alert-success' role='alert'>Usuario registrado exitosamente!!</div><button type='button' id='volver' class='btn btn-default' onClick='location.href = 'index.php''>Volver</button>");
                                }
                            }
                        });
                    }
                }
            }
        } else {
            $("#reg").html("<div class='alert alert-danger' role='alert'>Campos vacios, Es necesario llenar los datos para el registro</div>");
        }
    });

    $("#btn_agr_zap").click(function () {

        var calzado = $("#agr_cal").val();
        var color = $("#agr_cal_color").val();
        var talla = $("#agr_cal_talla").val();
        var marca = $("#agr_cal_marca").val();
        var categoria = $("#agr_cal_categoria").val();
        var valor = $("#agr_cal_valor").val();
        var genero = $("#agr_cal_genero").val();
        var val = valor.length;
        if (calzado != "" && color != "" && talla != "" && marca != "" && categoria != "" && valor != "" && genero != "") {
            if (!expr.test(correo)) {
                $("#reg").html("<div class='alert alert-warning' role='alert'>Error: La dirección de correo " + correo + " es incorrecta.</div>")
            } else {
                if (contrasena != contrasenaver) {
                    $("#reg").html("<div class='alert alert-warning' role='alert'><span>Las contraseñas no coinciden</span> Verifique su nueva contraseña</div>");
                } else {
                    if (con < 7) {
                        $("#reg").html("<div class='alert alert-warning' role='alert'><span>Su contraseña debe tener como minimo 7 caracteres</div>");
                    } else {
                        $.ajax({
                            url: 'ana_usu.php',
                            method: 'post',
                            data: {nombre: nombre, apellido: apellido, cedula: cedula, direccion: direccion, correo: correo, celular: celular, usuario: usuario, contrasena: contrasena},
                            success: function (msg) {
                                if (msg == '1') {
                                    $("#reg").html("<div class='alert alert-danger' role='alert'><n>El nombre de usuario ya esta en uso, escoge otro</n></div>");
                                } else {
                                    $(".registro").html("<div class='alert alert-success' role='alert'>Usuario registrado exitosamente!!</div><button type='button' id='volver' class='btn btn-default' onClick='location.href = 'index.php''>Volver</button>");
                                }
                            }
                        });
                    }
                }
            }
        } else {
            $("#reg").html("<div class='alert alert-danger' role='alert'>Campos vacios, Es necesario llenar los datos para el registro</div>");
        }
    });
});
