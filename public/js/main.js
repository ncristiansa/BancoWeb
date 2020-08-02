
$(function(){
    /* 
        Evento click. Guardar los datos del formulario del usuario ya registrado.
    */
   $('#guardarDatos').click(function(event){
       event.preventDefault();
       var iban = $('input[name=iban]').val();
       var direccion = $('input[name=direccion]').val();
       var dni = $('input[name=dni]').val();
       var formularioValido = true;
       if(iban.length > 0){
        $('.mensajeIbanError').addClass('d-none');
        if(validarDNI(dni)){
            $('.mensajeDniError').addClass('d-none');
        }else{
            formularioValido = false;
            $('.mensajeDniError').removeClass('d-none');
            $('.mensajeDniError').text('El DNI introducido no es válido.');
        }
        if(validarIban(iban)){
            $('.mensajeIbanError').addClass('d-none');
        }else{
            formularioValido = false;
           $('.mensajeIbanError').removeClass('d-none');
           $('.mensajeIbanError').text('El IBAN introducido no es válido.');
        }
        if(formularioValido){
            $('#formulario').submit();
        }
       }else{
           $('.mensajeIbanError').removeClass('d-none');
           $('.mensajeIbanError').text('Este campo es obligatorio.');
       }
    });
    /* 
            Funcion. Comprobar si el dni es válido.
    */
   function validarDNI(dni){
       var numero, letr, letra, expresion_regular_dni;
       expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
        if(expresion_regular_dni.test (dni) == true){
            numero = dni.substr(0,dni.length-1);
            letr = dni.substr(dni.length-1,1);
            numero = numero % 23;
            letra='TRWAGMYFPDXBNJZSQVHLCKET';
            letra=letra.substring(numero,numero+1);
            if (letra!=letr.toUpperCase()) {
                /* DNI erroneo, la letra del NIF no se corresponde */
                return false;
            }else{
                /* DNI válido */
                return true;
            }
        }else{
            /* DNI erroneo, formato no válido */
            return false;
        }
   }
   /* 
        Function. Validar si el IBAN es válido
   */
    function validarIban(iban){
        //Se pasa a Mayusculas
        iban = iban.toUpperCase();
        //Se quita los blancos de principio y final.
        iban = iban.trim();
        iban = iban.replace(/\s/g, ""); //Y se quita los espacios en blanco dentro de la cadena
        var letra1,letra2,num1,num2;
        var isbanaux;
        var numeroSustitucion;
        //La longitud debe ser siempre de 24 caracteres
        if (iban.length != 24) {
            return false;
        }
        // Se coge las primeras dos letras y se pasan a números
        letra1 = iban.substring(0, 1);
        letra2 = iban.substring(1, 2);
        num1 = obtenerNumeroIban(letra1);
        num2 = obtenerNumeroIban(letra2);
        //Se sustituye las letras por números.
        isbanaux = String(num1) + String(num2) + iban.substring(2);
        // Se mueve los 6 primeros caracteres al final de la cadena.
        isbanaux = isbanaux.substring(6) + isbanaux.substring(0,6);

        //Se calcula el resto, llamando a la función modulo97, definida más abajo
        resto = calculaRest(isbanaux);
        if (resto == 1){
            return true;
        }else{
            return false;
        }

    }
    function calculaRest(iban){
        var parts = Math.ceil(iban.length/7);
        var remainer = "";

        for (var i = 1; i <= parts; i++) {
            remainer = String(parseFloat(remainer+iban.substr((i-1)*7, 7))%97);
        }

        return remainer;
    }
    function obtenerNumeroIban(letra){
        ls_letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return ls_letras.search(letra) + 10;
    }
});
