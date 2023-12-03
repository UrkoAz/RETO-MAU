let tiempoInicio; //Almacena el tiempo cuando se inicia el cronómetro.
let tiempoPausado = 0; //Almacena el tiempo cuando el cronómetro se para.
let cronometroActivo = false; //dice si el cronómetro está activo o no.
    function iniciarCronometro() {
        try{
        if (!cronometroActivo) { //Inicia el cronómetro si no está activo.
                if (tiempoPausado === 0) { 
                    tiempoInicio = new Date().getTime(); //Si es la primera vez que se inicia, guarda el tiempo en "tiempoInicio".
                } else {
                    tiempoInicio = new Date().getTime() - tiempoPausado; //Si se reanuda después de pararlo, ajusta "tiempoInicio" teniendo en cuenta el tiempo pausado.
                    tiempoPausado = 0;
                }

                cronometroActivo = true; //Activa el cronómetro.
                actualizarCronometro(); //llama a la función "actualizarCronometro()"".
        }
        } catch (error){ //control de errores.
            console.log(error.message);
        }
    }
    function detenerCronometro() {
        try{
        cronometroActivo = false; //Detiene el cronómetro poniendo "cronometroActivo" en false.
        tiempoPausado = new Date().getTime() - tiempoInicio; //Guarda el tiempo actual en "tiempoPausado" para luego poder reanudar.
        } catch (error){
            console.log(error.message);
        }
    }
    function reiniciarCronometro() { //Detiene el cronómetro y restablece las variables a sus valores iniciales.
        try{
        cronometroActivo = false;
        tiempoPausado = 0;
        document.getElementById("cronometro").innerHTML = "00:00:00"; //Actualiza el div con id "cronometro" de "cronometro.php" para que salga: "00:00:00".
        } catch (error){
            console.log(error.message);
        }
    }
    function actualizarCronometro() {
        try{
        if (cronometroActivo) {
            let tiempoActual = new Date().getTime(); //Si el cronómetro está activo, calcula el tiempo que ha pasado desde el inicio.
            let tiempoTranscurrido = tiempoActual - tiempoInicio;
    
            let segundosTotales = Math.floor(tiempoTranscurrido / 1000); //Convierte el tiempo transcurrido a horas, minutos y segundos (el tiempo está en milisegundos).
            let horas = Math.floor(segundosTotales / 3600); //Math.floor para que siempre tengan dos dígitos.
            let minutos = Math.floor((segundosTotales % 3600) / 60);
            let segundos = segundosTotales % 60;
    
            //Agrega un cero delante si son menores a 10
            horas = horas < 10 ? "0" + horas : horas;
            minutos = minutos < 10 ? "0" + minutos : minutos;
            segundos = segundos < 10 ? "0" + segundos : segundos;

            //Actualiza el div con id "cronometro" de "cronometro.php" para que salga el tiempo actualizado.
            document.getElementById("cronometro").innerHTML = `${horas}:${minutos}:${segundos}`;
            
            //Programa una llamada después de 1s.
            setTimeout(actualizarCronometro, 1000);
        }
        } catch (error){
            console.log(error.message);
        }
    }

    function enviarCronometro() {
        try {
        var valorCronometro = document.getElementById("cronometro").innerHTML; //Coge el valor del div con id "cronometro" de "cronometro.php".
        document.getElementById("valorCronometro").value = valorCronometro; //Asigna ese valor a "valorCronometro".
        
        } catch (error){
            console.log(error.message);
        }
    }

    //botón atrás
    function volverAtras() {
            try{
                window.history.back();
            
            } catch (error){
                console.log(error.message);
            }
    }

    //cookies
    function alertCookies() {
        try{
        var userResponse = confirm('Aceptas las cookies?'); //Muestra un cuadro de confirmación al usuario preguntando si acepta las cookies.
        
            if (userResponse) {
            alert('Has aceptado las cookies!'); //Si el usuario acepta, sale por pantalla un mensaje.
        } else {
            window.history.back(); //Si el usuario no acepta, vuelve a la página anterior.
        }
        } catch (error){
            console.log(error.message);
        }
    }

//Haces click en los botones y dependiendo de cual pulses llama a una función u otra.
document.getElementById("Btn_Iniciar").addEventListener("click", iniciarCronometro);
document.getElementById("Btn_Detener").addEventListener("click", detenerCronometro);
document.getElementById("Btn_Reiniciar").addEventListener("click", reiniciarCronometro);
document.getElementById("Btn_Enviar").addEventListener("click", enviarCronometro);
document.getElementById("Btn_Atras").addEventListener("click", volverAtras);