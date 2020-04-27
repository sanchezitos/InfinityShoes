-function datos() {


    var usuario = document.getElemenById("usuario").value

    var contrasena = document.getElemenById("contrasena").value

    var url = "log1.php";
//    if (usuario != "" && contrasena != "") {

    $.ajax({

        type: "post",
        url: url,
        data: {usu: usuario, pas: contrasena},
        success: function (datos) {
            $("#mostra").html(datos);
        }
    }

    )
//    } else {
//        $("#mostra").html("<div class='alert alert-danger' role='alert'>Campos vacios, llenar datos</div>");
//    }

}
function validarEspacio(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8)
        return true; //Tecla de retroceso (para poder borrar) 
    // dejar la línea de patron que se necesite y borrar el resto 
    patron = /\w/; // Acepta números y letras 
    //patron = /\D/; // No acepta números 
    // 
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8)
        return true; //Tecla de retroceso (para poder borrar) 
    // dejar la línea de patron que se necesite y borrar el resto 
    patron = /\w/; // Acepta números y letras 
    patron = /\D/; // No acepta números 
    // 
    te = String.fromCharCode(tecla);
    return patron.test(te);
}
function validarLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}
function admcalzado() {
   $("#derecho").load("ges_zap.php");

}
function agrzap() {
   $("#derecho").load("agr_zap.php");

}

function registro() {

    $("#contenedor").load("registro.php");
}
function edtperf() {

    $("#derecho").load("edtperf.php");
}

function eliperf() {

    $("#derecho").load("elmperf.php");
}
function agrpub() {

    $("#derecho").load("agrpub.php");
}
function almacen() {
    $("#contenedor").load("almacen.php");
    $("#body1").attr('style', 'background: url(/images/falmacen.jpg) no-repeat 100px 150px');
}
function personal() {
    $("#contenedor").load("personal.php");
    $("#body1").attr('style', 'background: url(/images/fpersonal.jpg) no-repeat 100px 150px');
}
function regven(){
    $("#derecho").load("registro.php");
}
function calzado() {
    $("#contenedor").load("calzado.php");
    $("#body1").attr('style', 'background: url(/images/fcalzado.jpg) no-repeat 150px 100px');
}
function cuenta() {
    $("#contenedor").load("cuenta.php");
}
function miperf() {

    $("#derecho").load("miperf.php");
}

function validarEmail(correo) {
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!expr.test(correo))
        $("#reg").html("<div class='alert alert-warning' role='alert'>Error: La dirección de correo " + correo + " es incorrecta.</div>");
}

