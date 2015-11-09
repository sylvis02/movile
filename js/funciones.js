//////////////////////////////////////////////////////////////////////////////////////////////////////////

$(document).ready(function() {
      $('#provincias').easySelect();
      $('#cantones').easySelect();
      $('#parroquia').easySelect();
});


//funcion cheeboxk 
function validate() {
    var b = 0, chk=document.getElementsByName("menu[]")

    for(j=0;j<chk.length;j++) {
      if(chk.item(j).checked == false) {
       b++;
       }
    }

    if(b == chk.length) {
      document.getElementById('mensaje').valueS= "selecione una o varias opciones";
       jAlert('Debe seleccionar por lo menos una opcion', 'Gestión Vehicular');
      document.getElementById("menu[]").style.border = "2px solid red";
      return false;
    } else {
    document.getElementById("menu[]").style.border = "";
      }
    }


//tooltip
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});


//validacion de campos numericos
function validar(e) { // 1

    tecla = (document.all) ? e.keyCode : e.which; // 2
    if (tecla==8) return true; // 3
    patron = /\d/; // Solo acepta números
    te = String.fromCharCode(tecla); // 5
    return patron.test(te); // 6
}


//validacion de decimales
function validarD(e){ 

obj=e.srcElement || e.target;
tecla_codigo = (document.all) ? e.keyCode : e.which;
if(tecla_codigo==8)return true;
patron =/[\d.]/;
tecla_valor = String.fromCharCode(tecla_codigo);
control=(tecla_codigo==46 && (/[.]/).test(obj.value))?false:true
return patron.test(tecla_valor) &&  control;

}

function Solo_Numerico(variable){
        Numer=parseInt(variable);
        if (isNaN(Numer)){
            return "";
       }
        return Numer;
}
function ValNumero(Control){
        Control.value=Solo_Numerico(Control.value);
}

function campoNumerico(){
if (isNaN(formulario.edad.value)==true || /^[1-9]\d$/.test(formulario.edad.value)==false ) {
    alert ('Edad no valida'); todoCorrecto=false;
  }

}

function cargarItem(){

        var item=$('#repuesto1').val();
        document.getElementById('txtitem').value=item;}
function validarprecio(e)
    {
        // capturamos la tecla pulsada
        var teclaPulsada=window.event ? window.event.keyCode:e.which;
 
        // capturamos el contenido del input
        var valor=document.getElementById("precio").value;
 
        // 45 = tecla simbolo menos (-)
        // Si el usuario pulsa la tecla menos, y no se ha pulsado anteriormente
        // Modificamos el contenido del mismo añadiendo el simbolo menos al
        // inicio
        if(teclaPulsada==45 && valor.indexOf("-")==-1)
        {
            document.getElementById("precio").value="-"+valor;
        }
 
        // 13 = tecla enter
        // 46 = tecla punto (.)
        // Si el usuario pulsa la tecla enter o el punto y no hay ningun otro
        // punto
        if(teclaPulsada==13 || (teclaPulsada==46 && valor.indexOf(".")==-1))
        {
            return true;
        }
 
        // devolvemos true o false dependiendo de si es numerico o no
        return /\d/.test(String.fromCharCode(teclaPulsada));
    }
//agregacion de mapas rutas

function agregar_ruta() {

  document.getElementById("ruta").value=tramo+"-Loja";
    document.getElementById("Kilometraje").value=document.getElementById("total").value;
  }


